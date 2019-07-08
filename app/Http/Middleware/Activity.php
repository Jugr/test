<?php
namespace App\Http\Middleware;

use Closure;
class Activity{


    public function  handle($request,Closure $next){
        if(time()<strtotime('2019-07-05')){
            return redirect('activity0');
        }

        return $next($request);
    }

}