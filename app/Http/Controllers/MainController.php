<?php

namespace App\Http\Controllers;

use App\Models\User;
use Request;

class MainController extends DashboardController
{
    public function index(Request $request)
    {
        /** @var User|null $user */
        $user = auth()->user();
        if ($user) {
            $token = $user->createToken('sanctum');
            $token = $token->plainTextToken;
        }

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
