<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class LocalizationCheck {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        if(isset($_COOKIE['locale']))
        {
            App::setLocale($_COOKIE['locale']);
        }

//        dump($_COOKIE['locale']);

		return $next($request);
	}

}
