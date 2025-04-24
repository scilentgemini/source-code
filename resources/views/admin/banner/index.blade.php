{{-- filepath: resources/views/admin/banner/index.blade.php --}}
@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.dashboard.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Manage Banner Images</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Banner Images</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Upload New Banner Images</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.banner.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="images">Select Images <span class="text-danger">*</span></label>
                                    <input type="file" name="images[]" id="images" class="form-control" multiple>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4>Uploaded Banner Images</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach ($heroImages as $image)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <img src="{{ asset($image->url) }}" alt="Banner Image" width="100">
                                        <form action="{{ route('admin.banner.destroy', $image->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection