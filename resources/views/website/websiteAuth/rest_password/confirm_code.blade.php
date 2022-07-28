@extends('website.layouts.layout')

<?php
$title =  'رمز التاكيد لاعادة كلمة المرور';
?>

<!-- in _header-->
@section('page_title')
    {{ $title }}
@endsection


{{-------------------- start content --------------------}}
@section('content')


    <section class="ls section_padding_top_50 section_padding_bottom_50 columns_padding_25">
        <div class="container">

            <div class="row">
                <div class="col-sm-12">

                    <h3> Confirm Code To Rest Password </h3>
                    <!-- Form -->
                    <form action="{{url('confirm-code')}}" class="checkout with_border with_padding form-horizontal" role="form" method="post">
                    @csrf
                    <!-- <p>If you have shopped with us before, please enter your details in the boxes below.
                            If you are a new customer please proceed to the Billing &amp; Shipping section.
                        </p> -->

{{--                        <div class="form-group">--}}
{{--                            <label for="username" class="col-sm-2 control-label">--}}
{{--                                <span class="grey"> Confirm Code :</span>--}}
{{--                                <span class="required">*</span>--}}
{{--                            </label>--}}
{{--                            <div class="col-sm-8">--}}
{{--                                <input type="number" class="form-control" name="confirm_code" id="username" value="{{ old('confirm_code') }}" required>--}}
{{--                            </div>--}}
{{--                        </div>--}}



                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <input type="submit" class="theme_button color1 topmargin_20 float-right"
                                       name="confirm_code" value="Confirm Code To Rest Password">
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

