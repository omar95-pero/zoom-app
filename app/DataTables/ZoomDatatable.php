<?php

namespace App\DataTables;

use App\Models\Meeting;
use App\Models\User;
use Yajra\DataTables\Services\DataTable;

class ZoomDatatable extends DataTable {
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query) {
        return datatables($query)
            ->addColumn('url', 'admin.meetings.btn.url')
//            ->addColumn('checkbox', 'admin.users.btn.checkbox')
//            ->addColumn('block_user', 'admin.users.btn.block_user')
//            ->addColumn('delete', 'admin.users.btn.delete')
            ->rawColumns([
                'url',
//                'checkbox',
//                'block_user',
//                'delete',
            ]);
    }
    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query() {
        return Meeting::query();
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
//            [
//                'name'       => 'checkbox',
//                'data'       => 'checkbox',
//                'title'      => '<div class="pretty p-default">
//												    <input type="checkbox" class="check_all" onclick="check_all()" />
//												    <div class="state p-warning-o">
//												        <label></label>
//												    </div>
//											   </div>',
//                'exportable' => false,
//                'printable'  => false,
//                'orderable'  => false,
//                'searchable' => false,
//            ],
            [
                'name'  => 'meeting_id',
                'data'  => 'meeting_id',
                'title' => 'كود الاجتماع',
            ], [
                'name'  => 'topic',
                'data'  => 'topic',
                'title' => 'عنوان الاجتماع
                ',
            ], [
                'name'  => 'url',
                'data'  => 'url',
                'title' => 'الرابط',
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
