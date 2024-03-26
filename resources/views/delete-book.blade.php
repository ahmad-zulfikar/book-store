@extends('main')
@section('content')
    {{-- make dropdown to choose book to delete --}}
    <h1 class="text-center">Delete Book</h1>
    <div id="delete-book-card" class="card w-50 mx-auto mt-5">
        <div class="card-header">
            <h3>Please Choose the Book to Delete</h3>
        </div>
        <div class="card-body">
            <form id="delete-book">
                <div class="form-group mb-3">
                    <label for="book">Book</label>
                    <select name="book" id="book-dropdown" class="form-control">
                        <option value="">Choose a book</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    @endsection
