@extends('admin.index')

    <?php
    $home_title    =  trans('admin.main_name' )  . ' | ' . trans('admin.add_new_permission') ;
    $first_title   = ["title"=> trans('admin.permission_group') , "url"=> aurl('permission_group') ];
    $secind_title  = ["title"=> trans('admin.add_new_permission') , "url"=> aurl('permission_group/create') ];
    ?>

    @section('page_title')
        {{ $home_title }}
    @endsection

    @section('page-links')
        @include('admin.inc.__title')
    @endsection


@section('content')


  <div class="box">


        @if ($errors->any())
              @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show   m-alert m-alert--air" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  </button>
                  <strong>{{ $error }}</strong>
                </div>
              @endforeach
        @endif

      <div class="box-header">
          <h3 class="box-title">{{ $home_title }}</h3>
      </div>
      <hr><br>
      <!-- /.box-header -->

    {!! Form::open( ['route' => 'permission_group.store',  'method' => 'POST','files'=>true] ) !!}


      <div class="form-group">
         {!! Form::label('name', trans('admin.Permission_name') ) !!}
         {!! Form::text('name',old('name'),['class'=>'form-control', 'autofocus' , 'required']) !!}
      </div>


      <!--begin::Section-->
      <div class="m-section">
      	<div class="m-section__content">
      		<table class="table m-table m-table--head-bg-success">
      			<thead>
      				<tr>
      					<th>{{ trans('admin.mangement') }}</th>
      					<th>{{ trans('admin.show') }}</th>
                        <th>{{ trans('admin.add_m') }}</th>
                        <th>{{ trans('admin.edit_m') }}</th>
      					<th>{{ trans('admin.delete_') }}</th>
                        <th>{{ trans('admin.show_comment') }}</th>
                        <th>{{ trans('admin.block') }}</th>
      				</tr>
      			</thead>
      			<tbody>


{{-- =============================  الاعدادات  ============================= --}}
<tr>
                <th>{{ trans('admin.setting') }}</th>

                {{-- show --}}
                <td>
                  <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                    <label>
                                        <input type="checkbox" {{ old('setting_show') ? 'checked' : '' }}  name="setting_show" value="enable">
                                        <span></span>
                                    </label>
                                </span>
                </td>


                 {{-- add disabled --}}
                 <td>
                <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                  <label>
                    <input type="checkbox"  disabled>
                    <span></span>
                  </label>
                </span>
                 </td>

                  {{-- edit --}}
                <td>
                  <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                    <label>
                                        <input type="checkbox" {{ old('setting_edit') ? 'checked' : '' }}  name="setting_edit" value="enable">
                                        <span></span>
                                    </label>
                                </span>
                </td>

                 {{-- delete disabled --}}
                 <td>
                <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                  <label>
                    <input type="checkbox"  disabled>
                    <span></span>
                  </label>
                </span>
                 </td>

                 {{-- comments disabled --}}
                 <td>
                <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                  <label>
                    <input type="checkbox"  disabled>
                    <span></span>
                  </label>
                </span>
                 </td>

                 {{-- block disabled --}}
                 <td>
                <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                  <label>
                    <input type="checkbox"  disabled>
                    <span></span>
                  </label>
                </span>
                 </td>

             </tr>
{{-- =============================  ------  ============================= --}}



{{-- ========================  صلاحيات المشرفين   ===========================  --}}
<tr>
                 <th>{{ trans('admin.permission_group') }}</th>

                 {{-- show --}}
                 <td>
                      <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                        <label>
                                            <input type="checkbox" {{ old('admin_permission_show') ? 'checked' : '' }} name="admin_permission_show" value="enable">
                                            <span></span>
                                        </label>
                                    </span>
                 </td>
                 {{-- add --}}
                 <td>
                      <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                        <label>
                                            <input type="checkbox" {{ old('admin_permission_add') ? 'checked' : '' }} name="admin_permission_add" value="enable">
                                            <span></span>
                                        </label>
                                    </span>
                 </td>
                 {{-- edit --}}
                 <td>
                      <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                        <label>
                                            <input type="checkbox" {{ old('admin_permission_edit') ? 'checked' : '' }} name="admin_permission_edit" value="enable">
                                            <span></span>
                                        </label>
                                    </span>
                 </td>
                 {{-- delete --}}
                 <td>
                      <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                        <label>
                                            <input type="checkbox" {{ old('admin_permission_delete') ? 'checked' : '' }} name="admin_permission_delete" value="enable">
                                            <span></span>
                                        </label>
                                    </span>
                 </td>

                 {{-- comments disabled --}}
                 <td>
                <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                  <label>
                    <input type="checkbox"  disabled>
                    <span></span>
                  </label>
                </span>
                 </td>

                 {{-- block disabled --}}
                 <td>
                <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                  <label>
                    <input type="checkbox"  disabled>
                    <span></span>
                  </label>
                </span>
                 </td>

             </tr>
{{-- =============================  ------  ============================= --}}



{{-- =============================  المشرفين  ============================= --}}
<tr>
                <th>{{ trans('admin.admins') }}</th>

                {{-- show --}}
                <td>
                  <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                    <label>
                                        <input type="checkbox" {{ old('admin_show') ? 'checked' : '' }}  name="admin_show" value="enable">
                                        <span></span>
                                    </label>
                                </span>
                </td>
                  {{-- add --}}
                <td>
                  <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                    <label>
                                        <input type="checkbox" {{ old('admin_add') ? 'checked' : '' }}  name="admin_add" value="enable">
                                        <span></span>
                                    </label>
                                </span>
                </td>
                  {{-- edit --}}
                <td>
                  <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                    <label>
                                        <input type="checkbox" {{ old('admin_edit') ? 'checked' : '' }}  name="admin_edit" value="enable">
                                        <span></span>
                                    </label>
                                </span>
                </td>
                  {{-- delete --}}
                <td>
                  <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                    <label>
                                        <input type="checkbox" {{ old('admin_delete') ? 'checked' : '' }}  name="admin_delete" value="enable">
                                        <span></span>
                                    </label>
                                </span>
                </td>

                 {{-- comments disabled --}}
                 <td>
                <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                  <label>
                    <input type="checkbox"  disabled>
                    <span></span>
                  </label>
                </span>
                 </td>

                 {{-- block disabled --}}
                 <td>
                <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                  <label>
                    <input type="checkbox"  disabled>
                    <span></span>
                  </label>
                </span>
                 </td>

             </tr>
{{-- =============================  ------  ============================= --}}

{{--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++--}}
{{-- =============================  السمات  ============================= --}}
<tr>
    <th>السمات</th>

    {{-- show --}}
    <td>
                              <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                                <label>
                                                    <input type="checkbox" {{ old('attribute_show') ? 'checked' : '' }} name="attribute_show" value="enable">
                                                    <span></span>
                                                </label>
                                            </span>
    </td>
    {{-- add --}}
    <td>
                              <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                                <label>
                                                    <input type="checkbox" {{ old('attribute_add') ? 'checked' : '' }} name="attribute_add" value="enable">
                                                    <span></span>
                                                </label>
                                            </span>
    </td>
    {{-- edit --}}
    <td>
                              <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                                <label>
                                                    <input type="checkbox" {{ old('attribute_edit') ? 'checked' : '' }} name="attribute_edit" value="enable">
                                                    <span></span>
                                                </label>
                                            </span>
    </td>

    {{-- delete disabled --}}
    <td>
                <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                  <label>
                    <input type="checkbox"  disabled>
                    <span></span>
                  </label>
                </span>
    </td>

    {{-- comments disabled --}}
    <td>
                <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                  <label>
                    <input type="checkbox"  disabled>
                    <span></span>
                  </label>
                </span>
    </td>

    {{-- block disabled --}}
    <td>
                <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                  <label>
                    <input type="checkbox"  disabled>
                    <span></span>
                  </label>
                </span>
    </td>

</tr>
{{-- =============================  ------  ============================= --}}


{{-- =============================  الماركات   ============================= --}}
<tr>
    <th>الماركات </th>

    {{-- show --}}
    <td>
                              <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                                <label>
                                                    <input type="checkbox" {{ old('brand_show') ? 'checked' : '' }} name="brand_show" value="enable">
                                                    <span></span>
                                                </label>
                                            </span>
    </td>
    {{-- add --}}
    <td>
                              <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                                <label>
                                                    <input type="checkbox" {{ old('brand_add') ? 'checked' : '' }} name="brand_add" value="enable">
                                                    <span></span>
                                                </label>
                                            </span>
    </td>
    {{-- edit --}}
    <td>
                              <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                                <label>
                                                    <input type="checkbox" {{ old('brand_edit') ? 'checked' : '' }} name="brand_edit" value="enable">
                                                    <span></span>
                                                </label>
                                            </span>
    </td>
    {{-- delete --}}
    <td>
                              <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                                <label>
                                                    <input type="checkbox" {{ old('brand_delete') ? 'checked' : '' }} name="brand_delete" value="enable">
                                                    <span></span>
                                                </label>
                                            </span>
    </td>

    {{-- comments disabled --}}
    <td>
                <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                  <label>
                    <input type="checkbox"  disabled>
                    <span></span>
                  </label>
                </span>
    </td>

    {{-- block disabled --}}
    <td>
                <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                  <label>
                    <input type="checkbox"  disabled>
                    <span></span>
                  </label>
                </span>
    </td>

</tr>
{{-- =============================  ------  ============================= --}}
{{--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++--}}


{{-- =============================  الاقسام  ============================= --}}
<tr>
    <th>الاقسام</th>

    {{-- show --}}
    <td>
                              <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                                <label>
                                                    <input type="checkbox" {{ old('department_show') ? 'checked' : '' }} name="department_show" value="enable">
                                                    <span></span>
                                                </label>
                                            </span>
    </td>
    {{-- add --}}
    <td>
                              <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                                <label>
                                                    <input type="checkbox" {{ old('department_add') ? 'checked' : '' }} name="department_add" value="enable">
                                                    <span></span>
                                                </label>
                                            </span>
    </td>
    {{-- edit --}}
    <td>
                              <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                                <label>
                                                    <input type="checkbox" {{ old('department_edit') ? 'checked' : '' }} name="department_edit" value="enable">
                                                    <span></span>
                                                </label>
                                            </span>
    </td>
    {{-- delete --}}
    <td>
                              <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                                <label>
                                                    <input type="checkbox" {{ old('department_delete') ? 'checked' : '' }} name="department_delete" value="enable">
                                                    <span></span>
                                                </label>
                                            </span>
    </td>

    {{-- comments disabled --}}
    <td>
                <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                  <label>
                    <input type="checkbox"  disabled>
                    <span></span>
                  </label>
                </span>
    </td>

    {{-- block disabled --}}
    <td>
                <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                  <label>
                    <input type="checkbox"  disabled>
                    <span></span>
                  </label>
                </span>
    </td>

</tr>
{{-- =============================  ------  ============================= --}}


{{-- =============================  المنتجات  ============================= --}}
<tr>
    <th>المنتجات</th>

    {{-- show --}}
    <td>
                              <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                                <label>
                                                    <input type="checkbox" {{ old('product_show') ? 'checked' : '' }} name="product_show" value="enable">
                                                    <span></span>
                                                </label>
                                            </span>
    </td>
    {{-- add --}}
    <td>
                              <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                                <label>
                                                    <input type="checkbox" {{ old('product_add') ? 'checked' : '' }} name="product_add" value="enable">
                                                    <span></span>
                                                </label>
                                            </span>
    </td>
    {{-- edit --}}
    <td>
                              <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                                <label>
                                                    <input type="checkbox" {{ old('product_edit') ? 'checked' : '' }} name="product_edit" value="enable">
                                                    <span></span>
                                                </label>
                                            </span>
    </td>
    {{-- delete --}}
    <td>
                              <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                                <label>
                                                    <input type="checkbox" {{ old('product_delete') ? 'checked' : '' }} name="product_delete" value="enable">
                                                    <span></span>
                                                </label>
                                            </span>
    </td>

    {{-- comments disabled --}}
    <td>
                <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                  <label>
                    <input type="checkbox"  disabled>
                    <span></span>
                  </label>
                </span>
    </td>

    {{-- block disabled --}}
    <td>
                <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                  <label>
                    <input type="checkbox"  disabled>
                    <span></span>
                  </label>
                </span>
    </td>

</tr>
{{-- =============================  ------  ============================= --}}


{{-- =============================  الفواتير  ============================= --}}
<tr>
    <th>الفواتير</th>

    {{-- show --}}
    <td>
                              <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                                <label>
                                                    <input type="checkbox" {{ old('bill_show') ? 'checked' : '' }} name="bill_show" value="enable">
                                                    <span></span>
                                                </label>
                                            </span>

    {{-- add disabled --}}
    <td>
        <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
          <label>
            <input type="checkbox"  disabled>
            <span></span>
          </label>
        </span>
    </td>

    {{-- edit disabled --}}
    <td>
        <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
          <label>
            <input type="checkbox"  disabled>
            <span></span>
          </label>
        </span>
    </td>

    {{-- delete disabled --}}
    <td>
        <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
          <label>
            <input type="checkbox"  disabled>
            <span></span>
          </label>
        </span>
    </td>

    {{-- comments disabled --}}
    <td>
        <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
          <label>
            <input type="checkbox"  disabled>
            <span></span>
          </label>
        </span>
    </td>

    {{-- block disabled --}}
    <td>
                <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                  <label>
                    <input type="checkbox"  disabled>
                    <span></span>
                  </label>
                </span>
    </td>

</tr>
{{-- =============================  ------  ============================= --}}




{{-- =============================  المقالات  ============================= --}}
<tr>
    <th>المقالات</th>

    {{-- show --}}
    <td>
                              <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                                <label>
                                                    <input type="checkbox" {{ old('blog_show') ? 'checked' : '' }} name="blog_show" value="enable">
                                                    <span></span>
                                                </label>
                                            </span>
    </td>
    {{-- add --}}
    <td>
                              <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                                <label>
                                                    <input type="checkbox" {{ old('blog_add') ? 'checked' : '' }} name="blog_add" value="enable">
                                                    <span></span>
                                                </label>
                                            </span>
    </td>
    {{-- edit --}}
    <td>
                              <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                                <label>
                                                    <input type="checkbox" {{ old('blog_edit') ? 'checked' : '' }} name="blog_edit" value="enable">
                                                    <span></span>
                                                </label>
                                            </span>
    </td>
    {{-- delete --}}
    <td>
                              <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                                <label>
                                                    <input type="checkbox" {{ old('blog_delete') ? 'checked' : '' }} name="blog_delete" value="enable">
                                                    <span></span>
                                                </label>
                                            </span>
    </td>

    {{-- comments disabled --}}
    <td>
                <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                  <label>
                    <input type="checkbox"  disabled>
                    <span></span>
                  </label>
                </span>
    </td>

    {{-- block disabled --}}
    <td>
                <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                  <label>
                    <input type="checkbox"  disabled>
                    <span></span>
                  </label>
                </span>
    </td>

</tr>
{{-- =============================  ------  ============================= --}}





{{-- =============================  المتاجر  ============================= --}}
<tr>
    <th>المتاجر</th>

    {{-- show --}}
    <td>
              <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                <label>
                                    <input type="checkbox" {{  old('vendor_show') ? 'checked' : '' }} name="vendor_show" value="enable">
                                    <span></span>
                                </label>
                            </span>
    </td>

    {{-- add disabled --}}
    <td>
            <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
              <label>
                <input type="checkbox"  disabled>
                <span></span>
              </label>
            </span>
    </td>


    {{-- edit disabled --}}
    <td>
            <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
              <label>
                <input type="checkbox"  disabled>
                <span></span>
              </label>
            </span>
    </td>

    {{-- delete --}}
    <td>
          <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                            <label>
                                <input type="checkbox" {{  old('vendor_delete') ? 'checked' : '' }} name="vendor_delete" value="enable">
                                <span></span>
                            </label>
                        </span>
    </td>

    {{-- comments disabled --}}
    <td>
                <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                  <label>
                    <input type="checkbox"  disabled>
                    <span></span>
                  </label>
                </span>
    </td>

    {{-- block --}}
    <td>
          <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                            <label>
                                <input type="checkbox" {{  old('vendor_block') ? 'checked' : '' }} name="vendor_block" value="enable">
                                <span></span>
                            </label>
                        </span>
    </td>

</tr>
{{-- =============================  ------  ============================= --}}




{{-- =============================   السائقين   ============================= --}}
<tr>
    <th> السائقين </th>

    {{-- show --}}
    <td>
                              <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                                <label>
                                                    <input type="checkbox" {{ old('driver_show') ? 'checked' : '' }} name="driver_show" value="enable">
                                                    <span></span>
                                                </label>
                                            </span>
    </td>
    {{-- add --}}
    <td>
                              <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                                <label>
                                                    <input type="checkbox" {{ old('driver_add') ? 'checked' : '' }} name="driver_add" value="enable">
                                                    <span></span>
                                                </label>
                                            </span>
    </td>
    {{-- edit --}}
    <td>
                              <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                                <label>
                                                    <input type="checkbox" {{ old('driver_edit') ? 'checked' : '' }} name="driver_edit" value="enable">
                                                    <span></span>
                                                </label>
                                            </span>
    </td>
    {{-- delete --}}
    <td>
                              <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                                <label>
                                                    <input type="checkbox" {{ old('driver_delete') ? 'checked' : '' }} name="driver_delete" value="enable">
                                                    <span></span>
                                                </label>
                                            </span>
    </td>

    {{-- comments disabled --}}
    <td>
                <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                  <label>
                    <input type="checkbox"  disabled>
                    <span></span>
                  </label>
                </span>
    </td>

    {{-- block --}}
    <td>
          <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                            <label>
                                <input type="checkbox" {{  old('driver_block') ? 'checked' : '' }} name="driver_block" value="enable">
                                <span></span>
                            </label>
                        </span>
    </td>

</tr>
{{-- =============================  ------  ============================= --}}




{{--********************************  الاعضاء   ******************************** --}}
<tr>
    <th>الاعضاء  </th>

    {{-- show --}}
    <td>
                <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                  <label>
                    <input type="checkbox" {{ old('user_show') ? 'checked' : '' }} name="user_show" value="enable">
                    <span></span>
                  </label>
                </span>
    </td>

    {{-- add disabled --}}
    <td>
                <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                  <label>
                    <input type="checkbox"  disabled>
                    <span></span>
                  </label>
                </span>
    </td>

    {{-- edit disabled --}}
    <td>
                <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                  <label>
                    <input type="checkbox"  disabled>
                    <span></span>
                  </label>
                </span>
    </td>

    {{-- delete disabled--}}
    <td>
                <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                  <label>
                    <input type="checkbox" disabled>
                    <span></span>
                  </label>
                </span>
    </td>


    {{-- comments disabled--}}
    <td>
                <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                  <label>
                    <input type="checkbox" disabled>
                    <span></span>
                  </label>
                </span>
    </td>

    {{-- block --}}
    <td>
                <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                  <label>
                    <input type="checkbox" disabled>
                    <span></span>
                  </label>
                </span>
    </td>

</tr>
{{-- =============================  ------  ============================= --}}



{{--********************************  التعليقات   ******************************** --}}
<tr>
    <th>التعليقات  </th>

    {{-- show --}}
    <td>
                <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                  <label>
                    <input type="checkbox" {{ old('comments_show') ? 'checked' : '' }} name="comments_show" value="enable">
                    <span></span>
                  </label>
                </span>
    </td>

    {{-- add disabled --}}
    <td>
                <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                  <label>
                    <input type="checkbox"  disabled>
                    <span></span>
                  </label>
                </span>
    </td>

    {{-- edit disabled --}}
    <td>
                <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                  <label>
                    <input type="checkbox"  disabled>
                    <span></span>
                  </label>
                </span>
    </td>

    {{-- delete disabled--}}
    <td>
                <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                  <label>
                    <input type="checkbox" disabled>
                    <span></span>
                  </label>
                </span>
    </td>


    {{-- comments disabled--}}
    <td>
                <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                  <label>
                    <input type="checkbox" disabled>
                    <span></span>
                  </label>
                </span>
    </td>

    {{-- block --}}
    <td>
                <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                  <label>
                    <input type="checkbox" disabled>
                    <span></span>
                  </label>
                </span>
    </td>

</tr>
{{-- =============================  ------  ============================= --}}




                </tbody>
      		</table>
      	</div>
      </div>
      <!--end::Section-->


     {{-- {!! Form::submit(trans('admin.add'),['class'=>'btn btn-primary']) !!} --}}


               <button type="submit" class="btn btn-danger  btn-block">
                 <span>
                   <span> {{ trans('admin.add') }} </span>
                 </span>
               </button>

    {!! Form::close() !!}



  </div>
  <!-- /.box-body -->



@endsection
