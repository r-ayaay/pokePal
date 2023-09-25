<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RegionCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $regions = array('kanto'=>'1', 'johto'=>'6');

        if($regions[$request->region] == auth()->user()->region || auth()->user()->champion){
            return $next($request);
        }
        else{
            return redirect('home')->with('error', 'You dont have access to this region yet. Become the pokemon champion of your Region first');
        }        
    }
}
