@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.youtube-videos.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Add YouTube Video</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.youtube-videos.index') }}">YouTube Videos</a></div>
                <div class="breadcrumb-item">Add New</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Video Information</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.youtube-videos.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}" required>
                                </div>

                                <div class="form-group">
                                    <label>YouTube Video URL</label>
                                    <input type="url" class="form-control" name="video_url" value="{{ old('video_url') }}" required>
                                    <small class="text-muted">Enter the full YouTube video URL (e.g., https://www.youtube.com/watch?v=XXXXXXXXXXX)</small>
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" rows="4">{{ old('description') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Sort Order</label>
                                    <input type="number" class="form-control" name="sort_order" value="{{ old('sort_order', 0) }}" required>
                                </div>

                                <div class="form-group">
                                    <label class="custom-switch mt-2">
                                        <input type="checkbox" name="status" class="custom-switch-input" value="1" checked>
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description">Active</span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
