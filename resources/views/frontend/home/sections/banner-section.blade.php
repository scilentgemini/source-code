<style>
    #wsus__banner {
        height: 100vh;
        /* Full viewport height */
        position: relative;
    }

    #banner-slider {
        position: relative;
        z-index: 1;
        height: 100%;
        /* Default height */
        overflow: hidden;
        /* Ensure no content overflows */
    }

    .wsus__banner_overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 2;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(0, 0, 0, 0.5);
        /* Optional overlay */
    }

    #banner-slider .item {
        width: 100%;
        height: 100vh;
    }

    #banner-slider .item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>

<section id="wsus__banner">
    <div class="wsus__banner_overlay">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-6 col-lg-7">
                    <div class="wsus__banner_text">
                        <h1>{!! @$hero->title !!}</h1>
                        <p>{!! @$hero->sub_title !!}</p>
                    </div>
                </div>

                <div class="col-xl-5 col-lg-5">
                    <form action="{{ route('listings') }}" method="GET">
                        <h3>Find the Perfect Job!</h3>
                        <div class="wsus__search_area">
                            <input type="text" placeholder="What job are you looking for?" name="search">
                        </div>
                        <div class="wsus__search_area">
                            <select class="select_2" name="category">
                                <option value="">Countries</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->slug }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="wsus__search_area">
                            <select class="select_2" name="location">
                                <option value="">Location</option>
                                @foreach ($locations as $location)
                                    <option value="{{ $location->slug }}">{{ $location->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="wsus__search_area m-0">
                            <button type="submit" class="read_btn">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="banner-slider" class="owl-carousel">
        @foreach ($heroImages as $image)
            <div class="item">
                <img src="{{ asset($image->url) }}" alt="Banner Image">
            </div>
        @endforeach
    </div>
</section>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
    var $j = jQuery.noConflict();
    $j(document).ready(function() {
        $j('#banner-slider').owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            autoplayTimeout: 5000,
            dots: true,
        });
    });
</script>
