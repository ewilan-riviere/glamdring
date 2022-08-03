<?php

namespace App\Http\Controllers;

class MainController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }

    public function notes()
    {
        return view('pages.notes');
    }

    public function submissions()
    {
        return view('pages.submissions');
    }
}
