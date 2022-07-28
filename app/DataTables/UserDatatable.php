<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Services\DataTable;

class UserDatatable extends DataTable {
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query) {
        return datatables($query)
            ->addColumn('full_name', 'admin.users.btn.full_name')
            ->addColumn('checkbox', 'admin.users.btn.checkbox')
            ->addColumn('block_user', 'admin.users.btn.block_user')
            ->addColumn('delete', 'admin.users.btn.delete')
            ->rawColumns([
                'full_name',
                'checkbox',
                'block_user',
                'delete',
            ]);
    }
    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query() {
        return User::query()->where('user_type','client')->where('id', '!=', 1);
    }
    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html() {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->parameters([
                // 'responsive' => true,
                'dom'        => 'Blfrtip',
                'lengthMenu' => [[10, 25, 50, 100], [10, 25, 50, trans('admin.all_record')]],
                'buttons'    => [

                    // ['text' => '<i class="fa fa-plus"></i> '.'اضافة مشرف جديد', 'className' => 'btn btn-info', "action" => "function(){
                    // 		window.location.href = '".\URL::current()."/create';
                    // 	}"],

                    ['extend' => 'print', 'className' => 'btn btn-primary btn_space', 'text' => '<i class="fa fa-print"></i> '.trans('admin.print')],
                    ['extend' => 'csv', 'className' => 'btn btn-info btn_space', 'text' => '<i class="fa fa-file"></i> '.trans('admin.ex_csv')],
                    ['extend' => 'excel', 'className' => 'btn btn-success btn_space', 'text' => '<i class="fa fa-file"></i> '.trans('admin.ex_excel')],
//                    ['extend' => 'pdf', 'className' => 'btn btn-info btn_space', 'text' => 'PDF <i class="fa fa-file"></i> '],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn_space', 'text' => '<i class="fa 	fa-sync"></i>'],

                    //Trash
                    ['text' => '<i class="fa fa-trash"></i>', 'className' => 'btn btn-danger delBtn btn_space'],

                ],

                'initComplete' => " function () {

		            this.api().columns([1,2]).every(function () {


		                var column = this;
		                var input = document.createElement(\"input\");

		                // add placeholder
										$('.form-control-sm').attr('placeholder', '".trans('admin.Search')."');

										// add placeholder
		                $(input).attr('placeholder', '".trans('admin.Search')."').addClass('form-control form-control-sm').css('border','1px solid rgb(177, 177, 177)');



		                $(input).appendTo($(column.footer()).empty())
		                .on('keyup', function () {
		                    column.search($(this).val(), false, false, true).draw();
		                });
		            });
		        }",

                // from helper @@@@@@@@@@@
                'language' => datatable_lang(),

            ]);
    }
    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns() {
        return [
            [
                'name'       => 'checkbox',
                'data'       => 'checkbox',
                'title'      => '<div class="pretty p-default">
												    <input type="checkbox" class="check_all" onclick="check_all()" />
												    <div class="state p-warning-o">
												        <label></label>
												    </div>
											   </div>',
                'exportable' => false,
                'printable'  => false,
                'orderable'  => false,
                'searchable' => false,
            ], [
                'name'  => 'code',
                'data'  => 'code',
                'title' => 'كود المستخدم',
            ], [
                'name'  => 'full_name',
                'data'  => 'full_name',
                'title' => 'اسم العميل',
            ],[
                'name'  => 'phone',
                'data'  => 'phone',
                'title' => 'الهاتف',
            ]
           ,[
                'name'  => 'email',
                'data'  => 'email',
                'title' => 'الايميل',
            ], [
                'name'  => 'address_1',
                'data'  => 'address_1',
                'title' => 'العنوان',
            ], [
                'name'  => 'address_2',
                'data'  => 'address_2',
                'title' => 'عنوان اخر',
            ], [
                'name'  => 'city',
                'data'  => 'city',
                'title' => 'المدينة',
            ]
        ];
    }
    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename() {
        return 'user_'.date('YmdHis');
    }
}
