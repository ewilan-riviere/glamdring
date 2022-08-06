<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        return Project::paginate(20);
    }

    public function update(Request $request)
    {
        return [
            'auth' => auth()->check(),
            'request' => $request->all(),
        ];
    }
}
