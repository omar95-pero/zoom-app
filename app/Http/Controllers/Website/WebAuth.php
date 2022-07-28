<?php

namespace App\Http\Controllers\Website;

use App\User;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Mail;
use Auth;

class WebAuth extends Controller {


    public function register() {

        if ( Auth::user() ){
            return redirect( url('/') );
        }

        return view('website.websiteAuth.register');

    }

    public function do_register(Request $request) {


        $validator = Validator::make($request->all(),[
            'name'            => 'required|min:2|max:30',
            'email'           => 'required|email|unique:users',
            'password'        => 'required|min:6',
            'phone_code'      => 'required|numeric',
            'phone'           => 'required|numeric|unique:users',
            'parent_phone'    => 'required|numeric',
            'stage_id'        => 'required|exists:stages,id',
            'class_id'        => 'required|exists:classes,id',
            'department_id'   => 'nullable|exists:departments,id',
            'latitude'        => 'nullable',
            'longitude'       => 'nullable',
            'school_name'     => 'required',
            'address'         => 'required',
            'logo'            => 'nullable|image',
            'banner'          => 'nullable|image',
        ],[]);

        if ($validator->fails()) {
            $errors = collect( $validator->errors() )->flatten(1);
            foreach ($errors as $error) {
                toastr()->warning( $error , trans('admin.Message_title_attention'));
            }
            return back()->withInput();
        }

            $data = collect( $validator->validated() )->toArray();

            $data['user_type'] =  'student';

            $data['password']    =  Hash::make($request->password);

            $data['phone_login'] =  $request->password;


            if ($request->logo != '') {
                $data['logo']  = upload_image('users',$request->logo, 1, 'logo');
            }

            if ($request->banner != '') {
                $data['banner']  = upload_image('users',$request->banner, 1, 'banner');
            }

            $data['is_login']    = 'online';


//            return $data;

        $user = User::create($data);

        User::where('id', $user->id)->update([
            'code' => 'U-'.$user->id.rand(1000,9999),
        ]);




        Auth::login($user);
        toastr()->success('تم انشاء الحساب بنجاح', 'جيد'  );
        return redirect('/');

    }


    public function login() {
        if ( Auth::user() ){
            return redirect( url('/') );
        }
        return view('website.websiteAuth.login');
    }


    public function dologin() {
//        return request()->all();

        $rememberme = request('rememberme') == 1?true:false;

        if ( auth()->attempt(['email' => request('email'), 'password' => request('password') ], $rememberme) ) {

            toastr()->success('Login Successfully', trans('admin.Message_title_congratulation'));

            $user = Auth::user();

            if ( $user->user_type == 'student')
            {
                return redirect(url('student-subjects'));
            }

            if ( $user->user_type == 'teacher')
            {
                return redirect(url('teacher-profile'));
            }

            if ( $user->user_type == 'parent')
            {
                return redirect(url('parents-profile'));
            }


        } else {
            toastr()->warning( trans('admin.inccorrect_information_login') , trans('admin.Message_title_attention'));
            return redirect(url('login'))->withInput();
        }
    }


    public function logout() {
        auth()->logout();
        toastr()->success(trans('admin.logout_message'));
        return redirect(url('login'));
    }



//==================================================

    public function rest_password_form()
    {
        return view('website.websiteAuth.rest_password.rest_password_form');
    }


    public function rest_password(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'email'  => 'required|exists:users,email',
        ],[]);

        if ($validator->fails()) {
            $errors = collect( $validator->errors() )->flatten(1);
            foreach ($errors as $error) {
                toastr()->warning( $error , trans('admin.Message_title_attention'));
            }
            return back()->withInput();
        }


        $user_email = $validator->validated()['email'];
        $user       = User::where('email', $user_email)->first();
        $code = $user->id . rand(10000,99999);


        User::where('email', $user_email)->update([
            'forget_password_code' => $code
        ]);

        mail($user_email ,"Your Reset Code ",'Your Reset Code is '  . $code);

        $confirm_user       = User::where('email', $user_email)->first();

        return view('website.websiteAuth.rest_password.confirm_code_form', compact('confirm_user'));
    }

    public function confirm_code(Request $request)
    {

//        return $request->all();

        $validator = Validator::make($request->all(),[
            'id'                    => 'required',
            'forget_password_code'  => 'required',
        ],[]);

        if ($validator->fails()) {
            $errors = collect( $validator->errors() )->flatten(1);
            foreach ($errors as $error) {
                toastr()->warning( $error , trans('admin.Message_title_attention'));
            }
            return redirect( url('rest-password-form') );
        }

        $user_code = User::find( $request->id );

        if ($user_code->forget_password_code != $request->forget_password_code ) {
            toastr()->warning( 'Confirm code is Invalid' , trans('admin.Message_title_attention'));
            return redirect( url('rest-password-form') );
        }


        return view('website.websiteAuth.rest_password.update_password_form', compact('user_code'));;
    }


    public function update_password(Request $request)
    {

//        return $request->all();

        $validator = Validator::make($request->all(),[
            'id'                    => 'required',
            'password'              => 'min:6|required_with:password_confirmation|same:password_confirmation',
//            'password_confirmation' => 'min:6'
        ],[]);

        if ($validator->fails()) {
            $errors = collect( $validator->errors() )->flatten(1);
            foreach ($errors as $error) {
                toastr()->warning( $error , trans('admin.Message_title_attention'));
            }
            return redirect( url('rest-password-form') );
        }

        user::where('id', $request->id)->update([
            'password' => Hash::make($request->password),
        ]);

        $user = User::find( $request->id );
        Auth::login($user);


        return redirect(url('/profile').'?page=orders');

    }


//==================================================




}
