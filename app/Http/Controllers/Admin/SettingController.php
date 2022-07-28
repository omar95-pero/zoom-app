<?php
namespace App\Http\Controllers\Admin;

// use admin datatable
use App\Admin;
use App\DataTables\AdminDatatable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Setting;
use App\Models\SiteText;

use App\Models\Brand;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class SettingController extends Controller
{


    public function setting_page()
    {
		// return Setting::all();
		return view('admin.settings.setting');
	}

    public function operate_page()
    {
        $setting = Setting::create([
            'header_logo'  => ''
        ]);
        toastr()->success('Now, You Can Set Your Settings .', trans('admin.Message_title_congratulation'));
        return back();
    }

    public function send_settings(Request $request)
	{

        $validator = Validator::make($request->all(),[

            'title'                 => 'nullable',
            'address1'              => 'nullable',
            'address2'              => 'nullable',
            'phone1'                => 'nullable',
            'phone2'                => 'nullable',
            'email1'                => 'nullable',
            'email2'                => 'nullable',
            'desc'                  => 'nullable',
            'footer_desc'           => 'nullable',
            'facebook'              => 'nullable',
            'twitter'               => 'nullable',
            'instagram'             => 'nullable',
            'linkedin'              => 'nullable',
            'telegram'              => 'nullable',
            'google_plus'           => 'nullable',
            'snapchat_ghost'        => 'nullable',
            'youtube'               => 'nullable',
            'whatsapp'              => 'nullable',
            'about_app'             => 'nullable',
            'about_website'         => 'nullable',
            'ar_termis_condition'   => 'nullable',

        ],[]);

        if ($validator->fails()) {
            $errors = collect( $validator->errors() )->flatten(1);
            foreach ($errors as $error) {
                toastr()->warning( $error , trans('admin.Message_title_attention'));
            }
            return back();
        }

        $data = $validator->validated();


        if (request()->header_logo != '') {
            $data['header_logo']  = upload_image('setting',request()->header_logo, 1, 'header_logo');
        }

        if (request()->footer_logo != '') {
            $data['footer_logo']  = upload_image('setting',request()->footer_logo, 1, 'footer_logo');
        }

        if (request()->login_banner != '') {
            $data['login_banner']  = upload_image('setting',request()->login_banner, 1, 'login_banner');
        }

        Setting::where('id', setting()->id)->update($data);
        toastr()->success(trans('admin.Message_success'), trans('admin.Message_title_congratulation'));
 		return redirect(aurl('settings'));

	}

    public function settings_site_text()
    {
        // return Setting::all();
        return view('admin.settings.settings_site_text');
    }

    public function site_text_edit($id)
    {
        $site_text = SiteText::findorfail($id);
        return view('admin.settings.settings-site_text_edit' , compact('site_text'));
    }

    public function site_text_update()
    {
//        return request()->all();

        $validator = Validator::make(request()->all(),
            [
                'title_ar'    => 'required',
//                'title_en'    => 'required',
                'desc_ar'     => 'nullable',
//                'desc_en'     => 'nullable',
            ], [], [
                'title_ar'     =>'عنوان (ar)',
//                'title_en'     =>'عنوان (en)',
            ]
        );

        if ($validator->fails()) {
            $errors = collect( $validator->errors() )->flatten(1);
            foreach ($errors as $error) {
                toastr()->warning( $error , trans('admin.Message_title_attention'));
            }
            return back()->withInput();
        }


        $data =  $validator->validated();

        if (request()->image != '') {
            $data['image']  = upload_image('site_text',request()->image, 1, 'image');
        }


        SiteText::where('id', request()->id)->update($data);
        toastr()->success(trans('admin.Message_success'), trans('admin.Message_title_congratulation'));
        return redirect(aurl('site_text'));
    }


//    brands
    public function brand($id = '')
    {
         $brand =  Brand::find($id);
        return view('admin.settings.brands', compact('brand') );
    }

    public function brand_update()
    {
//        return request()->all();

        $validator = Validator::make(request()->all(),
            [
                'title'    => 'nullable',
                'desc'     => 'nullable',
            ], [], []
        );

        if ($validator->fails()) {
            $errors = collect( $validator->errors() )->flatten(1);
            foreach ($errors as $error) {
                toastr()->warning( $error , trans('admin.Message_title_attention'));
            }
            return back()->withInput();
        }


        $data =  $validator->validated();

        if (request()->main_image != '') {
            $data['main_image']  = upload_image('brands', request()->main_image, 1, 'main_image');
        }


        Brand::where('id', request()->id)->update($data);
        toastr()->success(trans('admin.Message_success'), trans('admin.Message_title_congratulation'));
        return back();
    }


// ================ start multi image =====================

    public function upload_file()
    {
        if ( request()->hasFile('file') ) {
            $fid = up()->upload([
                'file'        => 'file',
                'path'        => 'brands/'.request()->id,
                'upload_type' => 'files',
                'file_type'   => 'brand',
                'model_type'  => 'brand',
                'relation_id' => request()->id,
            ]) ;

            return response()->json(['status' => true, 'id' => $fid]);
        }
    }

    public function delete_file()
    {
        if ( request()->has('id') ) {
            up()->delete( request('id') , 'brand' );
        }
    }

// ================ end multi image =======================



}
