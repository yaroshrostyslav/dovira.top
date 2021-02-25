<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class IpAccess
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
        $list = DB::table('iplist')
            ->select('ip_address')
            ->get();

        foreach ($list as $ip){
            if($ip->ip_address == $request->ip()){
                abort(403, 'Access denided.');
            }
        }

        return $next($request);
    }

    private function getIp(){
        $list = DB::select('select ip_address from iplist');
        return $list;
    }


}
