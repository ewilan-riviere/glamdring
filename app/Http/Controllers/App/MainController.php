<?php

namespace App\Http\Controllers\App;

use App\Models\Project;
use Request;

class MainController extends DashboardController
{
    public function index(Request $request)
    {
        // $projects = Project::all();

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
