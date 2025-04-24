@extends('admin.layouts.master')

@section('contents')
<section class="section">
    <div class="section-header">
        <h1>Edit Service or Legal Document</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.company-services.index') }}">Company Services</a></div>
            <div class="breadcrumb-item">Edit</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Service or Document</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.company-services.update', $companyService->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="title" value="{{ old('title', $companyService->title) }}" required>
                                @error('title')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Type <span class="text-danger">*</span></label>
                                <select class="form-control" name="type" required>
                                    <option value="service" {{ old('type', $companyService->type) == 'service' ? 'selected' : '' }}>Service</option>
                                    <option value="legal" {{ old('type', $companyService->type) == 'legal' ? 'selected' : '' }}>Legal Document</option>
                                </select>
                                @error('type')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Description <span class="text-danger">*</span></label>
                                <textarea class="summernote" name="description">{{ old('description', $companyService->description) }}</textarea>
                                @error('description')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Image</label>
                                @if($companyService->image)
                                    <br>
                                    <img src="{{ asset($companyService->image) }}" alt="" width="200" class="mb-2">
                                @endif
                                <input type="file" class="form-control" name="image">
                                @error('image')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Sort Order <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="sort_order" value="{{ old('sort_order', $companyService->sort_order) }}" required>
                                @error('sort_order')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Status <span class="text-danger">*</span></label>
                                <select class="form-control" name="status" required>
                                    <option value="1" {{ old('status', $companyService->status) ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status', $companyService->status) ? '' : 'selected' }}>Inactive</option>
                                </select>
                                @error('status')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    });
</script>
@endpush
