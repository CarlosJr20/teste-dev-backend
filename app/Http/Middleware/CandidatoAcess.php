<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CandidatoAcess
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
        $user = auth()->user();
        if($user->candidato == 1){
            return $next($request);

        }
        else if($user->recrutador == 1){
            return $next($request);
        }
       
       
    }

}