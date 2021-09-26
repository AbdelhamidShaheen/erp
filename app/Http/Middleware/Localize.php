<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Url;
use Illuminate\Support\Facades\Route;

class Localize
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
       
     
        $lang=in_array($request->lang,["ar","en"])?$request->lang:App::getLocale();
      
        Url::defaults(['lang'=>$lang]);
       
        App::setLocale($lang);
      
        $request->route()->forgetParameter('lang');

        return $next($request);

    }
}
