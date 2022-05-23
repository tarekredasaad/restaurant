<?php

namespace App\Http\Middleware;
//namespace App\Http\Controllers\Auth;
use Auth;
use Closure;
use Illuminate\Http\Request;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
       $age= Auth::User()->age;
        if($age < 15){
            return redirect()->route('home');
        }
        return $next($request);
    }
}
