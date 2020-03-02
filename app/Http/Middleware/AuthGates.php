<?php

namespace App\Http\Middleware;

use App\Role;
use Closure;
use Illuminate\Support\Facades\Gate;

class AuthGates
{
    public function handle($request, Closure $next)
    {   
        // get user in session
        $user = \Auth::user();
        // if its not console app get all roles 
        if (!app()->runningInConsole() && $user) {
            $roles = Role::with('permissions')->get();
            $permissionsArray = [];

        // get all the roles and store them in permissions
            foreach ($roles as $role) {
                foreach ($role->permissions as $permissions) {
                    $permissionsArray[$permissions->title][] = $role->id;
                }
            }
            
        // define alot of gates for every session or request
            foreach ($permissionsArray as $title => $roles) {
                Gate::define($title, function (\App\User $user) use ($roles) {
                    return count(array_intersect($user->roles->pluck('id')->toArray(), $roles)) > 0;
                });
            }
        }

        return $next($request);
    }
}
