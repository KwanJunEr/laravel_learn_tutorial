<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        //validation --> pass
        // $user = User::findOrFail($request->user_id);

        dd($role);
        $user = User::findOrFail($request->id);
        // if($user->role == 'admin'){
          if($user->role == $role){
            return $next($request);
        }
        return abort(404);
    }
}
