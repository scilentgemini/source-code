<?php

namespace App\DataTables;

use App\Models\YoutubeVideo;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class YoutubeVideoDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {
                return '<a href="' . route('admin.youtube-videos.edit', $query->id) . '" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="' . route('admin.youtube-videos.destroy', $query->id) . '" class="btn btn-danger delete-item"><i class="fas fa-trash"></i></a>';
            })
            ->addColumn('status', function ($query) {
                return '<div class="custom-switch custom-control">
                    <input type="checkbox" name="custom-switch-checkbox" data-id="' . $query->id . '" class="custom-control-input" id="customSwitch' . $query->id . '" ' . ($query->status ? 'checked' : '') . '>
                    <label class="custom-control-label" for="customSwitch' . $query->id . '"></label>
                </div>';
            })
            ->rawColumns(['action', 'status'])
            ->setRowId('id');
    }

    public function query(YoutubeVideo $model): QueryBuilder
    {
        return $model->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('youtube-videos-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('title'),
            Column::make('video_url'),
            Column::make('sort_order'),
            Column::make('status'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    protected function filename(): string
    {
        return 'YoutubeVideos_' . date('YmdHis');
    }
}
