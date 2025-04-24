@extends('frontend.layouts.master')

@section('contents')

    <!--==========================
        BREADCRUMB PART START
    ===========================-->
    <div id="breadcrumb_part">
        <div class="bread_overlay">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 text-center text-white">
                        <h4>About</h4>
                        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"> Home </a></li>
                                <li class="breadcrumb-item active" aria-current="page"> About </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==========================
        BREADCRUMB PART END
    ===========================-->

    <!--==========================
        ABOUT  START
    ===========================-->
    <section id="about_page">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-6 col-lg-6">
                    <div class="about_text">
                        {!! $about?->description !!}

                        {{-- <a href="{{ $about?->button_url }}">learn more</a> --}}
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6">
                    <div class="about_img">
                        {{-- <img style="width: 442px !important;
                        height: 500px !important;" src="{{ getYtThumbnail($about?->video_url) }}" alt="about" class="img-fluid w-100">
                        <a class="venobox" data-autoplay="true" data-vbtype="video" href="{{ $about?->video_url }}">
                            <i class=" fas fa-play"></i>
                        </a> --}}
                        <img style="width: 442px !important;
                        height: 500px !important;" src="{{ asset($about?->image) }}" alt="about" class="img-fluid w-100">

                        <div class="img_2">
                            <img src="{{ asset($about?->image) }}" alt="about" class="img-fluid w-100">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==========================
        ABOUT END
    ===========================-->

    <!--==========================
        FEATURES PART START
    ===========================-->
    @include('frontend.home.sections.features-section')
    <!--==========================
        FEATURES PART END
    ===========================-->

    <!--==========================
        COUNTER PART START
    ===========================-->
    @include('frontend.home.sections.counter-section')
    <!--==========================
        COUNTER PART END
    ===========================-->

    <!--==========================
        SERVICES & LEGAL DOCUMENTS START
    ===========================-->
    <section id="services_legal" class="section">
        <div class="container">
            <!-- Services Section -->
            <div class="row mb-5">
                <div class="col-12">
                    <div class="wsus_section_heading mb-4">
                        <h2>Our Services</h2>
                        <span>What We Offer</span>
                    </div>
                </div>
                @php
                    $services = \App\Models\CompanyService::where('type', 'service')
                        ->where('status', 1)
                        ->orderBy('sort_order', 'asc')
                        ->get();
                @endphp
                @foreach($services as $service)
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="wsus__single_service">
                            @if($service->image)
                                <div class="wsus__single_service_img">
                                    <img src="{{ asset($service->image) }}" alt="{{ $service->title }}" class="img-fluid w-100">
                                </div>
                            @endif
                            <div class="wsus__single_service_text">
                                <h4>{{ $service->title }}</h4>
                                <p>{!! Str::limit(strip_tags($service->description), 150) !!}</p>
                                <a href="javascript:;" class="read_more" data-bs-toggle="modal" data-bs-target="#serviceModal{{ $service->id }}">
                                    Read More <i class="fas fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Service Modal -->
                    <div class="modal fade" id="serviceModal{{ $service->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">{{ $service->title }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    @if($service->image)
                                        <img src="{{ asset($service->image) }}" alt="{{ $service->title }}" class="img-fluid mb-4 w-100">
                                    @endif
                                    <div class="service-description">
                                        {!! $service->description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Legal Documents Section -->
            <div class="row">
                <div class="col-12">
                    <div class="wsus_section_heading mb-4">
                        <h2>Legal Documents</h2>
                        <span>Our Certifications</span>
                    </div>
                </div>
                @php
                    $documents = \App\Models\CompanyService::where('type', 'legal')
                        ->where('status', 1)
                        ->orderBy('sort_order', 'asc')
                        ->get();
                @endphp
                @foreach($documents as $document)
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="wsus__single_legal">
                            @if($document->image)
                                <div class="wsus__single_legal_img">
                                    @php
                                        $extension = pathinfo($document->image, PATHINFO_EXTENSION);
                                    @endphp
                                    @if($extension === 'pdf')
                                        <a href="{{ asset($document->image) }}" target="_blank" class="pdf-link">
                                            <div class="pdf-preview">
                                                <i class="fas fa-file-pdf"></i>
                                                <span>Open PDF</span>
                                            </div>
                                        </a>
                                    @else
                                        <a href="{{ asset($document->image) }}" class="venobox" data-gall="legal-docs">
                                            <img src="{{ asset($document->image) }}" alt="{{ $document->title }}" class="img-fluid w-100">
                                        </a>
                                    @endif
                                </div>
                            @endif
                            <div class="wsus__single_legal_text">
                                <h4>{{ $document->title }}</h4>
                                <p>{!! Str::limit(strip_tags($document->description), 100) !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--==========================
        SERVICES & LEGAL DOCUMENTS END
    ===========================-->

    <!--==========================
            Featured CATEGORY START
    ===========================-->
    @include('frontend.home.sections.featured-category-section')
    <!--==========================
            Featured CATEGORY END
    ===========================-->
@endsection

@push('styles')
<style>
    /* Services Styles */
    .wsus__single_service {
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }
    .wsus__single_service:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 20px rgba(0,0,0,0.15);
    }
    .wsus__single_service_img {
        height: 250px;
        overflow: hidden;
    }
    .wsus__single_service_img img {
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }
    .wsus__single_service:hover .wsus__single_service_img img {
        transform: scale(1.1);
    }
    .wsus__single_service_text {
        padding: 20px;
    }
    .wsus__single_service_text h4 {
        font-size: 20px;
        margin-bottom: 15px;
        color: var(--colorPrimary);
    }
    .wsus__single_service_text p {
        margin-bottom: 15px;
        color: #666;
    }
    .read_more {
        color: var(--colorPrimary);
        text-decoration: none;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }
    .read_more:hover {
        color: var(--colorPrimary);
        opacity: 0.8;
    }

    /* Legal Documents Styles */
    .wsus__single_legal {
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }
    .wsus__single_legal:hover {
        transform: translateY(-5px);
    }
    .wsus__single_legal_img {
        height: 300px;
        overflow: hidden;
    }
    .wsus__single_legal_img img {
        height: 100%;
        object-fit: contain;
        transition: transform 0.3s ease;
    }
    .wsus__single_legal:hover .wsus__single_legal_img img {
        transform: scale(1.05);
    }
    .wsus__single_legal_text {
        padding: 20px;
        text-align: center;
    }
    .wsus__single_legal_text h4 {
        font-size: 18px;
        margin-bottom: 10px;
        color: var(--colorPrimary);
    }
    .wsus__single_legal_text p {
        font-size: 14px;
        color: #666;
        margin: 0;
    }

    /* Modal Styles */
    .modal-content {
        border: none;
        border-radius: 10px;
    }
    .modal-header {
        background: var(--colorPrimary);
        color: #fff;
        border-radius: 10px 10px 0 0;
    }
    .modal-header .btn-close {
        filter: brightness(0) invert(1);
    }
    .service-description {
        color: #444;
        line-height: 1.6;
    }
    .service-description img {
        max-width: 100%;
        height: auto;
        margin: 15px 0;
    }

    /* PDF Preview Styles */
    .pdf-preview {
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background-color: #f8f9fa;
        padding: 20px;
        transition: all 0.3s ease;
    }

    .pdf-link {
        display: block;
        height: 100%;
        text-decoration: none;
    }

    .pdf-link:hover .pdf-preview {
        background-color: #e9ecef;
    }

    .pdf-preview i {
        font-size: 64px;
        color: #dc3545;
        margin-bottom: 15px;
        transition: transform 0.3s ease;
    }

    .pdf-link:hover .pdf-preview i {
        transform: scale(1.1);
    }

    .pdf-preview span {
        color: #333;
        font-weight: 500;
        font-size: 16px;
    }
</style>
@endpush

@push('scripts')
<script>
    $(document).ready(function() {
        // Initialize VenoBox for images only
        new VenoBox({
            selector: '.venobox',
            numeration: true,
            infinigall: true,
            share: false,
            spinner: 'rotating-plane',
            maxWidth: '60%',
            fit: true
        });
    });
</script>
@endpush
