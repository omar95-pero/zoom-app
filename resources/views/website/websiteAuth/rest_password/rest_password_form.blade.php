@extends('website.layouts.layout')

<?php
$title =  'Reset Password';
?>

<!-- in _header-->
@section('page_title')
    {{ $title }}
@endsection

@section('nav_title')
    <li class="active">{{ trans('web_lang.Reset Password') }}</li>
@endsection



{{-------------------- start content --------------------}}
@section('content')


    <section class="ls section_padding_top_50 section_padding_bottom_50 columns_padding_25">
        <div class="container">

            <div class="row">
                <div class="col-sm-12">

                    <!-- Form -->
                    <form action="{{route('rest-password')}}" class="checkout with_border with_padding form-horizontal" role="form" method="post">
                    @csrf

                        <div class="login-form">
                            <h4 class="login-title">{{ trans('web_lang.Reset Password') }}</h4>
                            <div class="row">

                                <div class="col-md-12 col-12 mb-20">
                                    <input name="email" class="mb-0" type="email" placeholder="{{ trans('web_lang.Email Address') }}">
                                </div>


                                <div class="col-md-12">
                                    <button class="btn btn-default">{{ trans('web_lang.Reset Password') }}</button>
                                </div>
                            </div>
                        </div>


                    </form>

                </div>
                <!--eof .col-sm-8 (main content)-->




            </div>
        </div>
    </section>



@endsection
{{-------------------- end content --------------------}}

