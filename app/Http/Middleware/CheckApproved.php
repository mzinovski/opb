<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class CheckApproved
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
    	if(auth()->user()->getRoleNames()->implode(', ') == "" || auth()->user()->getRoleNames()->implode(', ') == null){
    		if (!auth()->user()->approved) {
	            return redirect()->route('approval');
	        }
    	}

        return $next($request);
    }
}
