@extends('admin.index')

    <?php
        $home_title    = $page_titles['index'] .' | '. $page_titles['create'];
        $first_title   = ["title"=> $page_titles['index'] , "url"=> aurl('slider') ];
        $secind_title  = ["title"=>  $page_titles['create']  , "url"=> aurl('slider/create') ];
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

      {!! Form::open( ['route' => 'slider.store',  'method' => 'POST','files'=>true] ) !!}


      <div class="form-group">
          {!! Form::label('image', 'الصورة') !!}
          <input type="file" name="image" id="input-file-now-custom-1" class="dropify"
                 data-default-file="">
      </div>

      <div class="row">

          <div class="form-group col-md-6">
              {!! Form::label('title', 'العنوان') !!}
              {!! Form::text('title',old('title'),['class'=>'form-control']) !!}
          </div>

          <div class="form-group col-md-6">
              {!! Form::label('is_shown', 'نوع العرض' ) !!}
              <select name="is_shown" class="form-control selectpicker m-input title area_place_cls" data-live-search='true' data-validation='required' aria-required='true'>
                  <option value="" disabled selected>اختر</option>
                  <option value="yes">اظهار</option>
                  <option value="no">اخفاء</option>
              </select>
          </div>

      </div>

      {!! Form::submit(trans('admin.add'),['class'=>'btn btn-primary']) !!}
      {!! Form::close() !!}



  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->



@endsection

@push('admin_js')

    <script>
        $(document).ready(function(){


        });
    </script>

@endpush
