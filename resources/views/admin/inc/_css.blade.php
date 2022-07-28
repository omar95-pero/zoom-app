

<link href="{{asset('dashboard/imageuploadify')}}/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="{{asset('dashboard/imageuploadify')}}/imageuploadify.min.css" rel="stylesheet" type="text/css" />


<!--=================== DataTable style =====================-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" />
<!-- DataTable responsive-->
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" />

@if(App::getLocale() == 'en')

    <!--=================== Metronic =====================-->
    <link href="{{asset('dashboard/assets')}}/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('dashboard/assets')}}/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />

@else
    <link href="{{asset('dashboard/assets')}}/vendors/base/vendors.bundle.rtl.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('dashboard/assets')}}/demo/default/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('dashboard/assets')}}/vendors/custom/fullcalendar/fullcalendar.bundle.rtl.css" rel="stylesheet" type="text/css" />
    <style> .m-brand{  width: 255px; }</style>
@endif

<!--begin::Web font -->
{{-- <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
<script>
  WebFont.load({
        google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
        active: function() {
            sessionStorage.fonts = true;
        }
      });
</script> --}}
<link href="https://fonts.googleapis.com/css?family=Almarai&display=swap" rel="stylesheet">

<?php $logo = '';  setting() ? $logo = setting()->footer_logo : $logo = '' ?>
<link rel="shortcut icon" href="{{url('storage/').'/'. $logo }}" />


{{-- for checkbox --}}
<link href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css" rel="stylesheet" type="text/css" />

<link href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" rel="stylesheet" type="text/css" />

<link href="{{asset('store/select2')}}/select2.min.css" rel="stylesheet" />

<!-- ================== styles datatabele =================== -->

<style type="text/css">

    .m-brand{  width: 255px; }
    body
    {
        font-family: 'Almarai', sans-serif;
    }

    .cng_color
    {
        background-color: #34bfa3 !important;
    }

    div.dataTables_wrapper div.dataTables_processing {
        background-color: #ececec;
        top: 60%;
    }

    .dt-button
    {
        background: white;
        border-color: #ebedf2 ;
        color: #484545 !important;
        border: 1px solid rgb(234, 230, 230);
        font-family: 'Almarai', sans-serif;
    }

    .dt-button-collection div
    {
        margin: 17.5px;
    }

    .buttons-columnVisibility
    {
        background: white !important;
        border-color: #ececec !important;
        color: #212529 !important;
        padding: 6px;
        border: 1px solid #ebedf2

    }

    .buttons-columnVisibility:hover
    {
        cursor: pointer;
        background-color: #384ad7 !important;
        border-color: #2e40d4 !important;
        border: 1px solid transparent;
        color: #ffff !important
    }

    .dataTables_length label
    {
        float: left;
    }

    .dataTables_filter
    {
        float: left;
    }
    .dt-buttons
    {
        float: right;
        margin-bottom: 18px;

    }

    div.dataTables_wrapper div.dataTables_filter input {
        margin-left: 0.5em;
        display: inline-block;
        width: auto;
        margin: 0px 8px;
    }

    /*--------- Main Content ---------*/

    .box
    {
        margin: 25px;
        padding: 25px;
        background: #fff
    }

    th
    {
        text-align: center;
    }

    tbody tr
    {
        text-align: center;
    }


    .dropify-wrapper
    {
        border-radius: 20px;
    }

    .imageuploadify-container button:before
    {
        content: "remove";
    }
    .imageuploadify .imageuploadify-images-list .imageuploadify-container button.btn-danger
    {
        width: 51px;
    }


</style>

<style media="screen">
    .dz-image
    {
        border-radius:5px !important;
        margin-bottom: 10px;
    }
    .dz-remove
    {
        color: red;
    }
    .dz-image img
    {
        text-align: center;
        width:100%;
        height:100%;

    }

    .dropzone
    {
        border: 1px solid #ccc;
        border-radius: 8px;
        padding: 20px;
        text-align: center;
    }

</style>


{{-- =========================== loding page =========================== --}}

<style>
    .modal_body
    {
        position: relative;
    }
    .overlay
    {
        position: absolute;
        width: 94%;
        height: 95%;
        background: #fffffffa;
        z-index: 9999999;
        border-radius: 10px;
        display: none;
    }
    #loady
    {
        position: absolute;
        top: 50%;
        left: 38%;
    }

    .m-input
    {
        border-color: #7f8e8b66 !important;
    }

    #name-error
    {
        color: red !important;
    }
</style>

{{-- ============================== --}}

<style>
    .quote-imgs-thumbs {
        background: #eee;
        border: 1px solid #ccc;
        border-radius: 0.25rem;
        margin: 1.5rem 0;
        padding: 0.75rem;
    }
    .quote-imgs-thumbs--hidden {
        display: none;
    }
    .img-preview-thumb {
        background: #fff;
        border: 1px solid #777;
        border-radius: 0.25rem;
        box-shadow: 0.125rem 0.125rem 0.0625rem rgba(0, 0, 0, 0.12);
        margin-right: 1rem;
        max-width: 140px;
        padding: 0.25rem;
    }
</style>



<style>

    .contentPreviewImg {
        position: relative;
    }

    .contentPreviewImg .quote-imgs-thumbs {
        background: #fff;
        border-radius: 0.25rem;
        margin: 1.5rem 0;
        padding: 0.75rem;
        -webkit-box-shadow: 0px 0px 10px 0px #c2c2c2bf;
        box-shadow: 0px 0px 10px 0px #c2c2c2bf;
        border-radius: 15px;
        min-height: 108px;
        padding-top: 60px;
    }

    .contentPreviewImg .quote-imgs-thumbs--hidden {
        display: none;
    }

    .contentPreviewImg .xSpan {
        color: #fff;
        position: absolute;
        top: -57px;
        right: 22px;
        cursor: pointer;
        background: #000;
        width: 25px;
        height: 25px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        font-size: 14px;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        margin: 0;
        border-radius: 50%;
    }

    .contentPreviewImg .xSpan:hover {
        -webkit-transition: .2s ease-in;
        transition: .2s ease-in;
        -webkit-transform: scale(1.2, 1.2);
        transform: scale(1.2, 1.2);
        color: red;
    }

    .contentPreviewImg .inputfile + label {
        font-size: 1.25em;
        font-weight: 700;
        color: white;
        background-color: black;
        display: inline-block;
        -webkit-transition: .3s ease;
        transition: .3s ease;
    }

    .contentPreviewImg .inputfile:focus + label,
    .contentPreviewImg .inputfile + label:hover {
        background-color: #00a0c4;
    }

    .contentPreviewImg .img-preview-thumb {
        background: #fff;
        border-radius: 0.25rem;
        margin-right: 1rem;
        max-width: 140px;
    }

    .contentPreviewImg [type="file"] {
        border: 0;
        clip: rect(0, 0, 0, 0);
        height: 1px;
        overflow: hidden;
        padding: 0;
        position: absolute !important;
        white-space: nowrap;
        width: 1px;
    }

    .contentPreviewImg [type="file"] + label {
        background-color: #00ae40;
        border-radius: 4rem;
        color: #fff;
        cursor: pointer;
        display: inline-block;
        padding-left: 2rem 4rem;
        -webkit-transition: .3s ease;
        transition: .3s ease;
        position: absolute;
        top: 50px;
        left: 30px;
    }

    .contentPreviewImg [type="file"]:focus + label,
    .contentPreviewImg [type="file"] + label:hover {
        background-color: #0093c9;
    }

    .contentPreviewImg [type="file"]:focus + label {
        outline: none;
    }

    .contentPreviewImg img {
        width: 150px;
        height: 150px;
        margin: 8px;
        -webkit-box-shadow: 0px 0px 10px 0px #c2c2c2bf;
        box-shadow: 0px 0px 10px 0px #c2c2c2bf;
        border-radius: 8px;
    }

    .contentPreviewImg label {
        display: -webkit-box !important;
        display: -ms-flexbox !important;
        display: flex !important;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
    }

    .contentPreviewImg label span {
        padding: 10px 15px 10px 10px;
    }

    .contentPreviewImg label i {
        font-size: 30px !important;
        padding: 5px 10px;
    }

    .remove_and_update
    {
        display: none !important;
    }

    .remove_and_update2
    {
        display: none !important;
    }


    /*# sourceMappingURL=style.css.map */
</style>

<script src="{{asset('website')}}/js/vendor/modernizr-2.8.3.min.js"></script>
<link href="{{asset('store/plugins/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('store/sweetalert/sweetalert.css')}}">
<style>
    .form-error{
        color: red;
        font-weight: bold;
    }
</style>



<style>

    .select2-selection__arrow
    {
        line-height: 25px !important;
    }

    .select2-selection__rendered
    {
        line-height: 4px !important;
    }


</style>

@stack('css')
@stack('admin_css')
<!-- ================= styles datatable ==================== -->
