<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Stage;
use App\Models\Class_;
use App\Models\Department;
use App\User;

class SelectorController extends Controller {


// =====================================================
    public function select() {


        return response()->json( ['html' => '', 'status'=> ''] );
    }
// =====================================================


}
