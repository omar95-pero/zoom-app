@extends('website.layouts.layout')

@section('page_title')
    تسجيل الدخول
@endsection


@section('content')



    <section class="LogIn">
        <div class="container formContainer">
            <div class=" user signInBx">
                <div class=" imgBox"> <img src=" {{ asset('website') }}/img/s2.jpg"></div>
                <div class="formBox">



                    <form action="{{url('login')}}" method="post">
                        @csrf



                        <h3>
                            تسجيل الدخول
                        </h3>

                        <input name="email" type="email" placeholder="الايميل" required>
                        <input name="password" type="password" placeholder="كلمة المرور" required>
                        <button class=" btn BG1" type="submit"> دخول </button>



                    </form>




                </div>
            </div>
        </div>
    </section>


@endsection


