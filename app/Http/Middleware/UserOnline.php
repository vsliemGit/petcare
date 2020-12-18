<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class UserOnline
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
        if(Auth::check()){
            $expireAt = Carbon::now()->addMinutes(1);
            if(!Cache::has('user-is-online-'.Auth::user()->id)){
                Cache::put('user-is-online-'.Auth::user()->id, true, 1);
            }
        }
        return $next($request);
    }
}
