@extends('admin.index')

  <?php
      $home_title    = $page_titles['index'] .' | '. $page_titles['edit'];
      $first_title   = ["title"=> $page_titles['index']    , "url"=> aurl('slider') ];
      $secind_title  = ["title"=>  $page_titles['edit'] , "url"=> '' ];
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
  <div class="box-body">

      <div class="iframe-container" style="overflow: hidden; padding-top: 56.25%; position: relative;">
          <iframe allow="microphone; camera" style="border: 0; height: 100%; left: 0; position: absolute; top: 0; width: 100%;" src="https://success.zoom.us/wc/join/{{$meeting_id}}" frameborder="0"></iframe>
      </div>

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
