@extends('admin.index')

<?php
$home_title    =  trans('admin.main_name' )  . ' | ' .   trans('admin.Site_text')  ;
$first_title   = ["title"=>  trans('admin.Site_text')  , "url"=> aurl('settings') ];
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
        <hr>
        <br>
        <!--begin::Section-->
        <div class="m-section">
            <div class="m-section__content">
              @if( App\Models\SiteText::orderBy('id', 'asc')->get()->count() > 0 )
                    <table class="table m-table m-table--head-bg-success">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>الصور</th>
                            <th>عنوان </th>
                            <th>التعديل</th>
                        </tr>
                        </thead>
                        <tbody>


                        @foreach(App\Models\SiteText::orderBy('id', 'asc')->get() as $site_text)
                            <tr>
                                <td>{{ $site_text->id }}</td>
    {{--                            <td></td> {{url('storage/').'/'. $site_text->image  }}--}}
                                <td><img src="{{ $site_text->image == '' ? url('/').'/'.'em.png'  : url('storage/').'/'. $site_text->image  }}" alt="" style="width: 100px; height: 100px"></td>
                                <td>{{ $site_text->title_ar }}</td>
                                <td>

                                    <a href="{{ aurl('site_text').'/'.$site_text->id }}" class="btn m-btn m-btn--gradient-from-success m-btn--gradient-to-accent">
                                        <i class="m-menu__link-icon flaticon-edit"><span></span></i> Edit </a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                @else
                    <h3 class="text-center"> تصوص الموقع فارغة </h3>
                @endif
            </div>
        </div>

        <!--end::Section-->


    </div>



@endsection
