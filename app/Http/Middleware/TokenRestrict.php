<?php

namespace App\Http\Middleware;

use App\Models\AccessToken;
use Closure;

class TokenRestrict
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
        $data = [
            'error' => true,
            'message' => 'Access token required'
        ];

        $token = $request->header('access_token');
        $check = AccessToken::where('token',$token)->first();
        if($check != null){

            if($check->request_limit != 0 && $check->request_count >= $check->request_limit){
                $data['message'] = 'Limit reached';
                return $data;
            }

            if($check->status == 'suspend'){
                $data['message'] = 'Token suspend';
                return $data;
            }
            // increment request count in every request
            $current_req = $check->request_count;
            $add = $current_req + 1;
            AccessToken::where('token',$token)->update(['request_count'=>$add]);

            return $next($request);

        }else{
            $data['message'] = 'Invalid token';
        }
        return $data;
    }
}
