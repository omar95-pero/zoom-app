<?php

namespace App\Http\Controllers\Admin\Meets;

use App\DataTables\ZoomDatatable;
use App\Http\Controllers\Controller;
use App\Models\Meeting;
use Illuminate\Http\Request;
use MacsiDigital\Zoom\Facades\Zoom;

class MeetingController extends Controller
{
    public $page_titles = [
        'index'  => 'زووم',
        'create' => 'اضافة رابط جديد',
        'edit'   => '',
    ];
   public function index(ZoomDatatable $zoom){
       return $zoom->render('admin.meetings.index', ['page_titles' => $this->page_titles]);
   }


    public function create()
    {
        return view('admin.meetings.create', [ 'page_titles' => $this->page_titles ]  );
    }
    public function store(Request $request){
        $user = Zoom::user()->first();
//        $users = Zoom::user()->all();
//        $user = Zoom::user()->find('omarpero85@gmail.com')->update(['status' =>'active']);
//        return $user;
        $meetingData = [
            'topic' => $request->topic,
            'duration' => $request->duration,
            'password' => 'omarpero',
            'start_time' => $request->start_time,
//            'timezone' => config('zoom.timezone')
             'timezone' => 'Africa/Cairo'
        ];
        $meeting = Zoom::meeting()->make($meetingData);
        $meeting->settings()->make([
            'join_before_host' => true,
            'host_video' => true,
            'participant_video' => true,
            'mute_upon_entry' => true,
            'waiting_room' => true,
            'approval_type' => config('zoom.approval_type'),
            'audio' => config('zoom.audio'),
            'auto_recording' => config('zoom.auto_recording')
        ]);

        $info = $user->meetings()->save($meeting);
               Meeting:: create([
                   'duration'=>$info->duration,
                   'password'=>$info->password,
                   'start_at'=>$info->start_time,
//                   'user_id'=>$info->user_id,
                   'meeting_id'=>$info->id,
                   'topic'=>$info->topic,
                   'start_url'=>$info->start_url,
                   'join_url'=>$info->join_url,

               ]);
//        return $user;

        return  view('admin.meetings.edit',['meeting_id'=>$info->id]);
//        return  redirect()->route('zoom.index');
    }

}
