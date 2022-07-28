

    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">

        <li class="m-nav__item m-nav__item--home">
            <a href="{{ aurl('') }}" class="m-nav__link m-nav__link--icon">
                <i class="m-nav__link-icon la la-home"></i>
                <h3 class="m-subheader__title m-subheader__title--separator">{{ trans('admin.Home') }}</h3>
            </a>
        </li>


        <li class="m-nav__item">
            <a href="{{ $first_title['url'] }}" class="m-nav__link">
                <span class="m-nav__link-text">{{  $first_title['title']  }}</span>
            </a>
        </li>

        @if( isset($secind_title) )
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item">
            <a href="{{ $secind_title['url'] }}" class="m-nav__link">
                <span class="m-nav__link-text">{{  $secind_title['title']  }}</span>
            </a>
        </li>
        @endif

    </ul>
