@if($youtubeVideos->isNotEmpty())
<section id="wsus__youtube_videos" style="background-color: #f5f5f5;">
    <div class="wsus__location_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 m-auto">
                    <div class="wsus__heading_area">
                        <h2>Featured Videos</h2>
                        <p>Watch our latest videos</p>
                    </div>
                </div>
            </div>
            <div class="row video_slider">
                @foreach($youtubeVideos as $video)
                    <div class="col-xl-4 col-md-6">
                        <div class="listing_det_video">
                            <div class="listing_det_video_img">
                                @php
                                    $videoId = '';
                                    $thumbnailUrl = '';
                                    if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $video->video_url, $match)) {
                                        $videoId = $match[1];
                                        $thumbnailUrl = "https://img.youtube.com/vi/{$videoId}/maxresdefault.jpg";
                                    }
                                @endphp
                                <img src="{{ $thumbnailUrl }}" alt="{{ $video->title }}">
                                <a href="{{ $video->video_url }}" class="venobox" data-vbtype="video">
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
        </div>
    </div>
</section>

<style>
.video_slider .slick-slide {
    padding: 0 15px;
}

.video_slider .slick-list {
    margin: 0 -15px;
}

.video_slider .slick-dots {
    display: flex;
    justify-content: center;
    margin-top: 30px;
    padding: 0;
    list-style: none;
    gap: 8px;
}

.video_slider .slick-dots li {
    margin: 0;
}

.video_slider .slick-dots li button {
    font-size: 0;
    width: 25px;
    height: 4px;
    background: #ddd;
    border: none;
    border-radius: 2px;
    cursor: pointer;
    padding: 0;
    transition: all linear 0.3s;
}

.video_slider .slick-dots li.slick-active button {
    background: var(--colorPrimary);
    width: 35px;
}
</style>

@push('scripts')
<script>
    $(document).ready(function() {
        $('.video_slider').slick({
            dots: true,
            arrows: false,
            infinite: true,
            speed: 800,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    });
</script>
@endpush
@endif
