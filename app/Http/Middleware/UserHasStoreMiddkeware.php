<?php

namespace App\Http\Middleware;

use Closure;

class UserHasStoreMiddkeware
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
        if(auth()->user()->store) {
            flash('Você já tem uma loja')->warning();
            return redirect()->route('admin.stores.index');
        }
        
        return $next($request);
    }
}
