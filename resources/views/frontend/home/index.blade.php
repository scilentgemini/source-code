@extends('frontend.layouts.master')

@section('contents')
    <!--==========================
            BANNER PART START
    ===========================-->

    @include('frontend.home.sections.banner-section')
    <!--==========================
            BANNER PART END
    ===========================-->


    <!--==========================
            CATEGORY SLIDER START
    ===========================-->
    @include('frontend.home.sections.category-slider-section')
    <!--==========================
            CATEGORY SLIDER END
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
            Featured CATEGORY START
    ===========================-->
    @include('frontend.home.sections.featured-category-section')
    <!--==========================
            Featured CATEGORY END
    ===========================-->


    <!--==========================
            Featured LOCATION START
    ===========================-->
    @include('frontend.home.sections.featured-location-section')

    <!--==========================
            Featured LOCATION END
    ===========================-->


    <!--==========================
            FEATURED LISTING START
    ===========================-->
    @include('frontend.home.sections.featured-listing-section')
    <!--==========================
            FEATURED LISTING END
    ===========================-->

    <!--==========================
            YOUTUBE VIDEOS START
    ===========================-->
    @include('frontend.home.sections.youtube-videos-section')
    <!--==========================
            YOUTUBE VIDEOS END
    ===========================-->

    <!--==========================
            OUR PACKAGE START
    ===========================-->
    {{-- @include('frontend.home.sections.featured-package-section') --}}
    <!--==========================
            OUR PACKAGE END
    ===========================-->


    <!--============================
            TESTIMONIAL PART START
    ==============================-->
    {{-- @include('frontend.home.sections.testimonial-section') --}}
    <!--============================
            TESTIMONIAL PART END
    ==============================-->


    <!--==========================
            BLOG PART START
    ===========================-->
    @include('frontend.home.sections.blog-section')
    <!--==========================
            BLOG PART END
    ===========================-->
@endsection

@push('scripts')
@if ($featuredListings->isNotEmpty())
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const featuredListing = @json($featuredListings->first());
        const imageUrl = featuredListing.gallery?.length > 0
            ? `{{ asset('uploads/') }}/${featuredListing.gallery[0].image}`
            : `{{ asset('') }}/${featuredListing.image}`;

        const popupHtml = `
            <div id="featured-popup" style="
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                background: white;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 4px 12px rgba(0,0,0,0.15);
                z-index: 1000;
                max-width: 800px;
                width: 90%;
                display: flex;
                gap: 20px;
                flex-wrap: wrap;
            ">
                <span onclick="document.getElementById('featured-popup').remove()" style="
                    position: absolute;
                    top: 10px;
                    right: 15px;
                    font-size: 24px;
                    font-weight: bold;
                    color: #555;
                    cursor: pointer;
                ">&times;</span>

                <div style="flex: 1 1 300px; text-align: center;">
                    <img src="${imageUrl}" alt="Featured Listing" style="
                        max-width: 100%;
                        height: auto;
                        border-radius: 10px;
                        object-fit: contain;
                    ">
                </div>
                <div style="flex: 1 1 400px;">
                    <h3 style="margin-top: 0;">${featuredListing.title}</h3>
                    <p><strong>Salary:</strong> ${featuredListing.website || 'N/A'}</p>
                    <p><strong>Country:</strong> ${featuredListing.category?.name || 'N/A'}</p>
                    <p><strong>Company:</strong> ${featuredListing.location?.name || 'N/A'}</p>
                    <div style="margin-top: 10px;">
                        <strong>Description:</strong>
                        <div style="
                            max-height: 200px;
                            overflow-y: auto;
                            margin-top: 5px;
                            border: 1px solid #eee;
                            padding: 10px;
                            border-radius: 5px;
                        ">
                            ${featuredListing.description ?? 'No description available.'}
                        </div>
                    </div>
                </div>
            </div>
        `;

        document.body.insertAdjacentHTML('beforeend', popupHtml);
    });
</script>
@endif
@endpush
