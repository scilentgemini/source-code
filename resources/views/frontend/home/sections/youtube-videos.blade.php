@if($youtubeVideos->count() > 0)
<section id="listing_grid" class="youtube-videos-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="wsus__section_heading text-center mb_45">
                    <h2>Featured Videos</h2>
                    <span>Watch our latest video content</span>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($youtubeVideos as $video)
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="wsus__featured_single listing_det_video">
                        <div class="listing_det_video_img">
                            <img src="{{ getYtThumbnail($video->video_url) }}" alt="{{ $video->title }}" class="img-fluid w-100">
                            <a class="venobox" data-autoplay="true" data-vbtype="video" href="{{ $video->video_url }}">
                                <i class="fas fa-play"></i>
                            </a>
                        </div>
                        <div class="wsus__featured_single_text">
                            <h6>{{ $video->title }}</h6>
                            @if($video->description)
                                <p>{{ Str::limit($video->description, 100) }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @if($youtubeVideos->hasPages())
        <div class="row mt-4">
            <div class="col-12">
                <div id="pagination">
                    <div class="d-flex justify-content-center">
                        {{ $youtubeVideos->links() }}
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
@endif