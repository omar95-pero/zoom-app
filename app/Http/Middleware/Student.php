<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
class Student {



    public function handle($request, Closure $next) {

        if ( auth()->user()->user_type == 'student' )
        {
            return $next($request);
        }
        toastr()->warning( 'غير مسموح لك' , 'انتبه' );
        return back();

    }


}
