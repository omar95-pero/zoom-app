<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

//datatable
use App\DataTables\SliderDatatable;

//models
use App\Models\Slider;



class SliderController extends Controller
{

    public $page_titles = [
        'index'  => 'الاسليدرات',
        'create' => 'اضافة اسلايدر جديد',
        'edit'   => '',
    ];
//========================================= index =========================================
    public function index(SliderDatatable $slider)
    {
        return $slider->render('admin.sliders.index', ['page_titles' => $this->page_titles]);
    }

//========================================= create =========================================
    public function create()
    {
        return view('admin.sliders.create', [ 'page_titles' => $this->page_titles ]  );
    }

//========================================= store =========================================
    public function store()
    {

        $validator = Validator::make(request()->all(),
            [
                'title'     => 'required|max:150',
                'image'     => 'required|image',
                'is_shown'  => 'required|in:yes,no',
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

        if (request()->image != '') {
            $data['image']  = upload_image('sliders',request()->image, 1, 'image');
        }
        Slider::create($data);
        toastr()->success(trans('admin.Message_success'), trans('admin.Message_title_congratulation'));
        return redirect(aurl('slider'));
    }

//========================================= show =========================================
    public function show($id)
    {
        //
    }

//========================================= edit =========================================
    public function edit($id)
    {
        $slider = Slider::findorfail($id);
        $title  = ' تعديل بيانات ' . $slider->id ;
        $this->page_titles['edit'] = $title;
        return view('admin.sliders.edit', ['slider'=> $slider, 'page_titles' => $this->page_titles]);
    }

//========================================= update =========================================
    public function update(Request $r, $id)
    {

        $validator = Validator::make(request()->all(),
            [
                'title'     => 'required|max:150',
                'image'     => 'nullable|image',
                'is_shown'  => 'required|in:yes,no',
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

        if (request()->image != '')
        {
             $slider = Slider::findorfail($id);
             isset( $slider->image ) ? delete_image($slider->image) : '';
             $data['image']  = upload_image('sliders',request()->image, 1, 'image');
        }

        if ( request()->type == 'all')
        {
            $data['area_id']  = null ;
        }

        Slider::where('id', $id)->update($data);

        toastr()->success(trans('admin.Message_success'), trans('admin.Message_title_congratulation'));
        return redirect(aurl('slider'));

    }

//========================================= destroy =========================================
    public function destroy($id)
    {
        $slider = Slider::findorfail($id);
        isset( $slider->image ) ? delete_image($slider->image) : '';
        $slider->delete();
        toastr()->success(trans('admin.Message_delete'), trans('admin.Message_title_congratulation'));
        return redirect(aurl('slider'));
    }

//========================================= multi_delete =========================================
    public function multi_delete()
    {
        if (is_array(request('item')))
        {
            foreach ( request('item') as $item)
            {
                $slider = Slider::findorfail( $item );
                isset( $slider->image ) ? delete_image($slider->image) : '';
                $slider->delete();
            }
        } else
        {
            $slider = Slider::findorfail(request('item'));
            isset( $slider->image ) ? delete_image($slider->image) : '';
            $slider->delete();
        }
        session()->flash('success', trans('admin.deleted_record'));
        return redirect(aurl('slider'));
    }

}
