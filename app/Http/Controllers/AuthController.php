<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $validation = Validator::make(request()->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validation->fails()) {
            return response()->json($validation->errors(), 400);
        }

        $credentials = request(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        //get the token from the request
        $token = JWTAuth::getToken();
        // Blacklist the token
        JWTAuth::invalidate($token);

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    public function changePassword(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'old_password' => 'required|string',
            'new_password' => 'required|string',
            'confirm_password' => 'required|string|same:new_password',
        ]);

        if ($validation->fails()) {
            return response()->json(['message' => $validation->errors()->first()], 400);
        }

        $user = User::find(auth()->user()->id);

        if (!password_verify($request->old_password, $user->password)) {
            return response()->json(['message' => 'Old password is incorrect'], 400);
        }

        $user->password = bcrypt($request->new_password);
        $user->save();

        return response()->json(['message' => 'Password changed successfully']);
    }
}
