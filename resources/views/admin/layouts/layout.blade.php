<!DOCTYPE html>

<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html dir="ltr">

<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>@yield('page_title')</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('admin.inc._css')
    @yield('styles')

</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">

    <!-- =========================================  BEGIN: _header ========================================= -->
    @include('admin.inc._header')
    <!-- =========================================  END:  _header ========================================= -->

    <!-- begin::Body -->
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

        <!-- =========================================  BEGIN: _sidebar ========================================= -->
        @include('admin.inc._sidebar')
        <!-- ========================================= END: _sidebar  ========================================= -->
        <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <!-- ========================================= BEGIN: Subheader ========================================= -->
            {{-- <div class="m-subheader">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">

                    </div>

                </div>
            </div> --}}


            {{--  --}}


            <div class="m-subheader">
  						<div class="">

  							<div class="mr-auto">



                  @yield('page-links')

  							</div>
  							<div>

  							</div>
  						</div>
  					</div>
        <!-- ========================================= END: Subheader ========================================= -->

        <!-- ========================================= BEGIN: content ========================================= -->
        <div class="progress m-progress--sm ">
          <div class="progress-bar m--bg-danger cng_color loady" role="progressbar" style="width: 0%; transition: all 1s ease;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

          @push('js')
            <script type="text/javascript">
            $( document ).ready(function() {
              $('.loady').css('width','100%').parent().fadeOut(2000);
            });
            </script>
          @endpush


            <div class="main_cotent">
              <div class="box">
                @yield('content')
              </div>
            </div>
        <!-- ========================================= END: content ========================================= -->
        </div>
    </div>

    <!-- end:: Body -->

    <!-- ========================================= begin::Footer ========================================= -->
         @include('admin.inc._footer')
    <!-- ========================================= end::Footer ========================================= -->
</div>

<!-- end:: Page -->

    <!-- ========================================= begin::Quick Sidebar ========================================= -->
        @include('admin.inc.quick-slider')
    <!-- ========================================= end::Quick Sidebar ========================================= -->

<!-- begin::Scroll Top -->
<div id="m_scroll_top" class="m-scroll-top">
    <i class="la la-arrow-up"></i>
</div>

<!-- end::Scroll Top -->

<!-- begin::Quick Nav -->
<ul class="m-nav-sticky" style="margin-top: 30px;">
    <li class="m-nav-sticky__item" data-toggle="m-tooltip" title="slider" data-placement="left">
        <a href="{{ aurl('slider') }}" target="_blank"><i class="la la-desktop"></i></a>
    </li>
    <li class="m-nav-sticky__item" data-toggle="m-tooltip" title="stage" data-placement="left">
        <a href="{{ aurl('stage') }}" target="_blank"><i class="la la-code-fork"></i></a>
    </li>
    <li class="m-nav-sticky__item" data-toggle="m-tooltip" title="settings" data-placement="left">
        <a href="{{ aurl('settings') }}" target="_blank"><i class="la la-life-ring"></i></a>
    </li>
</ul>






@include('admin.inc._js')

<script>
    $.validate({

    });
</script>

@yield('scripts')
</body>

@toastr_render

<!-- end::Body -->
</html>
