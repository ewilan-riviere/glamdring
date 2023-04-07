<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;
use App\Services\GitForgeService;
use Auth;
use Cache;
use View;

class DashboardController extends Controller
{
    public function __construct()
    {
        // Cache::flush();
        $service = Cache::get('service');

        if (! $service) {
            $service = GitForgeService::create();
            $service->fetchUser();
            Cache::add('service', $service);
        }
        View::share('forge_user', $service->forge_user);
        View::share('projects_count', Project::count());
        View::share('token', '');

        $this->middleware('auth:sanctum');
        $this->middleware(function ($request, $next) {
            /** @var User|null $user */
            $user = Auth::user();
            $token = '';

            if ($user) {
                $token = $user->createToken('sanctum');
                $token = $token->plainTextToken;
            }

            View::share('token', $token);

            return $next($request);
        });
    }
}
