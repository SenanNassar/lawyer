<?php

namespace App\DataTables;

use App\Consultative;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ConsultativeDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'consultative.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Consultative $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Consultative $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('consultative-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                       
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reload')
                    )
                    ->parameters([array_merge($this->getBuilderParameters(), [

                    'language' => [
                        'url' => '//cdn.datatables.net/plug-ins/1.10.21/i18n/Arabic.json',
                        'buttons' => [
                            'export' => 'تصدير',
                            'print' => 'طباعة',
                            'reload' => 'اعادة تحميل',


                        ]
                    ]

                    ]
                    )]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
        
             Column::make('name'),
          
            Column::make('title'),
            Column::make('body'),                    
         
            //Column::make('updated_at'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Consultative_' . date('YmdHis');
    }
}
