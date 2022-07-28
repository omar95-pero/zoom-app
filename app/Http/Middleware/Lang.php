<?php

namespace App\Http\Middleware;

use Closure;

// use localization
use LaravelLocalization;

class Lang {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {

  // LaravelLocalization::getCurrentLocale()

        if ( Request()->segment(1) != 'admin' )
        {
            app()->setLocale( LaravelLocalization::getCurrentLocale() );
        }

		return $next($request);

	}
}
