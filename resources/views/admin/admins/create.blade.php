@extends('admin.index')

    <?php
    $home_title    =     trans('admin.add' ) .' | '. 'اضافة مشرف';
    $first_title   = ["title"=> trans('admin.admins' ) , "url"=> aurl('admin') ];
    $secind_title  = ["title"=>  'اضافة مشرف'  , "url"=> aurl('admin/create') ];
    ?>

    @section('page_title')
        {{ $home_title }}
    @endsection

    @section('page-links')
        @include('admin.inc.__title')
    @endsection


@section('content')


  <div class="box">

      <div class="box-header">
          <h3 class="box-title">{{ $home_title }}</h3>
      </div>
      <hr><br>
      <!-- /.box-header -->

      {!! Form::open( ['route' => 'admin.store',  'method' => 'POST','files'=>true] ) !!}


      <div class="form-group">
          {!! Form::label('image', 'الصورة') !!}
          <input type="file" name="image" id="input-file-now-custom-1" class="dropify"
                 data-default-file="">
      </div>


      <div class="form-group">
          {!! Form::label('name',trans('admin.name')) !!}
          {!! Form::text('name',old('name'),['class'=>'form-control']) !!}
      </div>

      <div class="form-group">
          {!! Form::label('email',trans('admin.email')) !!}
          {!! Form::email('email',old('email'),['class'=>'form-control']) !!}
      </div>

      <div class="form-group">
          {!! Form::label('password',trans('admin.password')) !!}
          {!! Form::password('password',['class'=>'form-control']) !!}
      </div>


{{--      <div class="form-group">--}}
{{--          {!! Form::label('group_id', trans('admin.Permission_name') ) !!}--}}
{{--          {!! Form::select('group_id',App\Models\AdminGroup::pluck('name','id'),old('group_id'),--}}
{{--                                ['class'=>'form-control selectpicker',--}}
{{--                                'data-live-search'=>'true', 'data-validation'=>'required',--}}
{{--                                'aria-required'=>'true', 'placeholder'=>trans('admin.choose') ]) !!}--}}
{{--      </div>--}}



      {!! Form::submit(trans('admin.add'),['class'=>'btn btn-primary']) !!}
      {!! Form::close() !!}



  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->



@endsection
