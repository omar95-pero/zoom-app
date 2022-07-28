@extends('website.layouts.layout')

<?php
$title =  'Confirm Code To Rest Password';
?>

<!-- in _header-->
@section('page_title')
    {{ $title }}
@endsection


@section('nav_title')
    <li class="active">{{ trans('web_lang.Confirm code') }}</li>
@endsection





{{-------------------- start content --------------------}}
@section('content')


    <div class="page-section mb-60">
        <div class="container">
            <div class="row">

                <div class="col-sm-12 col-md-12 col-xs-12 col-lg-12 mb-30">
                    <!-- Login Form s-->
                    <!--                    --><?php //$url = LaravelLocalization::setLocale().'/'.'register'; ?>
                    <form action="{{route('confirm-code')}}" class="checkout with_border with_padding form-horizontal" role="form" method="post">
                        @csrf

                        <input type="hidden" name="id" value="{{ $confirm_user->id }}">

                        <div class="login-form">
                            <h4 class="login-title"> {{ trans('web_lang.Confirm code') }} </h4>
                            <div class="row">

                                <div class="col-md-12 col-12 mb-20">
                                    <label>{{ trans('web_lang.Confirm code') }}*</label>
                                    <input type="number" class="form-control" name="forget_password_code" id="username" value="{{ old('confirm_code') }}" required>
                                </div>

                                <div class="col-md-12">
                                    <button class="register-button mt-0"> {{ trans('web_lang.Send') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

{{--    <section class="ls section_padding_top_50 section_padding_bottom_50 columns_padding_25">--}}
{{--        <div class="container">--}}

{{--            <div class="row">--}}
{{--                <div class="col-sm-12">--}}

{{--                    <h3> Confirm Code To Rest Password </h3>--}}
{{--                    <!-- Form -->--}}
{{--                    <form action="{{route('confirm-code')}}" class="checkout with_border with_padding form-horizontal" role="form" method="post">--}}
{{--                    @csrf--}}

{{--                    <!-- <p>If you have shopped with us before, please enter your details in the boxes below.--}}
{{--                            If you are a new customer please proceed to the Billing &amp; Shipping section.--}}
{{--                        </p> -->--}}

{{--                        <input type="hidden" name="id" value="{{ $confirm_user->id }}">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="username" class="col-sm-2 control-label">--}}
{{--                                <span class="grey"> confirm code:</span>--}}
{{--                                <span class="required">*</span>--}}
{{--                            </label>--}}
{{--                            <div class="col-sm-8">--}}
{{--                                <input type="number" class="form-control" name="forget_password_code" id="username" value="{{ old('confirm_code') }}" required>--}}
{{--                            </div>--}}
{{--                        </div>--}}



{{--                        <div class="form-group">--}}
{{--                            <div class="col-sm-offset-3 col-sm-9">--}}
{{--                                <input type="submit" class="theme_button color1 topmargin_20 float-right"--}}
{{--                                        value="Confirm Code To Rest Password">--}}
{{--                            </div>--}}
{{--                        </div>--}}


{{--                    </form>--}}

{{--                </div>--}}
{{--                <!--eof .col-sm-8 (main content)-->--}}




{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}



@endsection
{{-------------------- end content --------------------}}

