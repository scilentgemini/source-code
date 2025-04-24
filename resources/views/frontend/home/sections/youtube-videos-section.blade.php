@php
    $videos = \App\Models\YoutubeVideo::where('status', 1)->orderBy('sort_order', 'asc')->get();
@endphp

@if($videos->isNotEmpty())
<section id="youtube-videos" class="wsus__blog mt_90 xs_mt_60">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 m-auto">
                <div class="wsus__heading_area">
                    <h2>Featured Videos</h2>
                    <p>Watch our latest videos</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row video_slider">
            @foreach($videos as $video)
                <div class="col-xl-4 col-md-6">
                    <div class="wsus__single_blog">
                        <div class="wsus__blog_img youtube-video-container">
                            @php
                                $videoId = '';
                                if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $video->video_url, $match)) {
                                    $videoId = $match[1];
                                }
                            @endphp
                            <iframe
                                width="100%"
                                height="250"
                                src="https://www.youtube.com/embed/{{ $videoId }}"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen>
                            </iframe>
                        </div>
                        <div class="wsus__blog_text">
                            <h4>{{ $video->title }}</h4>
                            @if($video->description)
                                <p>{{ Str::limit($video->description, 100) }}</p>
                            @endif
                            <a class="read_btn" href="{{ $video->video_url }}" target="_blank">Watch on YouTube <i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<style>
.youtube-video-container {
    position: relative;
    padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
    height: 0;
    overflow: hidden;
}

.youtube-video-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border-radius: 5px;
}
</style>

@push('scripts')
<script>
    $(document).ready(function() {
        $('.video_slider').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 600,
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
