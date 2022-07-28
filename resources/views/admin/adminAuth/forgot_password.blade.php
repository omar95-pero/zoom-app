
@extends('admin.adminAuth.layout.login_layout')
@section('reset_password_')


<div class="">
  <div class="m-login__head">
    <h3 class="m-login__title">Forgotten Password ?</h3>
    <div class="m-login__desc">Enter your email to reset your password:</div>
  </div>


  <form class="m-login__form m-form" method="post">
    {!! csrf_field() !!}

    @if(session()->has('success'))
    <div class="m-alert m-alert--square alert alert-brand alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      </button>
      <strong class="text-center"> {{ session('success') }}</strong>
    </div>
    @endif

    @if(session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show   m-alert m-alert--air" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      </button>
      <strong class="text-center"> {{ session('error') }}</strong>
    </div>
    @endif

    <div class="form-group m-form__group">
      <input class="form-control m-input" type="email" placeholder="Email" name="email" id="m_email" required>
    </div>
    <div class="m-login__form-action">
      <button  class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary" type="submit">Request</button>&nbsp;&nbsp;
      <a href="{{ aurl('login') }}" class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom  m-login__btn">Cancel</a>
    </div>
  </form>

</div>




@endsection
