@extends('frontend.layouts.master')

@section('contents')
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Interview Notices</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @forelse($notices as $notice)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100">
                        @if($notice->image)
                            <img src="{{ asset($notice->image) }}" class="card-img-top" alt="{{ $notice->title }}" style="height: 200px; object-fit: cover;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $notice->title }}</h5>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info">
                        No interview notices available at the moment.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
