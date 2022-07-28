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

      {!! Form::open( ['route' => 'zoom.store',  'method' => 'POST','files'=>true] ) !!}

      <div class="row">

          <div class="form-group col-md-6">
              {!! Form::label('topic', 'العنوان') !!}
              {!! Form::text('topic',old('title'),['class'=>'form-control']) !!}
          </div>

          <div class="form-group col-md-6">
              {!! Form::label('start_time', 'تاريخ بداية الاجتماع') !!}
              {!! Form::datetimeLocal('start_time',old('title'),['class'=>'form-control']) !!}
          </div>
          <div class="form-group col-md-6">
              {!! Form::label('duration', 'مدة الاجتماع') !!}
              {!! Form::number('duration',old('title'),['class'=>'form-control']) !!}
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
