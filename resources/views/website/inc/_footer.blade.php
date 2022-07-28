
<!-- ================ Footer ================= -->
<div id="Footer">
    <div id="BankAccountFooter">
{{--        <div class=" p-3 title ">--}}
{{--            <h5> الحسابات البنكية </h5>--}}
{{--        </div>--}}
        <div class="row">
            <div class="col-lg-4 col-md-6 p-1">
                <div class="Bankinfo">
                    <h6> <i class="fa fa-bank mx-1"></i> حساب البنك الاهلي</h6>
                    <p>02322185584651561</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 p-1">
                <div class="Bankinfo">
                    <h6> <i class="fa fa-bank mx-1"></i> حساب البنك الاهلي</h6>
                    <p>02322185584651561</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 p-1">
                <div class="Bankinfo">
                    <h6> <i class="fa fa-bank mx-1"></i> حساب البنك الاهلي</h6>
                    <p>02322185584651561</p>
                </div>
            </div>
        </div>
    </div>

    <section class=" footer" style="{{ request()->segment(1) == 'login' ?'margin-top: 0px !important;' : '' }} margin-bottom: -100%">
        <div class="container-fluid">
            <div class="row">

                <div class=" col-lg-3 col-12 d-flex justify-content-center align-items-center">
                    <div class="FooterLogo">
                        @if( setting() )
                            <img src="{{url('storage/').'/'. setting()->header_logo  }}" alt="">
                        @else
                            <img src="{{ asset('website') }} }}/img/footerlogo.png" alt="">
                        @endif
                    </div>
                </div>
                <div class=" col-lg-3 col-12 ">
                    <div class=" d-flex justify-content-start align-items-center">
                        <div class=" p-3 title ">
                            <h5> عن الموقع </h5>
                        </div>
                    </div>
                    @if( setting() )
                        <p> {{ strip_tags( setting()->about_website ) }} </p>
                    @else
                        <p>الموقع الاول من نوعة في الشرق الاوسط في التعليم عن بعد </p>
                    @endif
                </div>
                <div class=" col-lg-3 col-6 ">
                    <div class=" d-flex justify-content-start align-items-center">
                        <div class=" p-3 title ">
                            <h5> من نحن </h5>
                        </div>
                    </div>

                    <ul>
                        <li><a href="#!"> من نحن</a></li>
                        @if( setting() )
                            <p style="line-height: 19.5px;color: #fff;font-size: 10px;"> {{ strip_tags( setting()->about_app ) }} </p>
                        @else
                            <p>الموقع الاول من نوعة في الشرق الاوسط في التعليم عن بعد </p>
                        @endif
                        <li><a href="#!"> الشروط والاحكام</a></li>
                        @if( setting() )
                            <p style="line-height: 19.5px;color: #fff;font-size: 10px;" > {{ strip_tags( setting()->ar_termis_condition ) }} </p>
                        @else
                            <p>الموقع الاول من نوعة في الشرق الاوسط في التعليم عن بعد </p>
                        @endif
                    </ul>
                </div>
                <div class=" col-lg-3 col-6 ">
                    <div class=" d-flex justify-content-start align-items-center">
                        <div class=" p-3 title ">
                            <h5> مواقع التواصل </h5>
                        </div>
                    </div>
                    <div class="socialLinks">
                        <a href="#!"><span class="facebook"><i class="fa fa-facebook"></i></span> <h6>facebook</h6>  </a>
                        <a href="#!"><span class="twitter"><i class="fa fa-twitter"></i></span> <h6>twitter</h6>  </a>
                        <a href="#!"><span class="instagram"><i class="fa fa-instagram"></i></span> <h6>instagram</h6>  </a>
                        <a href="#!"><span class="whatsapp"><i class="fa fa-whatsapp"></i></span> <h6>whatsApp</h6>  </a>
                    </div>
                </div>


            </div>
        </div>
    </section>

</div>
<!-- ================ /Footer ================= -->
