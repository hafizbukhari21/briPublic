<?php

namespace App\Http\Middleware;

use App\Models\users_table;
use Closure;
use Illuminate\Http\Request;


class ceo
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
        $checkRole = users_table::select("role")->where("id","=",session()->get("sessionKey")["id"])->first();

        if($checkRole->role==1) return $next($request);
        return redirect("/logout");
    }
}
