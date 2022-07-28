
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
<html lang="en">

	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title> Login </title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

		<!--begin::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
			WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
        </script>

		<!--end::Web font -->

		<!--begin::Global Theme Styles -->
	<!-- 	<link href="{{asset('dashboard/assets')}}/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" /> -->

		<link href="{{asset('dashboard/assets')}}/vendors/base/vendors.bundle.rtl.css" rel="stylesheet" type="text/css" />


		<!-- <link href="{{asset('dashboard/assets')}}/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" /> -->

		<link href="{{asset('dashboard/assets')}}/demo/default/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />

		<!--end::Global Theme Styles -->
		<link rel="shortcut icon" href="{{asset('dashboard/assets')}}/demo/default/media/img/logo/favicon.ico" />

        <style>



            .overlay
            {
                position: absolute;
                width: 100%;
                height: 100%;
                background: #00000030;
                z-index: 9;
                top: 0px;
                left: 0px;
            }


            .m-checkbox.m-checkbox--light>span
            {
                background: #1ca0ad !important;
                transform: rotate(90deg);
            }

            form input
            {
                border: #eee solid;
                background: #fff;
            }
            /*background: #fff;*/
            /*border: 1px solid #ccc;*/
            .m-login.m-login--2.m-login-2--skin-3 .m-login__container .m-login__form .form-control
            {
                background: #f2f2f2 !important;
            }
            .m-checkbox.m-checkbox--light>span
            {
                background: #68878b !important;
            }
        </style>
	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body style="height: 100vh ;overflow: hidden" class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">
            <?php $banner = '';  setting() && setting()->login_banner != null ? $banner = url('storage/').'/'.setting()->login_banner : $banner = asset('dashboard/assets').'/app/media/img//bg/bg-2.jpg' ?>

			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-3" id="m_login"
                 style="background-image: url({{ $banner }});">


                <div class="overlay"></div>

                <div class="m-grid__item m-grid__item--fluid	m-login__wrapper" style="position: relative; z-index: 10;">
                        <div class="m-login__container" style="background: #ffffff;padding: 10px 50px ;border-radius: 8px">
                            <div class="m-login__logo m-0" >
                                <a href="#">
    {{--								<img src="{{asset('dashboard/assets')}}/app/media/img/logos/logo-1.png">--}}
                                    <?php $logo = '';  setting() ? $logo = setting()->header_logo : $logo = '' ?>
                                    <img class="img rounded-circle" alt="" style="min-width: 100px;height: 100px" src="{{url('storage/').'/'. $logo }}" />
                                </a>
                            </div>

                                {{-- login --}}
                                            @yield('login')
                                {{-- login --}}

                                {{-- Forgotten Password --}}
                                            @yield('reset_password_')
                                {{-- Forgotten Password --}}

                        </div>
                    </div>



			</div>
		</div>

		<!-- end:: Page -->

		<!--begin::Global Theme Bundle -->
		<script src="{{asset('dashboard/assets')}}/vendors/base/vendors.bundle.js" type="text/javascript"></script>
		<script src="{{asset('dashboard/assets')}}/demo/default/base/scripts.bundle.js" type="text/javascript"></script>

		<!--end::Global Theme Bundle -->

		<!--begin::Page Scripts -->
		<script src="{{asset('dashboard/assets')}}/snippets/custom/pages/user/login.js" type="text/javascript"></script>

		@toastr_render

		<!--end::Page Scripts -->
	</body>


	<!-- end::Body -->
</html>
