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

                        {{-- <div class="img_2">
                            <img src="{{ asset($about?->image) }}" alt="about" class="img-fluid w-100">
                        </div> --}}
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
        <div class="wsus__services_overlay">
            <div class="container">
                <!-- Services Section -->
                <div class="row">
                    <div class="col-xl-5 m-auto">
                        <div class="wsus__heading_area">
                            <h2>Our Services</h2>
                            <p>What We Offer</p>
                        </div>
                    </div>
                </div>
                <div class="row">
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
                <div class="row mt-5">
                    <div class="col-xl-5 m-auto">
                        <div class="wsus__heading_area">
                            <h2>Legal Documents</h2>
                            <p>Our Certifications</p>
                        </div>
                    </div>
                </div>
                <div class="row">
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
    /* Section Styles */
    .wsus__services_overlay {
        padding: 100px 0;
        background: #fff;
    }

    /* Heading Styles */
    .wsus__heading_area {
        text-align: center;
        margin-bottom: 50px;
    }

    .wsus__heading_area h2 {
        font-size: 40px;
        font-weight: 600;
        color: var(--colorBlack);
        margin-bottom: 15px;
        text-transform: capitalize;
    }

    .wsus__heading_area p {
        font-size: 16px;
        color: var(--colorText);
        text-transform: capitalize;
        margin: 0;
    }

    /* Section Title Styles */
    .section-title {
        text-align: center;
        margin-bottom: 45px;
    }

    .section-title h2 {
        font-size: 24px;
        font-weight: 600;
        color: var(--colorBlack);
        margin-bottom: 10px;
        letter-spacing: 0.5px;
    }

    .section-title .subtitle {
        font-size: 14px;
        color: #666;
        display: block;
        text-transform: capitalize;
        margin-top: 5px;
    }

    /* Services Styles */
    .wsus__single_service {
        background: #fff;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 25px rgba(0,0,0,0.1);
        transition: all 0.4s ease;
        margin-bottom: 30px;
    }

    .wsus__single_service:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 35px rgba(32,70,218,0.15);
    }

    .wsus__single_service_img {
        height: 250px;
        overflow: hidden;
        position: relative;
    }

    .wsus__single_service_img img {
        height: 100%;
        width: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .wsus__single_service:hover .wsus__single_service_img img {
        transform: scale(1.1);
    }

    .wsus__single_service_text {
        padding: 25px;
    }

    .wsus__single_service_text h4 {
        font-size: 22px;
        font-weight: 600;
        color: #2046DA;
        margin-bottom: 15px;
        transition: color 0.3s ease;
    }

    .wsus__single_service:hover .wsus__single_service_text h4 {
        color: #1a3bb3;
    }

    .wsus__single_service_text p {
        margin-bottom: 20px;
        color: #555;
        line-height: 1.6;
    }

    .read_more {
        color: #2046DA;
        text-decoration: none;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
        font-size: 15px;
    }

    .read_more:hover {
        color: #1a3bb3;
        gap: 12px;
    }

    /* Legal Documents Styles */
    .wsus__single_legal {
        background: #fff;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 25px rgba(0,0,0,0.1);
        transition: all 0.4s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .wsus__single_legal:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 35px rgba(32,70,218,0.15);
    }

    .wsus__single_legal_img {
        height: 300px;
        overflow: hidden;
        background: #f8f9fa;
    }

    .wsus__single_legal_img img {
        height: 100%;
        width: 100%;
        object-fit: contain;
        transition: transform 0.5s ease;
    }

    .wsus__single_legal:hover .wsus__single_legal_img img {
        transform: scale(1.05);
    }

    .wsus__single_legal_text {
        padding: 25px;
        text-align: center;
        background: #fff;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .wsus__single_legal_text h4 {
        font-size: 20px;
        font-weight: 600;
        color: #2046DA;
        margin-bottom: 12px;
        transition: color 0.3s ease;
    }

    .wsus__single_legal:hover .wsus__single_legal_text h4 {
        color: #1a3bb3;
    }

    .wsus__single_legal_text p {
        font-size: 15px;
        color: #555;
        margin: 0;
        line-height: 1.6;
    }

    /* PDF Preview Styles */
    .pdf-preview {
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background-color: #f8f9fa;
        padding: 30px;
        transition: all 0.4s ease;
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
        font-size: 72px;
        color: #dc3545;
        margin-bottom: 20px;
        transition: transform 0.4s ease;
    }

    .pdf-link:hover .pdf-preview i {
        transform: scale(1.15) rotate(-5deg);
    }

    .pdf-preview span {
        color: #2046DA;
        font-weight: 600;
        font-size: 17px;
        transition: all 0.3s ease;
        padding: 10px 25px;
        border: 2px solid #2046DA;
        border-radius: 25px;
    }

    .pdf-link:hover .pdf-preview span {
        background: #2046DA;
        color: #fff;
    }

    /* Modal Styles */
    .modal-content {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(0,0,0,0.2);
    }

    .modal-header {
        background: #2046DA;
        color: #fff;
        padding: 20px 30px;
    }

    .modal-header .modal-title {
        font-size: 24px;
        font-weight: 600;
    }

    .modal-body {
        padding: 30px;
    }

    .modal-header .btn-close {
        filter: brightness(0) invert(1);
        opacity: 0.8;
        transition: opacity 0.3s ease;
    }

    .modal-header .btn-close:hover {
        opacity: 1;
    }

    .service-description {
        color: #444;
        line-height: 1.8;
    }

    .service-description img {
        max-width: 100%;
        height: auto;
        margin: 20px 0;
        border-radius: 10px;
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
