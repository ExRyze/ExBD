<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, String|Array $role): Response
    {
        $allow = false;
        switch ($role) {
            case str_contains($role, '|') :
                $roles = explode('|', $role);
                foreach ($roles as $role) {
                    if (auth()->user()->role === $role) {
                        $allow = true;
                    }
                }
                break;
                
            default :
                if (auth()->user()->role === $role) {
                    $allow = true;
                }
                break;
        }
        
        if (!$allow) {
            return redirect('/');
        }

        return $next($request);
    }
}