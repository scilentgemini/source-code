<style>
    .navbar.main_menu .container {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .navbar-brand img {
        max-height: 60px;
        width: auto;
    }

    #wsus__topbar {
        background: #1a4789;
        padding: 4px 0;
    }

    #wsus__topbar .container {
        max-width: 1320px;
        margin: 0 auto;
        padding: 0 15px;
    }

    .wsus__topbar_left {
        display: flex;
        align-items: center;
        height: 100%;
    }

    .wsus__topbar_left li a {
        color: #ffffff;
        text-decoration: none;
        font-size: 14px;
        display: flex;
        align-items: center;
        padding-left: 0;
    }

    .wsus__topbar_left li a i {
        margin-right: 6px;
    }

    .wsus__topbar_right {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        height: 100%;
    }

    .wsus__topbar_right span {
        color: #ffffff;
        font-size: 14px;
        margin-left: 20px;
        display: flex;
        align-items: center;
        background-color: none;
    }

    .wsus__topbar_right span:first-child {
        margin-left: 0;
    }

    .wsus__topbar_right span i {
        margin-right: 5px;
        font-size: 14px;
    }

    #wsus__topbar .row {
        align-items: center;
        min-height: 30px;
    }
</style>

<!--==========================
        TOPBAR PART START
    ===========================-->
<section id="wsus__topbar">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-md-7 d-none d-md-block">
                <ul class="wsus__topbar_left">
                    <li><a href="mailto:{{ config('settings.site_email') }}"><i class="fal fa-envelope"></i>{{ config('settings.site_email') }}</a></li>
                </ul>
            </div>
            <div class="col-xl-6 col-md-5">
                <div class="wsus__topbar_right">
                    <span><i class="fal fa-phone-alt"></i>+971 50 693 9322</span>
                    <span><i class="fal fa-phone-alt"></i>+971 558 747 819</span>
                </div>
            </div>
        </div>
    </div>
</section>
<!--==========================
        TOPBAR PART END
    ===========================-->


<!--==========================
        MENU PART START
    ===========================-->
<nav class="navbar navbar-expand-lg main_menu">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ config('settings.logo') }}" alt="DB.Card">
          </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="far fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto">
                @foreach (Menu::getByName('Main Menu') as $menu)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ $menu['link'] }}">
                            {{ $menu['label'] }}

                            @if ($menu['child'])
                                <i class="far fa-chevron-down"></i>
                            @endif
                        </a>
                        @if ($menu['child'])
                            <ul class="menu_droapdown">
                                @foreach ($menu['child'] as $child)
                                    <li><a href="{{ $child['link'] }}">{{ $child['label'] }}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach


            </ul>
            @auth
                <a class="user_btn" href="{{ route('admin.dashboard.index') }}"><i class="fas fa-user"></i> Dashboard</a>
            @endauth
            @guest
                <a class="user_btn" href="{{ route('login') }}"><i class="fas fa-user"></i> Login</a>
            @endguest
            {{-- <a class="user_btn" href="{{ route('user.listing.create') }}"><i class="far fa-plus"></i> add listing</a> --}}
        </div>
    </div>
</nav>
<!--==========================
        MENU PART END
    ===========================-->
