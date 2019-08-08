<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;

class CheckIsAdminOdSelf
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
        $requestedUserId = $request->route()->parameter('id');

        
        if (Auth::user()->role_id === 1 || Auth::user()->id === $requestedUserId) {
            return $next($request);
        } else {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
    }
}
