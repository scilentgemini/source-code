<?php

namespace App\DataTables;

use App\Models\Listing;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ListingDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('action', function($query){
                $edit = '<a href="'.route('admin.listing.edit', $query->id).'" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>';
                $delete = '<a href="'.route('admin.listing.destroy', $query->id).'" class="delete-item btn btn-sm btn-danger ml-2"><i class="fas fa-trash"></i></a>';

                $more = '<div class="btn-group dropleft">
                <button type="button" class="btn btn-sm ml-2 btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-cog"></i>
                </button>
                <div class="dropdown-menu dropleft" x-placement="left-start" style="position: absolute; transform: translate3d(-2px, 0px, 0px); top: 0px; left: 0px; will-change: transform;">
                  <a class="dropdown-item" href="'.route('admin.listing-image-gallery.index', ['id' => $query->id]).'">Image Gallery</a>
                  <a class="dropdown-item" href="'.route('admin.listing-video-gallery.index', ['id' => $query->id]).'">Video Gallery</a>
                  <a class="dropdown-item" href="'.route('admin.listing-schedule.index', $query->id).'">Sehedule</a>

                </div>
              </div>';

                return $edit.$delete.$more;
            })
            ->addColumn('category', function($query){
                return $query->category->name;
            })
            ->addColumn('location', function($query){
                return $query->location->name;
            })
            ->addColumn('status', function($query){
                $status = filter_var($query->status, FILTER_VALIDATE_BOOLEAN);
                if($status){
                    return "<span class='badge badge-primary'>Active</span>";
                }else{
                    return "<span class='badge badge-danger'>Inactive</span>";
                }
            })
            ->addColumn('is_featured', function($query){
                $featured = filter_var($query->is_featured, FILTER_VALIDATE_BOOLEAN);
                if($featured){
                    return "<span class='badge badge-primary'>Yes</span>";
                }else{
                    return "<span class='badge badge-danger'>No</span>";
                }
            })
            ->addColumn('is_verified', function($query){
                $verified = filter_var($query->is_verified, FILTER_VALIDATE_BOOLEAN);
                if($verified){
                    return "<span class='badge badge-primary'>Yes</span>";
                }else{
                    return "<span class='badge badge-danger'>No</span>";
                }
            })
            ->addColumn('image', function($query){
                return '<img width="60" src="'.asset($query->image).'" >';
            })
            ->addColumn('by', function($query){
                return $query->user?->name;
            })
            ->rawColumns(['status', 'action', 'is_featured', 'is_verified', 'image'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Listing $model): QueryBuilder
    {
        return $model->newQuery()->orderBy('created_at', 'desc');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('listing-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
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

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('SN')->orderable(false)->searchable(false),
            Column::make('image'),
            Column::make('title'),
            Column::make('category')->title('Country'),
            Column::make('location')->title('Company'),
            Column::make('status'),
            Column::make('is_featured')->width(80),
            Column::make('is_verified')->width(80),
            Column::make('by'),
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(200)
            ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Listing_' . date('YmdHis');
    }
}
