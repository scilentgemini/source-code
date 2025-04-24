@extends('frontend.layouts.master')

@section('contents')
<section class="section" style="padding: 60px 0;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center mb-5">
                    <h2 class="fw-bold">Interview Notices</h2>
                    <p class="text-muted">Stay updated with our latest interview announcements</p>
                </div>
            </div>
        </div>
        <div class="row">
            @forelse($notices as $notice)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        @if($notice->image)
                            <a href="{{ asset($notice->image) }}" class="venobox" data-gall="notices">
                                <img src="{{ asset($notice->image) }}"
                                     class="card-img-top"
                                     alt="{{ $notice->title }}"
                                     style="height: 250px; object-fit: cover;">
                            </a>
                        @else
                            <div class="no-image bg-light d-flex align-items-center justify-content-center" style="height: 250px;">
                                <i class="fas fa-image text-muted fa-3x"></i>
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title fw-bold mb-3">{{ $notice->title }}</h5>
                            <p class="card-text text-muted mb-0">
                                <small>
                                    <i class="fas fa-calendar-alt me-2"></i>
                                    {{ $notice->created_at->format('M d, Y') }}
                                </small>
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        <i class="fas fa-info-circle me-2"></i>
                        No interview notices available at the moment.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        // Initialize VenoBox for image popups
        new VenoBox({
            selector: '.venobox',
            numeration: true,
            infinigall: true,
            share: false,
            spinner: 'rotating-plane',
            maxWidth: '60%',      // Maximum width relative to viewport
            fit: true,           // Fit image in viewport
            border: '0',         // Remove border
            bgcolor: 'rgba(0,0,0,0.85)', // Darker background for better contrast
            titlePosition: 'bottom',
            autoplay: false,
            overlayClose: true,  // Close on overlay click
            ratio: '16x9',      // Force aspect ratio
            preload: true,      // Preload images
            navigation: true    // Show navigation arrows
        });
    });
</script>
@endpush

@push('styles')
<style>
    .card {
        transition: transform 0.2s ease-in-out;
        border: none;
        border-radius: 10px;
        overflow: hidden;
    }
    .card:hover {
        transform: translateY(-5px);
    }
    .card-img-top {
        transition: transform 0.3s ease-in-out;
    }
    .card:hover .card-img-top {
        transform: scale(1.05);
    }
    .section-title h2 {
        position: relative;
        display: inline-block;
        margin-bottom: 20px;
    }
    .section-title h2:after {
        content: '';
        position: absolute;
        left: 50%;
        bottom: -10px;
        transform: translateX(-50%);
        width: 50px;
        height: 3px;
        background-color: var(--colorPrimary);
    }

    /* Custom styles for VenoBox */
    .vbox-content {
        max-height: 90vh !important;  /* Maximum height relative to viewport */
        margin: 20px auto !important; /* Center vertically with margin */
    }
    .vbox-container img {
        object-fit: contain !important;
        max-height: 85vh !important;  /* Slightly less than container to account for title */
        width: auto !important;
        margin: auto !important;
    }
    .vbox-title {
        font-size: 16px !important;
        padding: 10px 40px !important;
    }
    /* Improve navigation buttons visibility */
    .vbox-next, .vbox-prev {
        background: rgba(0,0,0,0.3) !important;
        padding: 20px !important;
        border-radius: 5px !important;
        transition: background 0.3s ease !important;
    }
    .vbox-next:hover, .vbox-prev:hover {
        background: rgba(0,0,0,0.6) !important;
    }
</style>
@endpush
