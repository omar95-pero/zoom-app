@extends('website.layouts.layout')

@section('page_title')
    {{ (isset($title)) ? $title : setting() ? setting()->title : '#' }}
@endsection


@section('content')



<!-- ================ content ================= -->



<!-- ================ /content ================= -->



@endsection







