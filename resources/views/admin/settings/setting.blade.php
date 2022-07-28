@extends('admin.index')

<?php
$home_title    =  trans('admin.main_name' )  . ' | ' . trans('admin.setting' );
$first_title   = ["title"=>trans('admin.setting' ), "url"=> aurl('settings') ];
//$secind_title  = ["title"=>trans('admin.name' ), "url"=> aurl('name/create') ];
?>

@section('page_title')
    {{ $home_title }}
@endsection

@section('page-links')
    @include('admin.inc.__title')
@endsection


@section('content')
    @push('css')
        <style>
            .bg-setting
            {
                text-align: center !important;
                color: #f3f4fb;
                padding: 10px;
                background: #f4516cf5;
            }
        </style>
    @endpush

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ $home_title }}</h3>
        </div>
        <hr><br>

        @if(!setting())
            <div class="text-center">

                <h3>{{ trans('admin.there_is_no_setting') }}</h3>

                {!! Form::open( ['route' => 'operate_page',  'method' => 'POST'] ) !!}
                {!! Form::submit( trans('admin.click_here_to_setting') ,['class'=>'btn btn-primary text-center']) !!}
                {!! Form::close() !!}

            </div>
        @else
        <!-- /.box-header -->
            <div class="box-body">

                {!! Form::open( ['route' => 'send_settings',  'method' => 'POST','files'=>true] ) !!}


                <br><br>
                <hr>
                <h3 class="text-center bg-setting"> معلومات عامة </h3>
                <hr>
                <br><br>

                <div class="form-group">
                    {!! Form::label('title', 'اسم الموقع' ) !!}
                    {!! Form::text('title', setting()->title ,['class'=>'form-control']) !!}
                </div>


                <div class="row">
                    <div class="form-group col-md-6">
                        {!! Form::label('address1', '*عنوان 1' ) !!}
                        {!! Form::text('address1', setting()->address1 ,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group col-md-6">
                        {!! Form::label('address2', '*عنوان 2' ) !!}
                        {!! Form::text('address2', setting()->address2 ,['class'=>'form-control']) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        {!! Form::label('phone1', '*جوال 1' ) !!}
                        {!! Form::text('phone1',setting()->phone1,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group col-md-6">
                        {!! Form::label('phone2', '*جوال 2' ) !!}
                        {!! Form::text('phone2',setting()->phone2,['class'=>'form-control']) !!}
                    </div>
                </div>

                <div class="row">

                    <div class="form-group col-md-6">
                        {!! Form::label('web_site_name', '*لينك الموقع' ) !!}
                        {!! Form::text('web_site_name',setting()->web_site_name,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group col-md-6">
                        {!! Form::label('email1', '*الايميل' ) !!}
                        {!! Form::email('email1',setting()->email1,['class'=>'form-control']) !!}
                    </div>


                </div>


                <br><br>
                <hr>
                <h3 class="text-center bg-setting"> اللوجو</h3>
                <hr>
                <br><br>


                <div class="row">
                    <div class="form-group col-md-6">
                        {!! Form::label('header_logo', '*صورة اللوجو' ) !!}
                        <input data-validation-allowing="image/*"  type="file" name="header_logo" id="input-file-now-custom-1" class="dropify"
                               data-default-file="{{url('storage/').'/'. setting()->header_logo }}">
                    </div>

{{--                    <div class="form-group col-md-4">--}}
{{--                        {!! Form::label('footer_logo', '*صورة الفوتر' ) !!}--}}
{{--                        <input data-validation-allowing="image/*"  type="file" name="footer_logo" id="input-file-now-custom-1" class="dropify"--}}
{{--                               data-default-file="{{url('storage/').'/'. setting()->footer_logo }}">--}}
{{--                    </div>--}}

                    <div class="form-group col-md-6">
                        {!! Form::label('login_banner', '*صورة الخلفية' ) !!}
                        <input data-validation-allowing="image/*"  type="file" name="login_banner" id="input-file-now-custom-1" class="dropify"
                               data-default-file="{{url('storage/').'/'. setting()->login_banner }}">
                    </div>

                </div>



                <br><br>
                <hr>
                <h3 class="text-center bg-setting"> معلومات التواصل الاجتماعى  </h3>
                <hr>
                <br><br>

                <div class="row">
                    <div class="form-group col-md-6">
                        {!! Form::label('facebook', 'فيس بوك*' ) !!}
                        {!! Form::text('facebook',setting()->facebook,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group col-md-6">
                        {!! Form::label('twitter', 'تيوتر*' ) !!}
                        {!! Form::text('twitter',setting()->twitter,['class'=>'form-control']) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        {!! Form::label('instagram', 'انستجرام*' ) !!}
                        {!! Form::text('instagram',setting()->instagram,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group col-md-6">
                        {!! Form::label('whatsapp', 'واتساب*' ) !!}
                        {!! Form::text('whatsapp',setting()->whatsapp,['class'=>'form-control']) !!}
                    </div>


                </div>

{{--                <div class="row">--}}
{{--                    <div class="form-group col-md-6">--}}
{{--                        {!! Form::label('telegram', 'تليجرام*' ) !!}--}}
{{--                        {!! Form::text('telegram',setting()->telegram,['class'=>'form-control']) !!}--}}
{{--                    </div>--}}

{{--                    <div class="form-group col-md-6">--}}
{{--                        {!! Form::label('google_plus', 'جوجل بلس*' ) !!}--}}
{{--                        {!! Form::text('google_plus',setting()->google_plus,['class'=>'form-control']) !!}--}}
{{--                    </div>--}}
{{--                </div>--}}



{{--                <div class="row">--}}
{{--                    <div class="form-group col-md-6">--}}
{{--                        {!! Form::label('snapchat_ghost', 'سناب شات*' ) !!}--}}
{{--                        {!! Form::text('snapchat_ghost',setting()->snapchat_ghost	,['class'=>'form-control']) !!}--}}
{{--                    </div>--}}

{{--                    <div class="form-group col-md-6">--}}
{{--                        {!! Form::label('youtube', 'يوتيوب*' ) !!}--}}
{{--                        {!! Form::text('youtube',setting()->youtube,['class'=>'form-control']) !!}--}}
{{--                    </div>--}}
{{--                </div>--}}


{{--                <div class="form-group col-md-6">--}}
{{--                    {!! Form::label('linkedin', 'لينك ان*' ) !!}--}}
{{--                    {!! Form::text('linkedin',setting()->linkedin,['class'=>'form-control']) !!}--}}
{{--                </div>--}}

                <br><br>
                <hr>
                <h3 class="text-center bg-setting"> الشروط والاحكام </h3>
                <hr>
                <br><br>



{{--                <div class="form-group col-md-12">--}}
{{--                    {!! Form::label('about_website', 'معلومات عن الموقع' ) !!}--}}
{{--                    {!! Form::textarea('about_website',setting()->about_website,['class'=>'form-control textarea']) !!}--}}
{{--                </div>--}}


                <div class="form-group col-md-12">
                    {!! Form::label('about_app', 'معلومات عنا' ) !!}
                    {!! Form::textarea('about_app',setting()->about_app,['class'=>'form-control /*textarea*/']) !!}
                </div>


                <div class="form-group col-md-12">
                    {!! Form::label('ar_termis_condition', 'الشروط والاحكام' ) !!}
                    {!! Form::textarea('ar_termis_condition',setting()->ar_termis_condition,['class'=>'form-control {{--textarea--}}']) !!}
                </div>



                {!! Form::submit(trans('admin.edit'),['class'=>'btn btn-primary']) !!}

                {!! Form::close() !!}

            </div>
            <!-- /.box-body -->
        @endif
    </div>



@endsection
