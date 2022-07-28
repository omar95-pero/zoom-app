@extends('admin.adminAuth.layout.login_layout')
@section('login')


  <div class="m-login__signin" >
    <div class="m-login__head">
        <?php $en_address = '';  setting() ? $en_address = setting()->title : $en_address = '' ?>
      <h3 class="m-login__title">{{' تسجيل دخول ' .' | '. $en_address}} </h3>
    </div>

    <form action="{{ aurl('power') }}" class="m-login__form m-form" method="post">
      {!! csrf_field() !!}
      <div class="form-group m-form__group">
        <input class="form-control m-input" type="text" placeholder="الايميل" name="email">
      </div>
      <div class="form-group m-form__group">
        <input class="form-control m-input m-login__form-input--last" type="password" placeholder="كلمة المرور" name="password">
      </div>
      <div class="row m-login__form-sub">
        <div class="col m--align-left m-login__form-left">
          <label class="m-checkbox  m-checkbox--light">
            <input type="checkbox" name="rememberme" > ذكرنى
            <span></span>
          </label>
        </div>
        <div class="col m--align-right m-login__form-right">
          <a href="{{ aurl('forgot/password') }}" class="m-link">هل نسيت كلمة المرور ؟</a>
        </div>
      </div>
      <div class="m-login__form-action">
        <button class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn"> تسجيل دخول </button>
      </div>
    </form>


  </div>

    {{-- <a href="{{ aurl('forgot/password') }}">I forgot my password</a><br> --}}

@endsection
