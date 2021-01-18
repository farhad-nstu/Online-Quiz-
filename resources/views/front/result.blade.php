@extends('front.layouts.app')

@section('content')
    <!-- preloader - start -->
    <div id="preloader" class="dia-preloader"></div>
    <div class="up">
        <a href="#" id="scrollup" class="dia-scrollup text-center"><i class="fas fa-angle-up"></i></a>
    </div>
    <!-- Start of header section
            ============================================= -->
    <header id="dia-header" class="dia-main-header">
        <div class="container">
            <div class="dia-main-header-content clearfix">
                <div class="dia-logo float-left">
                    <a href="#"><img width="200" src="{{ asset('front') }}/assets/img/slogo1.png" alt=""></a>
                </div>
                <div class="dia-main-menu-item float-right  bg-light">
                    <nav class="dia-main-navigation  clearfix ul-li">
                        <ul id="main-nav" class="navbar-nav text-capitalize clearfix">
                            <li> <a href="{{ route('front.home') }}">Home</a></li>
                            <li><a data-toggle="modal" data-target="#studentLoginForm" href="#">Login</a></li>
                        </ul>
                    </nav>
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
                            <a href="%21.html#"><img width="300"
                                    src="{{ asset('front') }}/assets/img/d-agency/logo/logo2.png" alt=""></a>
                        </div>
                        <nav class="dia-mobile-main-navigation  clearfix ul-li">
                            <ul id="m-main-nav" class="navbar-nav text-capitalize clearfix">
                                <li> <a href="{{ route('front.home') }}">Home</a></li>
                                <li><a data-toggle="modal" data-target="#studentLoginForm" href="#">Login</a></li>
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

    </section>
    <!-- End of Banner section
            ============================================= -->

    <!-- Start of Service section
              ============================================= -->
    <section id="dia-service" class="dia-service-section">
        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (Session::get('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong class="text-success">Message: {{ Session::get('message') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="dia-service-content">
                <div class="row">
                    <div class="col-lg-12 col-md-12">

                        <div class="card">
                            <div class="card-header">
                                <p class="text-right text-danger" id="demo"></p>
                            </div>
                            <div class="card-body py-5">
                              <h3>পরীক্ষায় অংশগ্রহণ করার জন্য অভিনন্দন! ফলাফল ঘোষণা হলে জানিয়ে দেওয়া হবে</h3>
                            </div>
                            <div class="card-footer text-muted">
                                দেশ থেকে সর্বপ্রকার অন্যায়, অবিচার ও শোষণ উচ্ছেদ করার জন্য দরকার হলে আমি আমার জীবন উৎসর্গ করব। -- <span class="text-warning">বঙ্গবন্ধু শেখ মুজিবুর রহমান</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- End of Service section
            ============================================= -->
@endsection
