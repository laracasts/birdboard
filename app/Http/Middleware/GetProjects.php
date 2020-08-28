<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Http\Menus\GetSidebarMenu;
use App\Models\Menulist;
use App\Models\RoleHierarchy;
use Spatie\Permission\Models\Role;

class GetProjects
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()){
            $projects = auth()->user()->accessibleProjects();
        }
        view()->share('projects', $projects );
        return $next($request);
    }
}