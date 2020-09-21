<?php

namespace App\Http\Middleware;

use App\Models\Adm;
use App\Models\Editor;
use Closure;
use Illuminate\Http\Request;

class Autenticador
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
        if(!Editor::check() || Adm::check()) return redirect("/");

        return $next($request);
    }
}
