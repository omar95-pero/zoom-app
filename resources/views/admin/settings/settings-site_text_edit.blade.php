@extends('admin.index')

<?php
$home_title    =  trans('admin.main_name' )  . ' | ' .   'Site Text'  ;
$first_title   = ["title"=>  'Site Text'  , "url"=> aurl('settings') ];
//$secind_title  = ["title"=>trans('admin.name' ), "url"=> aurl('name/create') ];
?>

@section('page_title')
    {{ $home_title }}
@endsection

@section('page-links')
    @include('admin.inc.__title')
@endsection


@section('content')

    <style>
        .table th, .table td
        {
            vertical-align: middle;
        }
    </style>

    <div class="box">

        <div class="box-header">
            <h3 class="box-title">{{ $home_title }}</h3>
        </div>

    {!! Form::open( ['route' => 'site_text_update',  'method' => 'POST','files'=>true] ) !!}


        {!! Form::hidden('id', $site_text->id ,['class'=>'form-control']) !!}

{{--        <div class="form-group">--}}
{{--            {!! Form::label('type', 'type' ) !!}--}}
{{--            {!! Form::text('type', $site_text->type ,['class'=>'form-control', 'disabled']) !!}--}}
{{--        </div>--}}


        <div class="form-group">
            {!! Form::label('image', 'الصورة' ) !!}
            <input data-validation-allowing="jpg, png, gif"  type="file" name="image" id="input-file-now-custom-1" class="dropify"
                   data-default-file="{{url('storage/').'/'. $site_text->image  }}">
        </div>

        <div class="form-group">
            {!! Form::label('title_ar', 'عنوان ' ) !!}
            {!! Form::text('title_ar', $site_text->title_ar ,['class'=>'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::label('desc_ar', 'وصف ' ) !!}
            {!! Form::textarea('desc_ar', $site_text->desc_ar ,['class'=>'form-control']) !!}
        </div>



      {!! Form::submit(trans('admin.edit'),['class'=>'btn btn-primary']) !!}

    {!! Form::close() !!}

    </div>



@endsection
