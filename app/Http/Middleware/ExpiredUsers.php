<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class ExpiredUsers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = User::where('is_owner' , 0)->first();
            if ($user->expire == 0) {
                Auth::logout();
                return redirect('/');
            }



        return $next($request);
    }
}
