@extends('front.layouts.app')

@section('content')
    @if (Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong class="text-danger">Message: {{ Session::get('error') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif(Session::get('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong class="text-success">{{ Session::get('message') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <!-- preloader - start -->
    <div id="preloader" class="dia-preloader"></div>
    <div class="up">
        <a href="#" id="scrollup" class="dia-scrollup text-center"><i class="fas fa-angle-up"></i></a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Start of header section
                      ============================================= -->
    <header id="dia-header" class="dia-main-header">
        <div class="container">
            <div class="dia-main-header-content clearfix">
                <div class="dia-logo float-left">
                    <a href="#"><img width="200" src="{{ asset('front') }}/assets/img/slogo1.png" alt=""></a>
                </div>
                <div class="dia-main-menu-item float-right">
                    <nav class="dia-main-navigation  clearfix ul-li">
                        <ul id="main-nav" class="navbar-nav text-capitalize clearfix">
                            <li> <a href="{{ route('front.home') }}">Home</a></li>
                            <li> <a href="{{ route('front.quiz') }}">Quiz</a></li>

                            @auth
                                @if (!empty(Auth::user()->role) && Auth::user()->role == 'student')
                                    <li> <a href="{{ route('student.panel') }}">Student Panel</a></li>
                                @endif
                                <li> <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">Logout</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @else
                                <li> <a href="{{ route('student.registration') }}">Registration</a></li>
                                <li><a data-toggle="modal" data-target="#studentLoginForm" href="#">Login</a></li>
                            @endauth
                        </ul>
                    </nav>
                </div>

            </div>
        </div>

        <!-- /desktop menu -->
        <div class="dia-mobile_menu relative-position">
            <div class="dia-mobile_menu_button dia-open_mobile_menu">
                <i class="fas fa-bars"></i>
            </div>
            <div class="dia-mobile_menu_wrap">
                <div class="mobile_menu_overlay dia-open_mobile_menu"></div>
                <div class="dia-mobile_menu_content">
                    <div class="dia-mobile_menu_close dia-open_mobile_menu">
                        <i class="far fa-times-circle"></i>
                    </div>
                    <div class="m-brand-logo text-center">
                        <a href="%21.html#"><img width="300" src="{{ asset('front') }}/assets/img/d-agency/logo/logo2.png"
                                alt=""></a>
                    </div>
                    <nav class="dia-mobile-main-navigation  clearfix ul-li">
                        <ul id="m-main-nav" class="navbar-nav text-capitalize clearfix">
                            <li> <a href="{{ route('front.home') }}">Home</a></li>
                            <li> <a data-toggle="modal" data-target="#studentLoginForm"
                                    href="{{ route('front.home') }}">Login</a></li>
                            <li> <a href="{{ route('student.registration') }}">Registration</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /mobile-menu -->
        </div>
        </div>
    </header>
    @include('front.student-login-modal')
    <!-- End of header section
                      ============================================= -->


    <!-- Start of Banner section
                      ============================================= -->
    <section id="dia-banner" class="dia-banner-section position-relative">
        <div class="banner-side-img banner-img1 position-absolute"><img
                src="{{ asset('front') }}/assets/img/d-agency/banner/ns2.png" alt=""></div>
        <div class="banner-side-img banner-img2 position-absolute"><img src="{{ asset('front') }}/assets/img/new.png"
                alt=""></div>
        <div class="container">
            <div class="dia-banner-content dia-headline pera-content">
                <div class="mobileimage mobileimage-height" style="height: 150px; margin-top:-80px"></div>

                <span class="dia-banner-tag">অনলাইনে কুইজ প্রতিযোগিতা</span>
                <h6 class="cd-headline clip is-full-width">মুজিববর্ষ
                    <span class="cd-words-wrapper">
                        <b class="is-visible">অসমাপ্ত আত্মজীবনী</b>
                        <b>কুইজ প্রতিযোগিতা</b>
                        {{-- <b>Issue.</b> --}}
                    </span>
                </h6>
                <p>মুজিববর্ষ উপলক্ষে
                    কোটালীপাড়া উপজেলার শিক্ষার্থীদের অংশগ্রহণে
                    ‘অসমাপ্ত আত্মজীবনী’ বইভিত্তিক
                    অনলাইনে কুইজ প্রতিযোগিতা</p>
                <div class="dia-banner-btn d-flex">
                    <div class="dia-play-btn text-center d-inline-block">
                        <a href="" class="lightbox-image overlay-box"><i class="fas fa-play"></i></a>
                    </div>
                    <div class="dia-abt-btn text-center d-inline-block">
                        <a href="{{ route('student.registration') }}">রেজিস্ট্রেশন করুন</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-shape1 position-absolute"><img src="{{ asset('front') }}/assets/img/d-agency/shape/pls2.png"
                alt=""></div>
        <div class="banner-shape2 position-absolute" data-parallax='{"y" : 100, "rotateY":500}'><img
                src="{{ asset('front') }}/assets/img/d-agency/shape/shp1.png" alt=""></div>
        <div class="banner-side-shape2 position-absolute" data-parallax='{"y" : -30}'><img
                src="{{ asset('front') }}/assets/img/d-agency/shape/bsi2.png" alt=""></div>
        <div class="banner-side-shape1 position-absolute" data-parallax='{"y" : 30}'><img
                src="{{ asset('front') }}/assets/img/d-agency/shape/bsi1.png" alt=""></div>
    </section>
    <!-- End of Banner section
                      ============================================= -->

    <!-- Start of Service section
                      ============================================= -->
    <section id="dia-service" class="dia-service-section">
        <div class="container">
            <div class="dia-service-content">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="dia-service-img position-relative">
                            <img src="{{ asset('front') }}/assets/img/attojiboni.png" alt="">
                            <div class="dia-service-shape dia-service-shape1 position-absolute"><img
                                    src="{{ asset('front') }}/assets/img/d-agency/service/s2.png" alt=""></div>
                            <div class=" dia-service-shape dia-service-shape2 position-absolute"><img
                                    src="{{ asset('front') }}/assets/img/d-agency/service/s3.png" alt=""></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="dia-service-text">
                            <div class="dia-section-title text-left text-capitalize dia-headline">
                                <h2>পরীক্ষা পদ্ধতি</h2>
                            </div>
                            <div class="dia-service-details clearfix">
                                <div class="dia-service-item dia-headline ul-li-block wow fadeFromUp" data-wow-delay="0ms"
                                    data-wow-duration="1500ms">
                                    <h3>পরীক্ষা পদ্ধতি</h3>
                                    <ul>
                                        <li><a href="#">পরীক্ষা পদ্ধতি</a></li>
                                        <li><a href="#">পরীক্ষা পদ্ধতি</a></li>
                                        <li><a href="#">পরীক্ষা পদ্ধতি</a></li>
                                        <li><a href="#">পরীক্ষা পদ্ধতি</a></li>
                                    </ul>
                                </div>
                                <div class="dia-service-item dia-headline ul-li-block wow fadeFromUp" data-wow-delay="300ms"
                                    data-wow-duration="1500ms">
                                    <h3>পরীক্ষা পদ্ধতি ২</h3>
                                    <ul>
                                        <li><a href="#">পরীক্ষা পদ্ধতি</a></li>
                                        <li><a href="#">পরীক্ষা পদ্ধতি</a></li>
                                        <li><a href="#">পরীক্ষা পদ্ধতি</a></li>
                                        <li><a href="#">পরীক্ষা পদ্ধতি</a></li>
                                        <li><a href="#">পরীক্ষা পদ্ধতি</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Service section
                      ============================================= -->

@endsection
