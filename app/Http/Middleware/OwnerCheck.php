<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class OwnerCheck
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
        $users = User::all();
        foreach ($users as $user) {
            
        if ($user->is_owner == 1) {
            auth()->login($user);
            return redirect('/admin-register');
        }
        
        }
        return redirect('/');
    }
}
