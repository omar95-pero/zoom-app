<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
class Parent_ {



    public function handle($request, Closure $next) {

        if ( auth()->user()->user_type == 'parent' )
        {
            return $next($request);
        }
        toastr()->warning( 'غير مسموح لك' , 'انتبه' );
        return back();

    }


}
