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
                          <a href="#"><img width="200" src="{{asset('front')}}/assets/img/slogo1.png" alt=""></a>
                      </div>
                      <div class="dia-main-menu-item float-right">
                          <nav class="dia-main-navigation  clearfix ul-li">
                              <ul id="main-nav" class="navbar-nav text-capitalize clearfix">
                                <li> <a href="{{route('front.home')}}">Home</a></li>
                                <li> <a href="{{route('front.quiz')}}">Quiz</a></li>

                                @auth
                                @if (!empty(Auth::user()->role) && Auth::user()->role == 'student')
                                <li> <a href="{{route('student.panel')}}">Student Panel</a></li>
                                @endif
                                <li> <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">Logout</a></li>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                      @csrf
                                  </form>
                                  @else
                                  <li> <a href="{{route('student.registration')}}">Registration</a></li>
                                  <li><a data-toggle="modal" data-target="#studentLoginForm" href="#">Login</a></li>
                                  @endauth
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
                                  <a href="%21.html#"><img width="300" src="{{asset('front')}}/assets/img/d-agency/logo/logo2.png" alt=""></a>
                              </div>
                              <nav class="dia-mobile-main-navigation  clearfix ul-li">
                               <ul id="m-main-nav" class="navbar-nav text-capitalize clearfix">
                                  <li> <a href="{{route('front.home')}}">Home</a></li>
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
                        <strong class="text-success">Message: {{  Session::get('message')  }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                  <div class="dia-service-content">
                      <div class="row">
                          <div class="col-lg-12 col-md-12">
                                <form action="" method="POST">
                                    @csrf

                                    <div class="form-group row">
                                      <label for="inputPassword" class="col-sm-2 col-form-label text-light">স্কুলের নাম</label>
                                      <div class="col-sm-8">
                                        <select name="school" class="form-control form-control-lg" required>
                                            <option value="">Select School</option>
                                            @forelse (\App\Models\School::get() as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                            @empty

                                            @endforelse
                                        </select>
                                      </div>
                                    </div>

                                    <div class="form-group row">
                                      <label for="inputPassword" class="col-sm-2 col-form-label text-light">শ্রেণি</label>
                                      <div class="col-sm-8">
                                        <select name="class" class="form-control form-control-lg" required>
                                            <option value="">Select Class</option>
                                            @forelse (\App\Models\ClassName::get() as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                            @empty

                                            @endforelse
                                        </select>
                                      </div>
                                    </div>

                                    <div class="form-group row">
                                      <label for="inputPassword" class="col-sm-2 col-form-label text-light">রোল নং</label>
                                      <div class="col-sm-8">
                                        <input type="text" class="form-control" id="class" placeholder="রোল নং" name="roll" required>
                                      </div>
                                    </div>

                                    <div class="form-group row">
                                      <label for="inputPassword" class="col-sm-2 col-form-label text-light">নাম</label>
                                      <div class="col-sm-8">
                                        <input type="text" class="form-control" id="class" placeholder="নাম" name="name" required>
                                      </div>
                                    </div>

                                    <div class="form-group row">
                                      <label for="inputPassword" class="col-sm-2 col-form-label text-light">অভিভাবকের মোবা: নং </label>
                                      <div class="col-sm-8">
                                        <input type="text" class="form-control" id="class" placeholder="অভিভাবকের মোবাইল নং" name="parent_phone" required>
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label for="inputPassword" class="col-sm-2 col-form-label text-light"> </label>
                                      <div class="col-sm-10">
                                        <button type="submit" class="btn btn-lg btn-info">Submit</button>
                                      </div>
                                    </div>
                                </form>
                          </div>

                      </div>
                  </div>
              </div>
          </section>
      <!-- End of Service section
          ============================================= -->

@endsection
