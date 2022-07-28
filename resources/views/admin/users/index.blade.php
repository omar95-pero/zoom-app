@extends('admin.index')


<?php

$ti = 'الاعضاء';

$home_title    =  trans('admin.main_name' )  . ' | ' . $ti;
$first_title   = ["title"=> $ti, "url"=> aurl('user') ];
//$secind_title  = ["title"=>trans('admin.create_admin' ), "url"=> aurl('admin/create') ];
?>

@section('page_title')
    {{ $home_title }}
@endsection

@section('page-links')
    @include('admin.inc.__title')
@endsection


@section('content')



    <div class="box">
        <div class="box-header row">

            <div class="col-md-10 col-sm-8 col-xs-12">
                <h3 class="box-title">{{ $home_title }}</h3>
            </div>

            <div class="col-md-2 col-sm-4 col-xs-12" >
{{--                <a href="{{ aurl('user/create') }}?type={{ request()->get('type') }}" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">--}}
          <span>
            <i class="la la-plus"></i>
{{--            <span>اضافة ماركة جديدة</span>--}}
          </span>
                </a>
            </div>

            <div class="clearfix"></div>

        </div>
        <hr> <br>
        <!-- /.box-header -->


        <div class="box-body table-responsive text-nowrap bg_color">
            {!! Form::open(['id'=>'form_data','route' => 'delete_all_user', 'method' => 'delete']) !!}
            {{-- ['route' => ['My.route', $value->id], 'method' => 'delete'] --}}
            <input name="type" type="hidden" value="{{ request()->get('type') }}">
            {!! $dataTable->table(['class'=>'table table-striped table-bordered table-hover table-checkable responsive no-wrap dataTable dtr-inline collapsed  m-table m-table--head-bg-success'],true) !!}
            {!! Form::close() !!}
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->


    <!-- Trigger the modal with a button -->




    <!-- Modal -->
    <div id="mutlipleDelete" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
                    {{-- <h4 class="modal-title">{{ trans('slider.delete') }}</h4> --}}
                </div>
                <div class="modal-body">

                    <div class="alert alert-danger text-center">
                        <div class="empty_record hidden">
                            <h4>{{ trans('admin.please_check_some_records') }} </h4>
                        </div>
                        <div class="not_empty_record hidden">
                            <h4>{{ trans('admin.ask_delete_itme') }} <span class="record_count"></span> ! </h4>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">


                    <div class="empty_record hidden">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('admin.close') }}</button>
                    </div>

                    <div class="not_empty_record hidden">
                        {{-- <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('admin.no') }}</button> --}}
                        <input type="submit"  value="{{ trans('admin.yes') }}"  class="btn btn-danger del_all" />
                    </div>


                </div>
            </div>
        </div>
    </div>





    @push('js')
        <script>
            delete_all();
        </script>
        {!! $dataTable->scripts() !!}
    @endpush

@endsection
