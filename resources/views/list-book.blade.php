@extends('main')
@section('content')
    <h1 class="text-center">List of Books</h1>
    <div id="list-book-card" class="card w-50 mx-auto mt-5">
        <div class="card-header">
            <h3>Books</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="book-table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>ISBN</th>
                        <th>Year</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
        </div>
    </div>
@endsection
