<?php

namespace App\DataTables;

use App\Models\Config;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class ConfigDataTable extends DataTable
{
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'configs.datatables_actions');
    }

    public function query(Config $model)
    {
        return $model->newQuery();
    }

    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false, 'title' => __('crud.action')])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    // [
                    //    'extend' => 'create',
                    //    'className' => 'btn btn-default btn-sm no-corner',
                    //    'text' => '<i class="fa fa-plus"></i> ' .__('auth.app.create').''
                    // ],
                    [
                       'extend' => 'export',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-download"></i> ' .__('auth.app.export').''
                    ],
                    [
                       'extend' => 'print',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-print"></i> ' .__('auth.app.print').''
                    ],
                    [
                       'extend' => 'reset',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-undo"></i> ' .__('auth.app.reset').''
                    ],
                    [
                       'extend' => 'reload',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-refresh"></i> ' .__('auth.app.reload').''
                    ],
                ],
                 'language' => [
                   'url' => url('//cdn.datatables.net/plug-ins/1.10.12/i18n/English.json'),
                 ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'title_en' => new Column(['title' => __('models/configs.fields.title_en'), 'data' => 'title_en']),
            'title_ar' => new Column(['title' => __('models/configs.fields.title_ar'), 'data' => 'title_ar']),
            'name' => new Column(['title' => __('models/configs.fields.name'), 'data' => 'name']),
            // 'type' => new Column(['title' => __('models/configs.fields.type'), 'data' => 'type']),
            // 'group' => new Column(['title' => __('models/configs.fields.group'), 'data' => 'group'])
        ];
    }

    protected function filename()
    {
        return 'configs_datatable_' . time();
    }
}
