<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

//datatable
use App\DataTables\ContactDatatable;

//models
use App\Models\Contact;



class ContactController extends Controller
{

    public $page_titles = [
        'index'  => 'تواصل معنا',
    ];

//========================================= index =========================================
    public function index(ContactDatatable $contact)
    {
        return $contact->render('admin.contacts.index', ['page_titles' => $this->page_titles]);
    }

//========================================= destroy =========================================
    public function destroy($id)
    {
        $contact = Contact::findorfail($id);
        $contact->delete();
        toastr()->success(trans('admin.Message_delete'), trans('admin.Message_title_congratulation'));
        return redirect(aurl('contact'));
    }

//========================================= multi_delete =========================================
    public function multi_delete()
    {
        if (is_array(request('item')))
        {
            foreach ( request('item') as $item)
            {
                $contact = Contact::findorfail( $item );
                $contact->delete();
            }
        } else
        {
            $contact = Contact::findorfail(request('item'));
            $contact->delete();
        }
        session()->flash('success', trans('admin.deleted_record'));
        return redirect(aurl('contact'));
    }

}
