<?php

namespace App\Http\Middleware;

use App\Models\Menu;
use Closure;

class UserRestrict
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$menu)
    {
        $hasAccess = false;

        $cekRoleSession = session()->has('role_id');
        if($cekRoleSession){
            $cekMenu = Menu::whereHas('role',function($q){
                $q->where('id',session('role_id'));
            })->where('name',$menu)->count();

            if($cekMenu > 0){
                $hasAccess = true;
            }
        }

        if($hasAccess){
            return $next($request);
        }

        return abort(403,'raoleh');
    }
}
