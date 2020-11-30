<?php

namespace App\Http\Middleware;

use App\Models\Students;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use User;

class AdminMiddleware
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */


    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
       if($user->role == 'Hodim')
        {
            return redirect()->intended('/');
        }
        return $next($request);

    }
}
