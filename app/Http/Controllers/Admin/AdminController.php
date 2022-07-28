<?php
namespace App\Http\Controllers\Admin;

// use admin datatable
use App\DataTables\AdminDatatable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\Admin;


use Illuminate\Support\Facades\Validator;


class AdminController extends Controller {

//	public function __construct()
//  {
//      $this->middleware('permission:admin_show'   , ['only' => 'index', 'show']);
//      $this->middleware('permission:admin_edit'   , ['only' => 'edit', 'update']);
//      $this->middleware('permission:admin_delete' , ['only' => 'destroy', 'multi_delete']);
//      $this->middleware('permission:admin_add'    , ['only' => 'create', 'store']);
//  }




    //========================================= index =========================================
	public function index(AdminDatatable $admin) {
		return $admin->render('admin.admins.index', ['title' => 'Admins']);
	}


 //========================================= create =========================================
	public function create() {
			return view('admin.admins.create', [ 'title' => trans('admin.create_admin') ]  );
	}


//========================================= store =========================================
	 public function store() {


//	    return request()->all();

			$validator = Validator::make(request()->all(),
					[
						'name'     => 'required',
						'email'    => 'required|email|unique:admins',
						'password' => 'required|min:6',
//						'group_id' => 'required',


					], [], [
						'name'     => trans('admin.name'),
						'email'    => trans('admin.email'),
						'password' => trans('admin.password'),
//						'group_id' => 'الصلاحية مطلوبة',
					]
				);

	        if ($validator->fails()) {
                    $errors = collect( $validator->errors() )->flatten(1);
                    foreach ($errors as $error) {
                        toastr()->warning( $error , trans('admin.Message_title_attention'));
                    }
                    return back()->withInput();
	        }


//         if (request()->admin_type == 'admin' && request()->group_id == '' ) {
//                 toastr()->warning( 'التصريح مطلوب' , trans('admin.Message_title_attention'));
//                 return back()->withInput();
//         }

	           $data =  $validator->validated();

				$data['password'] = bcrypt(request('password'));


                 if (request()->image != '') {
                     $data['image']  = upload_image('admins',request()->image, 1, 'image');
                 }


                Admin::create($data);

            toastr()->success(trans('admin.Message_success'), trans('admin.Message_title_congratulation'));
            return redirect(aurl('admin'));

 	}

//========================================= show =========================================
	public function show($id) {
		//
	}


//========================================= edit =========================================
	 public function edit($id) {

		 		$admin = Admin::findorfail($id);
		 		$title = trans('admin.edit');
		 		return view('admin.admins.edit', compact('admin'));

 	}

//========================================= update =========================================
	 public function update(Request $r, $id) {

         $validator = Validator::make(request()->all(),
             [
                 'name'     => 'required',
                 'email'    => 'required|email|unique:admins,email,'.$id,
//                 'group_id' => 'required',


             ], [], [
                 'name'     => trans('admin.name'),
                 'email'    => trans('admin.email'),
//                 'group_id' => 'الصلاحية مطلوبة',
             ]
         );

         if ($validator->fails()) {
             $errors = collect( $validator->errors() )->flatten(1);
             foreach ($errors as $error) {
                 toastr()->warning( $error , trans('admin.Message_title_attention'));
             }
             return back()->withInput();
         }


//         if (request()->admin_type == 'admin' && request()->group_id == '' ) {
//             toastr()->warning( 'التصريح مطلوب' , trans('admin.Message_title_attention'));
//             return back()->withInput();
//         }

         $data =  $validator->validated();

         if ( request('password') != null ) {
             $data['password'] = bcrypt(request('password'));
         }

         if (request()->image != '') {
             $data['image']  = upload_image('admins',request()->image, 1, 'image');
         }


         Admin::where('id', $id)->update($data);


 		toastr()->success(trans('admin.Message_success'), trans('admin.Message_title_congratulation'));
 		return redirect(aurl('admin'));

 	}

	//========================================= destroy =========================================
	 public function destroy($id) {

	 		Admin::findorfail($id)->delete();
			toastr()->success(trans('admin.Message_delete'), trans('admin.Message_title_congratulation'));
	 		return redirect(aurl('admin'));

 	}

//========================================= multi_delete =========================================
 	public function multi_delete() {

		// return request()->all();

	 		if (is_array(request('item'))) {
	 			Admin::destroy(request('item'));
	 		} else {
	 			Admin::findorfail(request('item'))->delete();
	 		}
	 		session()->flash('success', trans('admin.deleted_record'));
	 		return redirect(aurl('admin'));

 	}

}
