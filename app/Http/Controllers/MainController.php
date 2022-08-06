<?php

namespace App\Http\Controllers;

use Request;

class MainController extends DashboardController
{
    public function index(Request $request)
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
