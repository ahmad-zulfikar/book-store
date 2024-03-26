@extends('main')
@section('content')
    {{-- form for changing password, enter old password and new password --}}
    {{-- has notif message about success or validation error hide/unhide using jquery --}}
    <h1 class="text-center">Change Password</h1>
    <div id="change-password-card" class="card w-50 mx-auto mt-5">
        <div class="card-header">
            <h3>Change Password</h3>
        </div>
        <div class="card-body">
            <form id="change-password">
                <div class="form-group mb-3">
                    <label for="old_password">Old Password</label>
                    <input type="password" name="old_password" id="old_password" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="new_password">New Password</label>
                    <input type="password" name="new_password" id="new_password" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Change</button>
            </form>
            <div id="notif" class="mt-3"></div>
        </div>
    </div>
@endsection
