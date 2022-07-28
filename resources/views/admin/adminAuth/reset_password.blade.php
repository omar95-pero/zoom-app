@extends('admin.adminAuth.layout.login_layout')
@section('login')


  <div class="m-login__signin">
    <div class="m-login__head">
      <h3 class="m-login__title">Sign In To Admin</h3>
    </div>

    <form class="m-login__form m-form" method="post">
      {!! csrf_field() !!}

      <div class="form-group m-form__group">
        <input class="form-control m-input" type="text" placeholder="Email" name="email" value="{{ $data->email }}">
      </div>

      <div class="form-group m-form__group">
        <input class="form-control m-input m-login__form-input--last" type="password" placeholder="Password" name="password">
      </div>

      <div class="form-group m-form__group">
        <input class="form-control m-input m-login__form-input--last" type="password" placeholder="Enter Confirmation Password" name="password_confirmation">
      </div>

      <div class="m-login__form-action">
        <button class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn">Reset</button>
      </div>
    </form>


  </div>

    {{-- <a href="{{ aurl('forgot/password') }}">I forgot my password</a><br> --}}

@endsection
