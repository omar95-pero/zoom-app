<!-- icon -->

<?php $logo = '';  setting() ? $logo = setting()->header_logo : $logo = '' ?>
<link rel="icon" type="image/x-icon" href="{{url('storage/').'/'. $logo }}">
<!-- Bootstrap -->
<link rel="stylesheet" href="{{asset('website')}}/css/bootstrap-rtl.css">
<!-- Material Design Bootstrap -->
<link rel="stylesheet" href="{{asset('website')}}/css/mdb.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('website')}}/css/all.css">
<!-- swiper -->
<link rel="stylesheet" href="{{asset('website')}}/css/fontawesome-stars.css">
<link rel="stylesheet" href="{{asset('website')}}/css/swiper.css">
<!-- animate -->
<link rel="stylesheet" href="{{asset('website')}}/css/aos.css">
<!-- datatables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<!-- dropify -->
<link rel="stylesheet" href="{{asset('website')}}/css/dropify.css">
<!-- Custom style  -->
<link rel="stylesheet" href="{{asset('website')}}/css/style.css?v={{time()}}">
<!-- fonts  -->
<link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">




{{-- chat --}}

<style>


    .chat {
        padding: 40px 0px 0px;
        margin-top: 75px;
    }

    .chat ::-webkit-scrollbar {
        width: 3px;
        background-color: #F8F8F8;
    }

    .chat ::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
    }

    .chat ::-webkit-scrollbar-thumb {
        background: linear-gradient(45deg, #FC8351, #FB656E);
        outline: none;
        border-radius: 20px !important;
    }

    .chat .container .chatBox .chatBody .sendMassage {
        padding: 10px;
        background-color: #009688;
        border-radius: 8px 0px 8px 8px;
        margin-bottom: 10px;
        position: relative;
        color: #fff;
        display: table;
        margin-left: auto;
        min-width: 170px;
    }

    .chat .container {
        background-color: #fff;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        padding: 10px;
        -webkit-box-shadow: 0px 0px 5px #00000050;
        box-shadow: 0px 0px 5px #00000050;
        overflow: auto;
        border-radius: 8px;
    }

    .chat .container .users {
        position: relative;
        min-width: 350px !important;
        background-color: #fff;
        display: block;
        border-radius: 4px;
        padding: 5px;
        margin-left: 10px;
        height: 80vh;
        overflow-x: auto;
    }

    .chat .container .users ul {
        display: block;
        border: none;
    }

    .chat .container .users ul li {
        display: block;
        margin-bottom: 5px;
    }

    .chat .container .users ul li .userInfo {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        background-color: #fff;
        padding: 10px 5px;
        border-radius: 2px;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-transition: all .2s ease-in-out;
        transition: all .2s ease-in-out;
        border-bottom: 1px solid #F6F6F6;
    }

    .chat .container .users ul li .userInfo img {
        width: 50px;
        height: 50px;
        border-radius: 100%;
        -webkit-box-shadow: 0px 0px 5px #00000050;
        box-shadow: 0px 0px 5px #00000050;
    }

    .chat .container .users ul li .userInfo .userDiv {
        color: #777;
        width: 100%;
        padding-right: 8px;
        margin-right: 8px;
        border-right: 1px solid #F6F6F6;
    }

    .chat .container .users ul li .userInfo .userDiv .nameDate {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        margin-bottom: 4px;
    }

    .chat .container .users ul li .userInfo .userDiv .nameDate .name {
        font-size: 16px;
        color: #000;
    }

    .chat .container .users ul li .userInfo .userDiv .nameDate .date {
        font-size: 12px;
    }

    .chat .container .users ul li .userInfo .userDiv p {
        margin: 0px;
        font-size: 12px;
        overflow: hidden;
        height: 20px;
    }

    .chat .container .users ul li .active .userInfo {
        background-color: #f6f6f6;
        border-radius: 3px;
    }

    .chat .container .users ul li .active .userInfo .userDiv {
        border-right: 1px solid #FC8351;
    }

    .chat .container .chatBox {
        position: relative;
        min-width: 400px !important;
        width: 100%;
        background-color: #fff;
        display: block;
        border-radius: 8px;
        padding: 10px 10px 50px;
        background-image: url(../img/chat.jpg);
        background-size: contain;
        height: 500px;
    }

    .chat .container .chatBox::after {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        border-radius: 8px;
        z-index: 2;
        background-color: #00000020;
    }

    .chat .container .chatBox
    {
        height: auto !important;
    }

    .chat .container .chatBox .chatBody {
        position: relative;
        z-index: 3;
        padding: 15px;
        overflow-x: auto;
        height: 70vh;
    }

    .chat .container .chatBox .chatBody p {
        margin: 0px;
        width: 100%;
        display: inline-block;
    }

    .chat .container .chatBox .chatBody .userSend {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        position: relative;
        margin-left: auto;
    }

    .chat .container .chatBox .chatBody .userSend .userPic {
        width: 40px;
        height: 40px;
        border: 3px solid #fff;
        border-radius: 100%;
        -webkit-box-shadow: 0px 0px 5px #00000030;
        box-shadow: 0px 0px 5px #00000030;
        position: relative;
        right: -10px;
        top: -10px;
    }

    .chat .container .chatBox .chatBody .userSend .sendMassage {
        padding: 10px;
        background-color: #009688;
        border-radius: 8px 0px 8px 8px;
        margin-bottom: 10px;
        position: relative;
        color: #fff;
        display: inline-block;
        padding-bottom: 25px;
    }

    .chat .container .chatBox .chatBody .userSend .sendMassage .time {
        position: absolute;
        bottom: 2px;
        left: 15px;
        color: #c7c7c7;
        font-size: 13px;
    }

    .chat .container .chatBox .chatBody .userSend .sendMassage:before {
        z-index: -1;
        content: ' ';
        position: absolute;
        width: 0;
        height: 0;
        left: auto;
        right: -8px;
        top: 0px;
        bottom: auto;
        border: 12px solid;
        border-color: #009688 transparent transparent transparent;
    }

    .chat .container .chatBox .chatBody .userReceive {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        position: relative;
        margin-right: auto;
        text-align: left;
        direction: ltr;
        min-width: 100px;
    }

    .chat .container .chatBox .chatBody .userReceive .userPic {
        width: 40px;
        height: 40px;
        border: 3px solid #fff;
        border-radius: 100%;
        -webkit-box-shadow: 0px 0px 5px #00000030;
        box-shadow: 0px 0px 5px #00000030;
        position: relative;
        left: -10px;
        top: -10px;
    }

    .chat .container .chatBox .chatBody .userReceive .receivedMassage {
        padding: 10px;
        background-color: #f6f6f6;
        border-radius: 0px 8px 8px 8px;
        margin-bottom: 10px;
        position: relative;
        color: #000;
        display: inline-block;
        margin-right: auto;
        padding-bottom: 25px;
        min-width: 170px;
    }

    .chat .container .chatBox .chatBody .userReceive .receivedMassage .time {
        position: absolute;
        bottom: 2px;
        right: 15px;
        color: #a8a8a8;
        font-size: 13px;
    }

    .chat .container .chatBox .chatBody .userReceive .receivedMassage:before {
        z-index: -1;
        content: ' ';
        position: absolute;
        width: 0;
        height: 0;
        left: auto;
        left: -8px;
        top: 0px;
        bottom: auto;
        border: 12px solid;
        border-color: #f6f6f6 transparent transparent transparent;
    }

    .chat .container .chatBox .chat-input {
        position: absolute;
        bottom: 0;
        width: 100%;
        right: 0;
        z-index: 4;
    }

    .chat .container .chatBox .chat-input #chat-input {
        background: #f4f7f9;
        width: 100%;
        position: relative;
        height: 47px;
        padding: 10px 15px 10px 50px;
        border: none;
        color: #888;
        overflow: hidden;
    }

    .chat .container .chatBox .chat-input .chat-submit {
        position: absolute;
        bottom: 3px;
        left: 10px;
        background: transparent;
        -webkit-box-shadow: none;
        box-shadow: none;
        border: none;
        border-radius: 50%;
        color: #5A5EB9;
        -webkit-transform: scaleX(-1);
        transform: scaleX(-1);
        width: 35px;
        height: 35px;
    }


    .attachment-img
    {
        z-index: 2;
        bottom: -5px;
        position: absolute;
        left: 50px;
        font-size: 21px;
    }

    .click-msg
    {
        position: absolute;
        /* margin: auto; */
        left: 50%;
        top: 50%;
        transform: translateY(-50%);
        transform: translateX(-50%);
    }
    .img-caption
    {
        max-width: 300px;
        height: 200px;
        object-fit: cover ;
        margin: 5px auto ;
        border-radius: 4px;
        display: block
    }
</style>

{{-- chat --}}



<style>
    #myTabMD li
    {
        width: 24% !important;
    }
    .subject .nav-tabs .nav-link
    {
        width: 24% !important;
    }

    /*[type="checkbox"]:not(:checked), [type="checkbox"]:checked*/
    /*{*/
    /*    opacity: 1 !important;*/
    /*}*/
</style>




{{-- starts rates --}}



<style>


    .your-opinion  p {
        font-size: 14px;
        font-weight: normal;
        line-height: 24px;
        color: #898989;
        margin-bottom: 15px;
    }

    .your-opinion label {
        font-size: 15px;
        font-weight: 400;
        color: #626262;
    }



    .feedback-area .br-theme-fontawesome-stars .br-widget a {
        font-size: 14px;
    }

    .feedback-area .br-theme-fontawesome-stars .br-widget a.br-active:after {
        color: #C00B1E;
    }

    .feedback-area .br-theme-fontawesome-stars .br-widget a.br-selected::after {
        color: #C00B1E;
    }
    .feedback-area .br-theme-fontawesome-stars .br-widget a.br-selected::after {
        color: #FFD700;
    }


    .your-opinion select {
        width: 100%;
        background: #eceff8;
        border: 2px solid #eceff8;
        height: 45px;
        padding-left: 10px;
        -webkit-box-shadow: none;
        box-shadow: none;
        font-size: 14px;
        color: #626262;
    }


</style>



<style>

    .bg-lighter {
        background-color: #f7f7f7 !important;
    }

    #works .line-bottom {
        position: relative;
        margin-bottom: 10px;
        padding-bottom: 10px;
    }

    #works .text-theme-color-2 {
        color: #F2184F;
    }

    #works .bg-theme-color-2,
    #works .line-bottom:after,
    #works .line-bottom-center:after {
        background: #F2184F !important;
    }

    #works .line-bottom:after {
        bottom: -1px;
        content: "";
        height: 2px;
        right: 0;
        position: absolute;
        width: 50px;
    }

    #works .swiper-button-next:after,
    #works .swiper-container-rtl .swiper-button-prev:after {
        color: #00CC54;
    }

    #works .post {
        position: relative;
    }

    #works .post .entry-header {
        position: relative;
    }

    #works .post .entry-header .post-thumb {
        -webkit-transition: all 0.2s ease-in-out;
        transition: all 0.2s ease-in-out;
    }

    #works .post .entry-header .post-thumb .img-fullwidth {
        width: 100% !important;
        height: 250px;
        -o-object-fit: cover;
        object-fit: cover;
    }

    #works .my-edit {
        visibility: visible;
        -webkit-animation-duration: 1s;
        animation-duration: 1s;
        -webkit-animation-delay: 0.3s;
        animation-delay: 0.3s;
    }
</style>




{{-- ======================================= crop ===================================== --}}

<style>


</style>

{{-- ======================================= crop ===================================== --}}




@toastr_css

@stack('css')
