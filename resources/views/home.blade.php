@extends('main')
@yield('content')
{{-- just five card each is create book, edit, delete, list book, change password --}}
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card mt-5">
                <div class="card-body">
                    <h5 class="card-title
                    ">Create Book</h5>
                    <p class="card-text">Create a new book</p>
                    <a href="{{ route('create-book') }}" class="btn btn-primary">Create</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mt-5">
                <div class="card-body">
                    <h5 class="card-title
                    ">Edit Book</h5>
                    <p class="card-text">Edit a book</p>
                    <a href="{{ route('edit-book') }}" class="btn btn-primary">Edit</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mt-5">
                <div class="card-body">
                    <h5 class="card-title
                    ">Delete Book</h5>
                    <p class="card-text">Delete a book</p>
                    <a href="{{ route('delete-book') }}" class="btn btn-primary">Delete</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mt-5">
                <div class="card-body">
                    <h5 class="card-title
                    ">List Book</h5>
                    <p class="card-text">List all books</p>
                    <a href="{{ route('list-book') }}" class="btn btn-primary">List</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mt-5">
                <div class="card-body">
                    <h5 class="card-title
                    ">Change Password</h5>
                    <p class="card-text">Change your password</p>
                    <a href="{{ route('change-password') }}" class="btn btn-primary">Change</a>
                </div>
            </div>
        </div>
    </div>
</div>
