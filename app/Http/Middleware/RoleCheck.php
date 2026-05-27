<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (!auth()->check()) {
            return redirect()->route('admin.loginPage');
        }
        if (auth()->user()->role != $role) {
            abort(403);
            return redirect()->back()->with('error', 'You do not have permission to perform this action');
        }
        return $next($request);
    }
}
