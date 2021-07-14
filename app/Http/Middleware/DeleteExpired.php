<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Subscriber;
use Auth;

class DeleteExpired
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
        $subs = Subscriber::get();
        foreach ($subs as $sub) 
        {
          if ($sub->expire == 0)
           {
            $sub->delete();
            return redirect('/dashboard/'.Auth::user()->id);
           }
            
        }
        return $next($request);
    }
}
