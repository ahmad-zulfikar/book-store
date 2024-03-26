<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewBookController extends Controller
{
    public function createBook()
    {
        return view('create-book');
    }

    public function editBook()
    {
        return view('edit-book');
    }

    public function deleteBook()
    {
        return view('delete-book');
    }

    public function listBooks()
    {
        return view('list-book');
    }

    public function changePassword()
    {
        return view('change-password');
    }
}
