@extends('admin.index')

  <?php
  $home_title    = trans('admin.main_name' ) . ' | ' . trans('admin.edit_', ['name_value'=> $admin_group->name] );
  $first_title   = ["title"=> trans('admin.permission_group') , "url"=> aurl('admin_group') ];
  $secind_title  = ["title"=> trans('admin.edit_', ['name_value'=> $admin_group->name] ) , "url"=> '' ];
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
  <div class="box-body">
    {!! Form::open( ['route' => ['permission_group.update', $admin_group->id], 'method' => 'put', 'files'=>true]  ) !!}


    <div class="form-group">
       {!! Form::label('name', trans('admin.Permission_name') ) !!}
       {!! Form::text('name', $admin_group->name ,['class'=>'form-control', 'autofocus' , 'required']) !!}
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
                    <input type="checkbox" {{ $admin_group->setting_show == 'enable' ? 'checked' : '' }}  name="setting_show" value="enable">
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
                    <input type="checkbox" {{ $admin_group->setting_edit == 'enable' ? 'checked' : '' }}  name="setting_edit" value="enable">
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



{{-- ==========================  صلاحيات المشرفين   ==========================  --}}
<tr>
                <th>{{ trans('admin.permission_group') }}</th>

                {{-- show --}}
                <td>
                 <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                   <label>
                     <input type="checkbox" {{ $admin_group->admin_permission_show == 'enable' ? 'checked' : '' }} name="admin_permission_show" value="enable">
                     <span></span>
                   </label>
                 </span>
                </td>
                {{-- add --}}
                <td>
                 <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                   <label>
                     <input type="checkbox" {{ $admin_group->admin_permission_add == 'enable' ? 'checked' : '' }} name="admin_permission_add" value="enable">
                     <span></span>
                   </label>
                 </span>
                </td>
                {{-- edit --}}
                <td>
                 <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                   <label>
                     <input type="checkbox" {{ $admin_group->admin_permission_edit == 'enable' ? 'checked' : '' }} name="admin_permission_edit" value="enable">
                     <span></span>
                   </label>
                 </span>
                </td>
                {{-- delete --}}
                <td>
                 <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                   <label>
                     <input type="checkbox" {{ $admin_group->admin_permission_delete == 'enable' ? 'checked' : '' }} name="admin_permission_delete" value="enable">
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
                    <input type="checkbox" {{ $admin_group->admin_show == 'enable' ? 'checked' : '' }}  name="admin_show" value="enable">
                    <span></span>
                  </label>
                </span>
              </td>
                {{-- add --}}
              <td>
                <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                  <label>
                    <input type="checkbox" {{ $admin_group->admin_add == 'enable' ? 'checked' : '' }}  name="admin_add" value="enable">
                    <span></span>
                  </label>
                </span>
              </td>
                {{-- edit --}}
              <td>
                <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                  <label>
                    <input type="checkbox" {{ $admin_group->admin_edit == 'enable' ? 'checked' : '' }}  name="admin_edit" value="enable">
                    <span></span>
                  </label>
                </span>
              </td>
                {{-- delete --}}
              <td>
                <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                  <label>
                    <input type="checkbox" {{ $admin_group->admin_delete == 'enable' ? 'checked' : '' }}  name="admin_delete" value="enable">
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
                                                    <input type="checkbox" {{ $admin_group->attribute_show == 'enable' ? 'checked' : '' }} name="attribute_show" value="enable">
                                                    <span></span>
                                                </label>
                                            </span>
    </td>
    {{-- add --}}
    <td>
                              <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                                <label>
                                                    <input type="checkbox" {{ $admin_group->attribute_add == 'enable' ? 'checked' : '' }} name="attribute_add" value="enable">
                                                    <span></span>
                                                </label>
                                            </span>
    </td>
    {{-- edit --}}
    <td>
                              <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                                <label>
                                                    <input type="checkbox" {{ $admin_group->attribute_edit == 'enable' ? 'checked' : '' }} name="attribute_edit" value="enable">
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
                                                    <input type="checkbox" {{  $admin_group->brand_show == 'enable' ? 'checked' : '' }} name="brand_show" value="enable">
                                                    <span></span>
                                                </label>
                                            </span>
    </td>
    {{-- add --}}
    <td>
                              <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                                <label>
                                                    <input type="checkbox" {{  $admin_group->brand_add == 'enable' ? 'checked' : '' }} name="brand_add" value="enable">
                                                    <span></span>
                                                </label>
                                            </span>
    </td>
    {{-- edit --}}
    <td>
                              <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                                <label>
                                                    <input type="checkbox" {{  $admin_group->brand_edit == 'enable' ? 'checked' : '' }} name="brand_edit" value="enable">
                                                    <span></span>
                                                </label>
                                            </span>
    </td>
    {{-- delete --}}
    <td>
                              <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                                <label>
                                                    <input type="checkbox" {{  $admin_group->brand_delete == 'enable' ? 'checked' : '' }} name="brand_delete" value="enable">
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
                            <input type="checkbox" {{ $admin_group->department_show == 'enable' ? 'checked' : '' }} name="department_show" value="enable">
                            <span></span>
                          </label>
                        </span>
    </td>
    {{-- add --}}
    <td>
                        <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                          <label>
                            <input type="checkbox" {{ $admin_group->department_add == 'enable' ? 'checked' : '' }} name="department_add" value="enable">
                            <span></span>
                          </label>
                        </span>
    </td>
    {{-- edit --}}
    <td>
                        <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                          <label>
                            <input type="checkbox" {{ $admin_group->department_edit == 'enable' ? 'checked' : '' }} name="department_edit" value="enable">
                            <span></span>
                          </label>
                        </span>
    </td>
    {{-- delete --}}
    <td>
                        <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                          <label>
                            <input type="checkbox" {{ $admin_group->department_delete == 'enable' ? 'checked' : '' }} name="department_delete" value="enable">
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
                            <input type="checkbox" {{ $admin_group->product_show == 'enable' ? 'checked' : '' }} name="product_show" value="enable">
                            <span></span>
                          </label>
                        </span>
    </td>
    {{-- add --}}
    <td>
                        <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                          <label>
                            <input type="checkbox" {{ $admin_group->product_add == 'enable' ? 'checked' : '' }} name="product_add" value="enable">
                            <span></span>
                          </label>
                        </span>
    </td>
    {{-- edit --}}
    <td>
                        <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                          <label>
                            <input type="checkbox" {{ $admin_group->product_edit == 'enable' ? 'checked' : '' }} name="product_edit" value="enable">
                            <span></span>
                          </label>
                        </span>
    </td>
    {{-- delete --}}
    <td>
                        <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                          <label>
                            <input type="checkbox" {{ $admin_group->product_delete == 'enable' ? 'checked' : '' }} name="product_delete" value="enable">
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
                            <input type="checkbox" {{  $admin_group->bill_show == 'enable' ? 'checked' : '' }} name="bill_show" value="enable">
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
                                                    <input type="checkbox" {{ $admin_group->blog_show == 'enable' ? 'checked' : '' }} name="blog_show" value="enable">
                                                    <span></span>
                                                </label>
                                            </span>
    </td>
    {{-- add --}}
    <td>
                              <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                                <label>
                                                    <input type="checkbox" {{ $admin_group->blog_add == 'enable' ? 'checked' : '' }} name="blog_add" value="enable">
                                                    <span></span>
                                                </label>
                                            </span>
    </td>
    {{-- edit --}}
    <td>
                              <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                                <label>
                                                    <input type="checkbox" {{ $admin_group->blog_edit == 'enable' ? 'checked' : '' }} name="blog_edit" value="enable">
                                                    <span></span>
                                                </label>
                                            </span>
    </td>
    {{-- delete --}}
    <td>
                              <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                                <label>
                                                    <input type="checkbox" {{ $admin_group->blog_delete == 'enable' ? 'checked' : '' }} name="blog_delete" value="enable">
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
                                    <input type="checkbox" {{ $admin_group->vendor_show == 'enable' ? 'checked' : '' }} name="vendor_show" value="enable">
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
                                <input type="checkbox" {{ $admin_group->vendor_delete == 'enable' ? 'checked' : '' }} name="vendor_delete" value="enable">
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
                                <input type="checkbox" {{ $admin_group->vendor_block == 'enable' ? 'checked' : '' }} name="vendor_block" value="enable">
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
                                                    <input type="checkbox" {{ $admin_group->driver_show == 'enable' ? 'checked' : '' }} name="driver_show" value="enable">
                                                    <span></span>
                                                </label>
                                            </span>
    </td>
    {{-- add --}}
    <td>
                              <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                                <label>
                                                    <input type="checkbox" {{ $admin_group->driver_add == 'enable' ? 'checked' : '' }} name="driver_add" value="enable">
                                                    <span></span>
                                                </label>
                                            </span>
    </td>
    {{-- edit --}}
    <td>
                              <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                                <label>
                                                    <input type="checkbox" {{ $admin_group->driver_edit == 'enable' ? 'checked' : '' }} name="driver_edit" value="enable">
                                                    <span></span>
                                                </label>
                                            </span>
    </td>
    {{-- delete --}}
    <td>
                              <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                                <label>
                                                    <input type="checkbox" {{ $admin_group->driver_delete == 'enable' ? 'checked' : '' }} name="driver_delete" value="enable">
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
                                <input type="checkbox" {{  $admin_group->driver_block == 'enable' ? 'checked' : '' }} name="driver_block" value="enable">
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
                    <input type="checkbox" {{ $admin_group->user_show == 'enable' ? 'checked' : '' }} name="user_show" value="enable">
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
                    <input type="checkbox" {{ $admin_group->comments_show == 'enable' ? 'checked' : '' }} name="comments_show" value="enable">
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



      {{-- {!! Form::submit(trans('admin.save'),['class'=>'btn btn-primary']) !!} --}}

          <button type="submit" class="btn btn-danger  btn-block">
            <span>
              <span> {{ trans('admin.save') }} </span>
            </span>
          </button>


    {!! Form::close() !!}
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->


@endsection
