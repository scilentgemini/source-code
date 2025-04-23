<section id="wsus__counter" style="background: url({{ asset(@$counter->background) }})">
    <div class="wsus__counter_overlay">
        <div class="container">
            <div class="row">

                {{--
                <div class="col-xl-3 col-6 col-md-3">
                    <div class="wsus__counter_single">
                        <span class="counter">{{ @$counter->counter_one }}</span>
                        <p>{{ @$counter->counter_title_one }}</p>
                    </div>
                </div>
                <div class="col-xl-3 col-6 col-md-3">
                    <div class="wsus__counter_single">
                        <span class="counter">{{ @$counter->counter_two }}</span>
                        <p>{{ @$counter->counter_title_two }}</p>
                    </div>
                </div>
                <div class="col-xl-3 col-6 col-md-3">
                    <div class="wsus__counter_single">
                        <span class="counter">{{ @$counter->counter_three }}</span>
                        <p>{{ @$counter->counter_title_three }}</p>
                    </div>
                </div>
                <div class="col-xl-3 col-6 col-md-3">
                    <div class="wsus__counter_single">
                        <span class="counter">{{ @$counter->counter_four }}</span>
                        <p>{{ @$counter->counter_title_four }}</p>
                    </div>
                </div>
                --}}

                <!-- NEW “Message from Director” SECTION -->
                <div class="col-lg-6">
                    <img src="{{ asset('uploads/hari-dhami.jpg') }}"
                         alt="Director Photo"
                         class="img-fluid rounded shadow-sm w-75">
                </div>
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h2 class="mb-3 text-white">Message from Director</h2>
                    <blockquote class="blockquote pl-3 border-left border-white">
                        <p class="fst-italic text-white fs-5" style="font-family: 'Nunito', sans-serif;">
                            “As the Director of Royal Jobs HR, I am committed to driving our mission of connecting skilled, semi-skilled, and unskilled workforce with global opportunities. With years of experience in the recruitment industry, I believe in fostering strong partnerships with employers and ensuring ethical, efficient, and high-quality manpower solutions.”
                        </p>
                        <p class="blockquote-footer text-white-50 mt-3">
                            Mr. Hari Dhami | Director
                        </p>
                    </blockquote>
                </div>

            </div>
        </div>
    </div>
</section>
