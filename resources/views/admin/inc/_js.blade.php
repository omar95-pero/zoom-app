
<!--=================== jquery =====================-->
{{-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> --}}


<!--=================== Metronic =====================-->
<script src="{{asset('dashboard/assets')}}/vendors/base/vendors.bundle.js" type="text/javascript"></script>
<script src="{{asset('dashboard/assets')}}/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
<script src="{{asset('dashboard/assets')}}/demo/default/custom/components/base/toastr.js" type="text/javascript"></script>
{{-- <!--begin::Page Scripts -->
<script src="{{asset('dashboard/assets')}}/demo/default/custom/crud/datatables/extensions/responsive.js" type="text/javascript"></script> --}}

<!--begin::Page Scripts -->
<script src="{{asset('dashboard/assets')}}/demo/default/custom/crud/forms/widgets/select2.js" type="text/javascript"></script>

<!--begin::Page Scripts -->
<script src="{{asset('dashboard/assets')}}/demo/default/custom/crud/forms/widgets/bootstrap-datepicker.js" type="text/javascript"></script>

<!--begin::Page Vendors -->
<script src="{{asset('dashboard/assets')}}/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>

<!--end::Page Vendors -->

<!--begin::Page Scripts -->
<script src="{{asset('dashboard/assets')}}/app/js/dashboard.js" type="text/javascript"></script>

<!--begin::Page Scripts -->
<script src="{{asset('dashboard/assets')}}/demo/default/custom/crud/forms/widgets/bootstrap-select.js" type="text/javascript"></script>
<!--end::Page Scripts -->

<script src="{{asset('store/select2')}}/select2.min.js"></script>


{{--<script src="{{asset('dashboard/assets')}}/demo/default/custom/crud/wizard/wizard.js" type="text/javascript"></script>--}}

@stack('wizard_js')

<!--=================== DataTable style =====================-->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('dashboard/datatable_btn') }}/dataTables.buttons.min.js"></script>
<script src="{{ url('') }}/vendor/datatables/buttons.server-side.js"></script>

<!-- DataTable fixedHeader -->
<!-- <script src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script>  -->

<!-- DataTable responsive -->
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>


<script type="text/javascript">


    $('.datepicker').datepicker();

    function check_all()
    {
        $('input[class="item_checkbox"]:checkbox').each(function(){
            if ( $('input[class="check_all"]:checkbox:checked').length == 0 ) {
                $(this).prop('checked', false);
            }else {
                $(this).prop('checked', true);
            }
        });
    }

    function delete_all()
    {

        $(document).on('click', '.del_all', function(){
            $('#form_data').submit();
        });

        $(document).on('click', '.delBtn', function(){
            var item_checked = $('input[class="item_checkbox"]:checkbox').filter(":checked").length;

            if (item_checked > 0) {
                $('.record_count').text(item_checked);
                $('.not_empty_record').removeClass('hidden');
                $('.empty_record').addClass('hidden');
            }
            if(item_checked < 1) {
                $('.record_count').text(item_checked);
                $('.not_empty_record').addClass('hidden');
                $('.empty_record').removeClass('hidden');
                $('.del_all').hide();
            }

            $('#mutlipleDelete').modal('show');
        });
    }

</script>

<script src="{{asset('dashboard/ckeditor')}}/ckeditor.js" type="text/javascript"></script>
<script src="{{asset('dashboard/ckeditor')}}/adapters/jquery.js" type="text/javascript"></script>
<script>
    // $('textarea').ckeditor();
    $('.textarea').ckeditor(); // if class is prefered.
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>

<script src="{{asset('dashboard/imageuploadify')}}/imageuploadify.min.js"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    $(document).ready(function () {
        $('.dropify').dropify();
    });//end jquery
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.file_upload').imageuploadify();
    })
</script>


<script>
    $(function () {
        $('.selectpicker').selectpicker();
    });
</script>

<script src="{{asset('store/validation/jquery.form-validator.js')}}"></script>

<script src="{{asset('store/validation/toastr.min.js')}}"></script>

<script src="{{asset('store/sweetalert/sweetalert.min.js')}}"></script>

<script src="{{asset('store/plugins/toast-master/js/jquery.toast.js')}}"></script>

<script>
    function myToast(heading, text, position, loaderBg, icon, hideAfter, stack) {
        "use strict";
        $.toast({
            heading: heading,
            text: text,
            position: position,
            loaderBg: loaderBg,
            icon: icon,
            hideAfter: hideAfter,
            stack: stack
        });
    }
    //for input number validation
    jQuery('.numbersOnly').keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g,'');
    });
</script>


<script !src="">

    $(document).ready(function() {

        $(document).on('change', '.myselect_product_type', function () {
            $selected_val = $( ".myselect_product_type option:selected" ).val();
            // console.log( $selected_val );
            if($selected_val == 'upcoming')
            {
                $('.upcomming_show').fadeIn();
            }else {
                $('.upcomming_show').fadeOut();
            }
        }); // end click

    });
</script>


@stack('js')
@stack('admin_js')
