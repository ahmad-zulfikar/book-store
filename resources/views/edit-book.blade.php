@extends('main')
@section('content')
    <h1 class="text-center">Create Book</h1>

    <div id="edit-book-card" class="card w-50 mx-auto mt-5">
        <div class="card-header">
            <h3>Please Edit the Book</h3>
        </div>
        <div class="card-body">
            {{-- dropdown to choose which book to edit --}}
            <div class="form-group mb-3">
                <label for="book">Book</label>
                <select name="book" id="book-dropdown" class="form-control">
                    <option value="">Choose a book</option>F
                </select>
            <form id="edit-book">
                <input type="hidden" name="id" id="id">
                <div class="form-group mb-3">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="author">Author</label>
                    <input type="text" name="author" id="author" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="isbn">ISBN</label>
                    <input type="text" name="isbn" id="isbn" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="year">Year</label>
                    <input type="number" name="year" id="year" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
