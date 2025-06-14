@php
    $footerInfo = \App\Models\FooterInfo::first();
    $socialLinks = \App\Models\SocialLink::where('status', 1)->get();
@endphp

<footer>
    <div class="container">
        <div class="row text-white">
            <!-- Expanded About Us Section -->
            <div class="col-xl-5 col-sm-12 col-md-12 col-lg-12">
                <div class="footer_text">
                    <h3>About Us</h3>
                    <p>{!! $footerInfo?->short_description !!}</p>
                    <ul class="footer_icon">
                        @foreach ($socialLinks as $link)
                            <li><a href="{{ $link->url }}"><i class="{{ $link->icon }}"></i></a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Helpful Links Section -->
            <div class="col-xl-2 col-sm-6 col-md-3 col-lg-3">
                <div class="footer_text">
                    <h3>Helpful Links</h3>
                    <ul class="footer_link">
                        @foreach (Menu::getByName('Footer Menu Two') as $footerMenuOne)
                            <li><a href="{{ $footerMenuOne['link'] }}"><i class="far fa-chevron-double-right"></i>
                                    {{ $footerMenuOne['label'] }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Information Section -->
            <div class="col-xl-2 col-sm-6 col-md-3 col-lg-3">
                <div class="footer_text">
                    <h3>Information</h3>
                    <ul class="footer_link">
                        @foreach (Menu::getByName('Footer Menu Three') as $footerMenuOne)
                            <li><a href="{{ $footerMenuOne['link'] }}"><i class="far fa-chevron-double-right"></i>
                                    {{ $footerMenuOne['label'] }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Contact Information Section -->
            <div class="col-xl-3 col-sm-6 col-md-6 col-lg-6">
                <div class="footer_text footer_contact">
                    <h3>Information</h3>
                    <ul class="footer_link">
                        <li style="display: flex; align-items: center;">
                            <i class="far fa-map-marker-alt" style="width: 20px; margin-right: 4px;"></i>
                            <p style="margin: 0;">{{ $footerInfo?->address }}</p>
                        </li>
                        <li style="display: flex; align-items: center;">
                            <i class="fal fa-envelope" style="width: 20px; margin-right: 4px;"></i>
                            <a href="mailto:{{ $footerInfo?->email }}">{{ $footerInfo?->email }}</a>
                        </li>
                        <li style="display: flex; align-items: center;">
                            <i class="fal fa-phone-alt" style="width: 20px; margin-right: 4px;"></i>
                            <a href="callto:{{ $footerInfo?->phone }}">{{ $footerInfo?->phone }}</a>
                        </li>
                        <li style="display: flex; align-items: center;">
                            <i class="fal fa-phone-alt" style="width: 20px; margin-right: 4px;"></i>
                            <a href="callto:+971558747819">+971 558 747 819</a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
    <div class="footer_bottom">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-md-5 text-center text-md-start">
                    <p>{{ $footerInfo?->copyright }}</p>
                </div>
                <div class="col-xl-6 col-md-7 text-center text-md-end">
                    <p>Crafted with <i class="fas fa-heart" style="color: #8d029b;"></i> by <a
                            href="https://mauveinetech.com" target="_blank" style="color: #2196F3;">Mauveine Tech</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
