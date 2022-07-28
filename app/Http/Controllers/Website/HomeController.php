<?php
namespace App\Http\Controllers\Website;

use App\Http\Controllers\Admin\BasicDepartmentController;
use App\Http\Controllers\Controller;
use App\Models\SiteText;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Models\PhoneCode;

class HomeController extends Controller {

    public function index() {
        return view('website.index');
    }





} //end of class


