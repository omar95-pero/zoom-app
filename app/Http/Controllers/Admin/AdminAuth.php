<?php
namespace App\Http\Controllers\Admin;
//use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
use App\Mail\AdminResetPassword;
use Carbon\Carbon;
use DB;
use Mail;

use App\Models\Admin;
use App\Models\User;

class AdminAuth extends Controller {

	//
	public function login() {
		return view('admin.adminAuth.login');
	}

	public function dologin() {
//	    return Admin::all();
		$rememberme = request('rememberme') == 1?true:false;
		if (admin()->attempt(['email' => request('email'), 'password' => request('password')], $rememberme)) {
            toastr()->success(trans('admin.login_message'));
			return redirect('admin');
		} else {
            toastr()->error( 'الايميل و / او كلمة المرور غير صحيح' , trans('admin.Message_title_attention'));
			return redirect(url('power'));
		}
	}

	public function logout() {
		auth()->guard('admin')->logout();
        toastr()->success(trans('admin.logout_message'));
		return redirect(url('power'));
	}

	public function forgot_password() {
		return view('admin.adminAuth.forgot_password');
	}


	public function forgot_password_post() {
		$admin = Admin::where('email', request('email'))->first();
		if (!empty($admin)) {
			$token = app('auth.password.broker')->createToken($admin);
			$data  = DB::table('password_resets')->insert([
					'email'      => $admin->email,
					'token'      => $token,
					'created_at' => Carbon::now(),
				]);
			Mail::to($admin->email)->send(new AdminResetPassword(['data' => $admin, 'token' => $token]));
			session()->flash('success', trans('admin.the_link_reset_sent'));
			return back();
		}
		session()->flash('error', 'Error Email ....!' );
		return back();
	}


	public function reset_password_final($token) {
		$this->validate(request(), [
				'password'              => 'required|confirmed',
				'password_confirmation' => 'required',
			], [], [
				'password'              => 'Password',
				'password_confirmation' => 'Confirmation Password',
			]);
		$check_token = DB::table('password_resets')->where('token', $token)->where('created_at', '>', Carbon::now()->subHours(2))->first();
		if (!empty($check_token)) {
			$admin = Admin::where('email', $check_token->email)->update([
					'email'    => $check_token->email,
					'password' => bcrypt(request('password'))
				]);
			DB::table('password_resets')->where('email', request('email'))->delete();
			admin()->attempt(['email' => $check_token->email, 'password' => request('password')], true);
			return redirect(aurl());
		} else {
			return redirect(aurl('forgot/password'));
		}
	}


	public function reset_password($token) {
		$check_token = DB::table('password_resets')->where('token', $token)->where('created_at', '>', Carbon::now()->subHours(2))->first();
		if (!empty($check_token)) {
			return view('admin.adminAuth.reset_password', ['data' => $check_token]);
		} else {
			return redirect(aurl('forgot/password'));
		}
	}


}
