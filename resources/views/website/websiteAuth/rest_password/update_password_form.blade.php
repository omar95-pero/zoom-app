@extends('website.layouts.layout')

<?php
$title =  'Write New Password';
?>

<!-- in _header-->
@section('page_title')
    {{ $title }}
@endsection



@section('nav_title')
    <li class="active">{{ trans('web_lang.Update Password') }}</li>
@endsection




@push('js')

    <script !src="">
        $('#password_confirmation').keyup(function () {

            if( $(this).val() == $('#password').val() )
            {
                event.preventDefault();
                $('#update_pass_btn').prop("disabled", false);
            }else{
                event.preventDefault();
                $('#update_pass_btn').prop("disabled", true);
            }

        })
    </script>

@endpush

{{-------------------- start content --------------------}}
@section('content')



    <section class="ls section_padding_top_50 section_padding_bottom_50 columns_padding_25">
        <div class="container">

            <div class="row">
                <div class="col-sm-12">

                    <!-- Form -->
                    <form action="{{route('update-password')}}" class="checkout with_border with_padding form-horizontal" role="form" method="post">
                        @csrf

                        <input type="hidden" name="id" value="{{ $user_code->id }}">

                        <div class="login-form">
                            <h4 class="login-title">{{ trans('web_lang.Update Password') }}</h4>
                            <div class="row">

                                <div class="col-md-12 col-12 mb-20">
                                    <input type="password" placeholder="{{ trans('web_lang.Password') }}" class="form-control" name="password" id="password" value="" required autocomplete="off">
                                </div>

                                <div class="col-md-12 col-12 mb-20">
                                    <input type="password" placeholder="{{ trans('web_lang.Confirm Password') }}" class="form-control" name="password_confirmation" id="password_confirmation" value="" required autocomplete="off">
                                </div>


                                <div class="col-md-12">
                                    <button class="btn btn-default">{{ trans('web_lang.Update') }}</button>
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

