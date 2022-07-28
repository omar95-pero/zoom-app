<?php
namespace App\DataTables;

use App\Models\Slider;

use Yajra\DataTables\Services\DataTable;

class SliderDatatable extends DataTable {


	public function dataTable($query) {
	    /*
	       type_condition
           area_condition
	    */
		return datatables($query)
			->addColumn('checkbox', 'admin.sliders.btn.checkbox')
			->addColumn('edit', 'admin.sliders.btn.edit')
			->addColumn('delete', 'admin.sliders.btn.delete')
			->addColumn('img', 'admin.sliders.btn.img')
            ->addColumn('is_shown_condition', function ($query){
			    return $query->is_shown == 'yes' ? 'ظاهر': 'مخفى';
            })
			->rawColumns([
                'checkbox',
                'edit',
                'delete',
                'img',
                'is_shown_condition',
			]);
	}


	public function query() {
		return Slider::query();
	}


	public function html() {
		return $this->builder()
		            ->columns($this->getColumns())
			->minifiedAjax()
			->parameters([
				// 'responsive' => true,
				'dom'        => 'Blfrtip',
				'lengthMenu' => [[10, 25, 50, 100], [10, 25, 50, trans('admin.all_record')]],
				'buttons'    => [
					['extend' => 'print', 'className' => 'btn btn-primary btn_space', 'text' => '<i class="fa fa-print"></i> '.trans('admin.print')],
					['extend' => 'csv', 'className' => 'btn btn-info btn_space', 'text' => '<i class="fa fa-file"></i> '.trans('admin.ex_csv')],
					['extend' => 'excel', 'className' => 'btn btn-success btn_space', 'text' => '<i class="fa fa-file"></i> '.trans('admin.ex_excel')],
					['extend' => 'pdf', 'className' => 'btn btn-info btn_space', 'text' => 'PDF <i class="fa fa-file"></i> '],
					['extend' => 'reload', 'className' => 'btn btn-default btn_space', 'text' => '<i class="fa 	fa-sync"></i>'],
					//Trash
					['text' => '<i class="fa fa-trash"></i>', 'className' => 'btn btn-danger delBtn btn_space'],
				],
				'initComplete' => " function () {
		            this.api().columns([2,3]).every(function () {
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

	protected function getColumns()
    {
        $data = [
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
                    ],
//                    [
//                        'name'  => 'id',
//                        'data'  => 'id',
//                        'title' => '#',
//                    ],
                    [
                        'name'  => 'img',
                        'data'  => 'img',
                        'title' => 'الصورة',
                    ],
                    [
                        'name'  => 'title',
                        'data'  => 'title',
                        'title' => 'العنوان',
                    ],
                    [
                        'name'  => 'is_shown_condition',
                        'data'  => 'is_shown_condition',
                        'title' => 'نوع العرض',
                    ],
                    [
                        'name'       => 'edit',
                        'data'       => 'edit',
                        'title'      => trans('admin.edit'),
                        'exportable' => false,
                        'printable'  => false,
                        'orderable'  => false,
                        'searchable' => false,
                    ],
                    [
                        'name'       => 'delete',
                        'data'       => 'delete',
                        'title'      => trans('admin.delete'),
                        'exportable' => false,
                        'printable'  => false,
                        'orderable'  => false,
                        'searchable' => false,
                    ],
		        ];
        return $data;
	}


	protected function filename() {
		return 'Slider_'.date('YmdHis');
	}


}
