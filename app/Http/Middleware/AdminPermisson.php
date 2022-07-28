<?php

namespace App\Http\Middleware;

use Closure;

class AdminPermisson
{



    public function handle($request, Closure $next, $role)
    {
//      if (admin()->user()->group_id === null || admin()->user()->group->$role == 'disable') {
//        toastr()->warning( 'ليس لديك الصلاحية للدخول هنا' , trans('admin.Message_title_attention'));
//        return back();
//      }
        return $next($request);
    }



}
