<?php

namespace App\Http\Controllers;

use App\Services\GitForgeService;
use Cache;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use View;

class Controller extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

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
    }
}
