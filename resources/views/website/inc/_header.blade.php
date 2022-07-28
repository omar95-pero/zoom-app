
<?php

    $user = '';

    if ( auth()->user() )
    {
      $user = auth()->user();
    }

?>

<!-- ================ Header ================= -->
<div id="Header" class="{{ request()->segment(1) != '' ? 'UnAnimatedNav' : '' }}">

    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top ">
        <div class="container">

            <div class="row w-100">

                <div class="col-lg-9 col-8 p-0 naVColl">
                    <!-- Navbar brand -->
                    <a class="navbar-brand" href="{{ url('/') }}"><img src=" {{ asset('website') }}/img/logo copy.png"></a>

                    <!-- Collapse button -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#MyNavbar"
                            aria-controls="MyNavbar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- Collapsible content -->
                    <div class="collapse navbar-collapse" id="MyNavbar">
                        <!-- Links -->
                        <ul class="navbar-nav mr-auto">


                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/') }}">الرئيسية</a>
                            </li>


                            @if( !$user || $user == '' )
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('login') }}">تسجيل الدخول </a>
                                </li>
                            @endif





                                @if( $user && $user != '' )


                                        @if( $user->user_type == 'student' )

                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ url('student-subjects') }}"> المواد </a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ url('centers') }}"> المراكز </a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ url('question-bank').'?student_id='.$user->id.'&stage_id='.$user->stage_id.'&class_id='.$user->class_id.'&department_id='.$user->department_id }}"> بنك الاسئلة </a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ url('honoraryBoard')}}">لوحة الشرف</a>
                                            </li>

                                        @elseif( $user->user_type == 'teacher' )
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ url('teacher-profile') }}"> البروفايل ( مدرس ) </a>
                                            </li>
                                        @elseif( $user->user_type == 'parent' )
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ url('parents-profile') }}"> البروفايل ( ولى امر ) </a>
                                            </li>
                                        @elseif( $user->user_type == 'center' )
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ url('center-profile') }}"> بيانات المركز </a>
                                            </li>
                                        @endif



                                        @if( $user->user_type == 'parent' || ( $user->is_parent == 'yes' && $user->user_type == 'teacher' ) )
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ url('my-sons') }}">  ابنائى </a>
                                            </li>
                                        @endif



                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('bookshops') }}"> المكتبة</a>
                                        </li>

                            @endif


                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('contact-us') }}">تواصل معنا</a>
                            </li>



                        </ul>

                    </div>

                </div>


                @if( $user && $user != '' )
                    <div class=" col-lg-3 col-4 p-0 navIcons ">

                        <div class=" d-flex justify-content-center align-items-center">




                            <?php $notification_counts = App\Models\Notification::where([ ['to_user_id', '=' ,$user->id], ['is_read', '=' ,'no'] ])->count(); ?>


                            <div class="nav-item">
                                <div class="nav-link notificationsIcon notification_action">
                                    <i class="fas fa-bell "></i>

                                    @if( $notification_counts > 0 )
                                         <span class="badge notification_count"> {{ $notification_counts }} </span>
                                    @endif

                                </div>


                                <div class=" notifications " style=" max-height: 400px;overflow: auto;">

                                    <h6 class=" font-weight-bold px-3 pt-2 pb-3 border-bottom"> الاشعارات </h6>
                                    <h5 class=" font-weight-bold"> </h5>


                                    @if( notifications( $user )->count() > 0 )

                                            @foreach( notifications( $user ) as $notification)

                                                <div class="row">

                                                    {{-- ==================== admin_to_users ====================  --}}
                                                        @if($notification->notification_type == 'admin_to_users')

                                                            <div class="col-3 p-1 d-flex justify-content-center align-items-center">
                                                                    <img src="{{url('/').'/'. 'admin.jpg'  }}">
                                                            </div>

                                                            <div class="col-9 p-1 pl-4">
                                                                <h6> الادارة </h6>
                                                                <p>{{ $notification->title }} </p>
                                                            </div>

                                                        @endif
                                                    {{-- ==================== admin_to_users ====================  --}}



                                                     {{-- ==================== relationship ==================== --}}
                                                        @if($notification->notification_type == 'relationship')

                                                            <div class="col-3 p-1 d-flex justify-content-center align-items-center">
                                                                <img src="{{ GetImg( $notification->from_user_fk ? $notification->from_user_fk->logo : '') }}">
                                                            </div>


                                                            <div class="col-9 p-1 pl-4">

                                                                <a href="{{ $notification->message == 'your_request_accepted' &&  ( $user->user_type == 'parent' || ( $user->is_parent == 'yes' && $user->user_type == 'teacher' ) ) ? url('my-sons') : '#' }}">


                                                                    @if($notification->message == 'new_request')
                                                                        <p> لديك طلب متابعه جديد من </p>
                                                                    @elseif($notification->message == 'your_request_accepted')
                                                                        <p>    تم قبول طلب المتابعة  </p>
                                                                    @elseif($notification->message == 'your_request_refused')
                                                                        تم رفض طلب المتابعة
                                                                    @endif

                                                                    <h6>{{ $notification->from_user_fk != '' ? $notification->from_user_fk->name : 'بلا اسم' }} </h6>

                                                                    @if($notification->message == 'new_request' || $notification->action_type == 'with_action' && $notification->admin_id == '')
                                                                        <form action="{{url('change-notification-status')}}" method="post" enctype="multipart/form-data">
                                                                            @csrf
                                                                            <div class="col-12 p-1 d-flex justify-content-center align-items-center">
                                                                                <input name="parent_with_son_id" value="{{ $notification->id }}" type="hidden">
                                                                                <div class="btn-group">
                                                                                    <button type="submit" name="status" value="no_accepted" class="btn btn-danger px-3 py-2 btn-rounded"> رفض </button>
                                                                                    <button type="submit" name="status" value="accepted" class="btn btn-success px-3 py-2 btn-rounded"> موافق </button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    @endif

                                                                </a>
                                                            </div>

                                                        @endif
                                                     {{-- ==================== relationship ==================== --}}





                                                    {{-- ==================== share_teacher ====================  --}}
                                                    @if($notification->notification_type == 'share_teacher' || $notification->notification_type == 'share_center')

                                                        <div class="col-3 p-1 d-flex justify-content-center align-items-center">
                                                            <img src="{{ GetImg( $notification->from_user_fk ? $notification->from_user_fk->logo : '') }}">
                                                        </div>

                                                        <div class="col-9 p-1 pl-4">
                                                            @if($notification->notification_type == 'share_teacher' || $notification->notification_type == 'share_center')
                                                            <a href="{{ $notification->notification_type == 'share_teacher' ? url('show_teacher_profile').'?teacher_id='.$notification->share_id : url('GetGroupsInsideCenter').'?center_id='.$notification->share_id }}">
                                                                <h6>{{ \App\User::find( $notification->from_user_id )->name }} </h6>
                                                                <p> {{ $notification->title }} <span style="color: #0a8cf0; margin: 0 auto" class="text-center"> اضغط هنا للمتابعة </span> </p>
                                                            </a>
                                                            @endif
                                                        </div>

                                                    @endif
                                                    {{-- ==================== share_teacher ====================  --}}




                                                    {{-- ==================== exam ====================  --}}
                                                    @if($notification->notification_type == 'exam' )

                                                        <div class="col-3 p-1 d-flex justify-content-center align-items-center">
                                                            <img src="{{ GetImg( $notification->from_user_fk ? $notification->from_user_fk->logo : '') }}">
                                                        </div>

                                                        <div class="col-9 p-1 pl-4">
                                                            <a href="{{ url('student-exams').'/'.$notification->exam_id }}">
                                                                <h6>{{ $notification->from_user_fk != '' ? $notification->from_user_fk->name : 'بلا اسم' }} </h6>
                                                                <p> {{ $notification->title }} <span style="color: #0a8cf0; margin: 0 auto" class="text-center"> اضغط هنا للمتابعة </span> </p>
                                                            </a>
                                                        </div>

                                                    @endif
                                                    {{-- ==================== exam ====================  --}}



                                                    {{-- ==================== live_stream ====================  --}}
                                                    @if($notification->notification_type == 'live_stream' )

                                                        <div class="col-3 p-1 d-flex justify-content-center align-items-center">
                                                            <img src="{{ GetImg( $notification->from_user_fk ? $notification->from_user_fk->logo : '') }}">
                                                        </div>

                                                        <div class="col-9 p-1 pl-4">
                                                            <a href="#">
                                                                <h6>{{ $notification->from_user_fk != '' ? $notification->from_user_fk->name : 'بلا اسم' }} </h6>
                                                                <p> {{ $notification->title }} <span style="color: #0a8cf0; margin: 0 auto" class="text-center">  </span> </p>
                                                            </a>
                                                        </div>

                                                    @endif
                                                    {{-- ==================== exam ====================  --}}





                                                </div>

                                            @endforeach

                                    @else
                                        <h6 class="text-center">   لا يوجد عناصر لعرضها ( {{ notifications( $user )->count() }} ) </h6>
                                    @endif

                                </div>


                            </div>




                            <div class="nav-item dropdown">

                                <a class="nav-link dropdown-toggle" id="userProfile" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false">
                                    <?php
//                                        $logo = '';  $user->logo != '' ? $logo = url('storage/').'/'.$user->logo : $logo = asset('website').'/img/300_13.jpg';
                                    ?>
{{--                                    <img src="{{ $logo }}" class=" useImg">--}}
                                    <img src="{{ GetImg( $user->logo ) }}" class=" useImg">
                                </a>


                                <div class="dropdown-menu profileDropdown dropdown-warning" aria-labelledby="userProfile">

                                   @if( $user->user_type == 'student' )
                                       <a class="dropdown-item" href="{{ url('profile') }}"> <i class="fas fa-user color2 mx-1"></i> البروفايل</a>
                                       <a class="dropdown-item" href="{{ url('accountStatement') }}"> <i class="fas fa-book color2 mx-1"></i>كشف الحساب</a>
                                       <a class="dropdown-item" href="{{ url('subject-exams') }}"> <i class="fas fa-book color2 mx-1"></i> الاختبارات</a>
                                       <a class="dropdown-item" href="{{ url('profile-setting') }}"> <i class="fas fa-cog color2 mx-1"></i> الاعدادت</a>
                                    @elseif( $user->user_type == 'teacher' )
                                        <a class="dropdown-item" href="{{ url('accountStatement') }}"> <i class="fas fa-book color2 mx-1"></i>كشف الحساب</a>
                                        <a class="dropdown-item" href="{{ url('teacher-exams') }}"> <i class="fas fa-book color2 mx-1"></i> الاختبارات</a>
                                        <a class="dropdown-item" href="{{ url('teacher-profile-setting') }}"> <i class="fas fa-cog color2 mx-1"></i> الاعدادت</a>
                                    @elseif( $user->user_type == 'parent' )
                                        <a class="dropdown-item" href="{{ url('parents-profile-setting') }}"> <i class="fas fa-cog color2 mx-1"></i> الاعدادت</a>
                                    @elseif( $user->user_type == 'center' )
                                        <a class="dropdown-item" href="{{ url('center-profile') }}"><i class="fas fa-cog color2 mx-1"></i> بيانات المركز </a>
                                        <a class="dropdown-item" href="{{ url('center-profile-setting') }}"><i class="fas fa-edit color2 mx-1"></i>  اعدادات البروفايل  </a>
                                    @endif

                                       <a class="dropdown-item" href="{{ url('logout') }}"><i class="fas fa-sign-out-alt color2 mx-1"></i> تسجيل الخروج </a>

                                </div>


                            </div>
                        </div>

                    </div>
                @endif


            </div>
        </div>
    </nav>

</div>
<!-- ================ /Header ================= -->

