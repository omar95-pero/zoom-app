<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
class Teacher {



    public function handle($request, Closure $next) {

        if ( auth()->user()->user_type == 'teacher' )
        {
            return $next($request);
        }
        toastr()->warning( 'غير مسموح لك' , 'انتبه' );
        return back();

    }


}
