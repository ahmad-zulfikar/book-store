@extends('main')
@section('content')
 <h1 class="text-center">Login Page</h1>

    <div id="card1" class="card w-50 mx-auto mt-5">
        <div class="card-header">
            <h3>Please Login First</h3>
        </div>
        <div class="card-body">
            <form id="form">
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
