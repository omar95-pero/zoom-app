<?php
namespace App\Http\Controllers\Admin;

// use admin datatable
use App\DataTables\UserDatatable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Validator;


class UserController extends Controller {

//========================================= index =========================================
    public function index(UserDatatable $user) {
        return $user->render('admin.users.index', ['title' => 'الاعضاء']);
    }

//========================================= show =========================================
    public function show($id) {
        //
    }

//========================================= destroy =========================================
    public function destroy($id) {

        $user = User::findorfail( $id );
        delete_image($user->icon);
        $user->delete();

        toastr()->success(trans('admin.Message_delete'), trans('admin.Message_title_congratulation'));
        $path_ = 'user';
        return redirect(aurl($path_));

    }

//========================================= multi_delete =========================================
    public function multi_delete() {

        // return request()->all();

        if (is_array(request('item'))) {

            foreach (request('item') as $item)
            {
                $user = User::findorfail( $item );
                delete_image($user->icon);
            }


            User::destroy(request('item'));
        } else {
            $user = User::findorfail( request('item') );
            delete_image($user->icon);
            $user->delete();
        }
        toastr()->success(trans('admin.Message_delete'), trans('admin.Message_title_congratulation'));
        $path_ = 'user';
        return redirect(aurl($path_));

    }

//======================================= user_block =======================================
    public function user_block()
    {


        $validator = Validator::make(request()->all(),
            [
                'is_blocked'      => 'required',
            ], []
        );

        if ($validator->fails()) {
            $errors = collect($validator->errors())->flatten(1);
            foreach ($errors as $error) {
                toastr()->warning($error, trans('admin.Message_title_attention'));
            }
            return response()->json(['errors' => $errors, 'debug' => 1], 200);
        }


        $data = $validator->validated();


        User::where('id', request()->id)->update($data);
        toastr()->success(trans('admin.Message_success'), trans('admin.Message_title_congratulation'));

        return redirect(aurl('user'));
    }

}
