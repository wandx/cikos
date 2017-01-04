<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use Closure;

class HasManyRole
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
        $cek = Admin::where('id',auth('admin')->user()->id)->with('role')->first();
        if(Admin::where('id',auth('admin')->user()->id)->with('role')->count() > 0){
            if(!session('role_selected')){
                if($cek->role->count() > 1){
                    return redirect()->route('bo.role_select');
                }else{
                    $role_id = 0;
                    foreach ($cek->role as $r){
                        $role_id = $r->id;
                    }
                    session(['role_selected' => true,'role_id' => $role_id]);
                }

            }
            return $next($request);
        }

        return abort(403);
    }
}
