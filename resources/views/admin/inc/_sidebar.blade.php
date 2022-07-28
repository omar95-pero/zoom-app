<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i class="la la-close"></i></button>
<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">

    <!-- BEGIN: Aside Menu -->
    <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">

            <li class="m-menu__section ">
                <h4 class="m-menu__section-text" style="text-transform: none; font-size: 12px; color: #a1a4b5;"> <i class="m-menu__link-icon flaticon-layer"></i> {{ trans('admin.setting') }}  &  {{ trans('admin.Site_text') }}   </h4>
                <i class="m-menu__section-icon flaticon-more-v2"></i>
            </li>



            {{--  -----------------------------------------   settings   -----------------------------------------    --}}


            <li class="m-menu__item  m-menu__item--submenu {{ active_menu('settings')[0] }}" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-settings-1"></i><span class="m-menu__link-text"> {{ trans('admin.setting') }} </span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">

                        <li class="m-menu__item " aria-haspopup="true"><a href="{{ aurl('settings') }}" class="m-menu__link ">
                                <i class="m-menu__link-icon flaticon-settings-1"><span></span></i><span class="m-menu__link-text">  {{ trans('admin.setting') }}  </span></a>
                        </li>


                    </ul>
                </div>
            </li>

            {{--  -----------------------------------------   site_text   -----------------------------------------    --}}

            {{--<li class="m-menu__item  m-menu__item--submenu {{ active_menu('site_text')[0] }}" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle">--}}
            {{--        <i class="m-menu__link-icon flaticon-interface"></i><span class="m-menu__link-text"> نصوص الموقع  </span>--}}
            {{--        <i class="m-menu__ver-arrow la la-angle-right"></i></a>--}}
            {{--    <div class="m-menu__submenu "><span class="m-menu__arrow"></span>--}}
            {{--        <ul class="m-menu__subnav">--}}

            {{--            <li class="m-menu__item " aria-haspopup="true"><a href="{{ aurl('site_text') }}" class="m-menu__link ">--}}
            {{--                    <i class="m-menu__link-icon flaticon-interface"><span></span></i><span class="m-menu__link-text">  نصوص الموقع  </span></a>--}}
            {{--            </li>--}}


            {{--        </ul>--}}
            {{--    </div>--}}
            {{--</li>--}}


            {{--  -----------------------------------------   Admin_group   -----------------------------------------    --}}

            {{--<li class="m-menu__item  m-menu__item--submenu {{ active_menu('permission_group')[0] }}" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle">--}}
            {{--        <i class="m-menu__link-icon flaticon-users-1"></i><span class="m-menu__link-text">{{ trans('admin.permission_group') }}</span>--}}
            {{--        <i class="m-menu__ver-arrow la la-angle-right"></i></a>--}}
            {{--    <div class="m-menu__submenu "><span class="m-menu__arrow"></span>--}}
            {{--        <ul class="m-menu__subnav">--}}

            {{--            <li class="m-menu__item " aria-haspopup="true"><a href="{{ aurl('permission_group') }}" class="m-menu__link ">--}}
            {{--                    <i class="m-menu__link-icon flaticon-users-1"><span></span></i><span class="m-menu__link-text"> {{ trans('admin.permission_group') }}  </span></a>--}}
            {{--            </li>--}}

            {{--            <li class="m-menu__item " aria-haspopup="true"><a href="{{ aurl('permission_group/create') }}" class="m-menu__link ">--}}
            {{--                    <i class="m-menu__link-icon flaticon-plus"><span></span></i><span class="m-menu__link-text">{{ trans('admin.add_new_permission') }} </span></a>--}}
            {{--            </li>--}}


            {{--        </ul>--}}
            {{--    </div>--}}
            {{--</li>--}}


            {{--  -----------------------------------------   Admin   -----------------------------------------    --}}

            <li class="m-menu__item  m-menu__item--submenu {{ active_menu('admin')[0] }}" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-users"></i><span class="m-menu__link-text"> المشرفين </span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">

                        <li class="m-menu__item " aria-haspopup="true"><a href="{{ aurl('admin') }}" class="m-menu__link ">
                                <i class="m-menu__link-icon flaticon-users"><span></span></i><span class="m-menu__link-text"> المشرفين   </span></a>
                        </li>

                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="{{ aurl('admin/create') }}" class="m-menu__link ">
                                <i class="m-menu__link-icon flaticon-plus"><span></span></i><span class="m-menu__link-text">{{ trans('admin.add_new_admin') }} </span></a>

                            </a>
                        </li>


                    </ul>
                </div>
            </li>


            <li class="m-menu__section ">
                <h4 class="m-menu__section-text" style="text-transform: none; font-size: 12px; color: #a1a4b5;"> <i class="m-menu__link-icon flaticon-star"></i> {{ trans('admin.Website_control') }}  </h4>
                <i class="m-menu__section-icon flaticon-more-v2"></i>
            </li>


            {{--  -----------------------------------------   slider   -----------------------------------------    --}}

            <li class="m-menu__item  m-menu__item--submenu {{ active_menu('slider')[0] }}" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon la la-desktop"></i><span class="m-menu__link-text"> الاسلايدر </span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">

                        <li class="m-menu__item " aria-haspopup="true"><a href="{{ aurl('slider') }}" class="m-menu__link ">
                                <i class="m-menu__link-icon la la-desktop"><span></span></i><span class="m-menu__link-text"> الاسلايدر   </span></a>
                        </li>

                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="{{ aurl('slider/create') }}" class="m-menu__link ">
                                <i class="m-menu__link-icon flaticon-plus"><span></span></i><span class="m-menu__link-text">اضافة اسلايدر جديد </span></a>

                            </a>
                        </li>


                    </ul>
                </div>
            </li>



            {{--  -----------------------------------------   Zoom   -----------------------------------------    --}}

            <li class="m-menu__item  m-menu__item--submenu {{ active_menu('slider')[0] }}" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon la la-desktop"></i><span class="m-menu__link-text"> زووم </span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">

                        <li class="m-menu__item " aria-haspopup="true"><a href="{{ aurl('zoom') }}" class="m-menu__link ">
                                <i class="m-menu__link-icon la la-desktop"><span></span></i><span class="m-menu__link-text"> انشاء رابط زووم   </span></a>
                        </li>



                    </ul>
                </div>
            </li>









            {{--  -----------------------------------------   logout   -----------------------------------------    --}}


            <li class="m-menu__item " aria-haspopup="true"><a href="{{ aurl('logout') }}" class="m-menu__link ">
                    <i class="m-menu__link-icon flaticon-logout"><span></span></i><span class="m-menu__link-text"> {{ trans('admin.logout') }} </span></a>
            </li>




        </ul>
    </div>

    <!-- END: Aside Menu -->
</div>
