<!-- sidebar @s -->
<div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
        <a href="{{route('home')}}" class="logo-link nk-sidebar-logo">
        <img class="logo-light logo-img" src="{{$setting->logo}}" alt="logo">
            </a>
        </div>
        <div class="nk-menu-trigger mr-n2">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
        </div>

    </div><!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <div class="form-group">
                    {{-- <h6 class="nk-menu-text">@lang('messages.change_language')</h6>
                    <div class="form-control-wrap">
                        <select class="form-select changeLang">
                             <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>@lang('messages.english')</option>

                            <option value="bn" {{ session()->get('locale') == 'bn' ? 'selected' : '' }}>@lang('messages.bangla')</option>
                        </select>
                    </div> --}}
                </div>
                <ul class="nk-menu">

                     {{-- ======USER AREA====== --}}

                    @if (!empty(Auth::user()->role) && Auth::user()->role == 'User')
                        <li class="nk-menu-item">
                            <a href="html/index.html" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-dashlite"></em></span>
                                <span class="nk-menu-text">@lang('messages.user_can')</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                    @endif

                     {{-- ======Subscriber AREA====== --}}

                    @if (!empty(Auth::user()->role) && Auth::user()->role == 'Subscriber')
                    <li class="nk-menu-item">
                        <a href="html/index.html" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-dashlite"></em></span>
                            <span class="nk-menu-text">@lang('messages.subscriber_can')</span>
                        </a>
                    </li>
                    <!-- .nk-menu-item -->

                    <li class="nk-menu-item">
                        <a href="html/index.html" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-dashlite"></em></span>
                            <span class="nk-menu-text">@lang('messages.subscriber_can')</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    @endif

                    {{-- ======ADMIN AREA====== --}}

                    @if (!empty(Auth::user()->role) && Auth::user()->role == 'Admin')


                    <li class="nk-menu-item">

                    <a href="{{route('showSettings')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-dashlite"></em></span>

                    <span class="nk-menu-text">{{ __('messages.settings') }}</span>
                        </a>
                    </li>

                    <!-- .nk-menu-item -->
                        {{-- <div class="col-md-4">
                            <select class="form-control changeLang">
                                <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>

                                <option value="bn" {{ session()->get('locale') == 'bn' ? 'selected' : '' }}>Bangla</option>

                            </select>
                        </div>   --}}


                    <li class="nk-menu-item">
                        <a href="html/index-analytics.html" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-growth"></em></span>
                            <span class="nk-menu-text">@lang('messages.Analytics Dashboard')</span>
                        </a>
                    </li>
                    <!-- .nk-menu-item -->

                    <li class="nk-menu-item">
                        <a href="html/index-invest.html" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-coins"></em></span>
                            <span class="nk-menu-text">@lang('messages.Invest Dashboard')</span>
                        </a>
                    </li><!-- .nk-menu-item -->

                    @endif

                    {{-- ======SUPERADMIN AREA====== --}}

                    @if (!empty(Auth::user()->role) && Auth::user()->role == 'superadmin')


            <!-- School Manage -->
            <li class="nk-menu-item has-sub">
                <a href="javascript:void(0)" class="nk-menu-link nk-menu-toggle">
                    <span class="nk-menu-icon"><em class="icon ni ni-setting"></em></span>
                    <span class="nk-menu-text">Settings</span>
                </a>

                <ul class="nk-menu-sub">
                    <li class="nk-menu-item">

                        <a href="{{route('showSettings')}}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-setting"></em></span>
                        <span class="nk-menu-text">General Settings</span>
                            </a>
                        </li>

                        <!-- .nk-menu-item -->
                            {{-- <div class="col-md-4">
                                <select class="form-control changeLang">
                                    <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>

                                    <option value="bn" {{ session()->get('locale') == 'bn' ? 'selected' : '' }}>Bangla</option>

                                </select>
                            </div>   --}}

                        <li class="nk-menu-item">
                            <a href="{{ route('user-registration') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-plus"></em></span>
                            <span class="nk-menu-text">@lang('messages.registration')</span>
                            </a>
                        </li>
                        <!-- .nk-menu-item -->

                        <li class="nk-menu-item">
                            <a href="{{ route('user-list') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-user"></em></span>
                            <span class="nk-menu-text">@lang('messages.user list')</span>
                            </a>
                        </li>
                        <!-- .nk-menu-item -->
                </ul><!-- .nk-menu-sub -->


                </li>
            <!-- School Manage -->

                          <!-- School Manage -->
                          <li class="nk-menu-item has-sub">
                            <a href="javascript:void(0)" class="nk-menu-link nk-menu-toggle">
                                <span class="nk-menu-icon"><em class="icon ni ni-square"></em></span>
                                <span class="nk-menu-text">School Manage</span>
                            </a>

                            <ul class="nk-menu-sub">

                                <li class="nk-menu-item">
                                    <a href="{{ route('school.create') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-plus-circle"></em></span>
                                    <span class="nk-menu-text">School Create</span>
                                    </a>
                                </li>
                                <!-- .nk-menu-item -->

                                <li class="nk-menu-item">
                                    <a href="{{ route('school.index') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-view-row"></em></span>
                                    <span class="nk-menu-text">School List</span>
                                    </a>
                                </li>
                                <!-- .nk-menu-item -->
                            </ul><!-- .nk-menu-sub -->
                            </li>
                        <!-- School Manage -->

                          <!-- Class Manage -->
                          <li class="nk-menu-item has-sub">
                            <a href="javascript:void(0)" class="nk-menu-link nk-menu-toggle">
                                <span class="nk-menu-icon"><em class="icon ni ni-square"></em></span>
                                <span class="nk-menu-text">Class Manage</span>
                            </a>

                            <ul class="nk-menu-sub">

                                <li class="nk-menu-item">
                                    <a href="{{ route('class.create') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-plus-circle"></em></span>
                                    <span class="nk-menu-text">Class Create</span>
                                    </a>
                                </li>
                                <!-- .nk-menu-item -->

                                <li class="nk-menu-item">
                                    <a href="{{ route('class.index') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-view-row"></em></span>
                                    <span class="nk-menu-text">Class List</span>
                                    </a>
                                </li>
                                <!-- .nk-menu-item -->
                            </ul><!-- .nk-menu-sub -->
                            </li>
                        <!-- Class Manage -->

                          <!-- Result Manage -->
                          <li class="nk-menu-item has-sub">

                            <a href="javascript:void(0)" class="nk-menu-link nk-menu-toggle">
                                <span class="nk-menu-icon"><em class="icon ni ni-square"></em></span>
                                <span class="nk-menu-text">Show Result</span>
                            </a>

                            <ul class="nk-menu-sub">

                                <li class="nk-menu-item">
                                    <a href="{{ route('result') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-plus-circle"></em></span>
                                    <span class="nk-menu-text">Result</span>
                                    </a> 
                                </li>

                                <!-- .nk-menu-item -->
                            </ul>
                            <!-- .nk-menu-sub -->
                            </li>
                        <!-- Result Manage -->



                    <!-- Questions Section Start-->
                    <li class="nk-menu-item">
                        <a href="{{ route('questions.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-bitcoin-cash"></em></span>
                        <span class="nk-menu-text">Questions</span>
                        </a>
                    </li>
                    <!-- Question Section End -->



                    <!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="{{ route('examrules.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-coins"></em></span>
                            <span class="nk-menu-text">Add Exam Rules</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    @endif
                </ul>
                <!-- .nk-menu -->
            </div><!-- .nk-sidebar-menu -->
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-element -->
</div>
<!-- sidebar @e -->
