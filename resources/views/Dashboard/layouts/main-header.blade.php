<!-- main-header opened -->
<div class="main-header sticky side-header nav nav-item">
    <div class="container-fluid">
        <div class="main-header-left">
            <div class="responsive-logo">
                <a href="{{ url('/' . ($page = 'index')) }}">
                    <img src="{{ URL::asset('Dashboard/img/brand/logo.png') }}" class="logo-1" alt="logo">
                </a>
                <a href="{{ url('/' . ($page = 'index')) }}">
                    <img src="{{ URL::asset('Dashboard/img/brand/logo-white.png') }}" class="dark-logo-1" alt="logo">
                </a>
                <a href="{{ url('/' . ($page = 'index')) }}">
                    <img src="{{ URL::asset('Dashboard/img/brand/favicon.png') }}" class="logo-2" alt="logo">
                </a>
                <a href="{{ url('/' . ($page = 'index')) }}">
                    <img src="{{ URL::asset('Dashboard/img/brand/favicon.png') }}" class="dark-logo-2" alt="logo">
                </a>
            </div>
            <div class="app-sidebar__toggle" data-toggle="sidebar">
                <a class="open-toggle" href="#">
                    <i class="header-icon fe fe-align-left"></i>
                </a>
                <a class="close-toggle" href="#">
                    <i class="header-icons fe fe-x"></i>
                </a>
            </div>
            <div class="main-header-center mr-3 d-sm-none d-md-none d-lg-block">
                <input class="form-control" placeholder="Search for anything..." type="search">
                <button class="btn">
                    <i class="fas fa-search d-none d-md-block"></i>
                </button>
            </div>
        </div>
        <div class="main-header-right">
            <ul class="nav">
                <!-- قائمة التنقل الرئيسية -->
                <li class="">
                    <!-- عنصر القائمة -->
                    <div class="dropdown nav-item d-none d-md-flex">
                        <!-- قائمة منسدلة تظهر فقط على الشاشات المتوسطة والكبيرة -->
                        <a href="#" class="d-flex nav-item nav-link pl-0 country-flag1" data-toggle="dropdown"
                            aria-expanded="false">
                            <!-- رابط يفتح القائمة المنسدلة عند الضغط -->
                            @if (App::getLocale() == 'ar')
                                <!-- إذا كانت اللغة الحالية هي العربية -->
                                <span class="avatar country-Flag mr-0 align-self-center bg-transparent">
                                    {{-- <img src="{{ URL::asset('Dashboard/img/flags/egypt_flag.jpg') }}" alt="img"> --}}
                                    <img src="{{ URL::asset('Dashboard/img/flags/syria_flag.jpg') }}" alt="img">
                                    <!-- عرض العلم المصري -->
                                </span>
                                <strong
                                    class="mr-2 ml-2 my-auto">{{ LaravelLocalization::getCurrentLocaleName() }}</strong>
                                <!-- عرض اسم اللغة الحالية -->
                            @else
                                <!-- إذا كانت اللغة الحالية ليست العربية -->
                                <span class="avatar country-Flag mr-0 align-self-center bg-transparent">
                                    <img src="{{ URL::asset('Dashboard/img/flags/us_flag.jpg') }}" alt="img">
                                    <!-- عرض العلم الأمريكي -->
                                </span>
                                <strong
                                    class="mr-2 ml-2 my-auto">{{ LaravelLocalization::getCurrentLocaleName() }}</strong>
                                <!-- عرض اسم اللغة الحالية -->
                            @endif
                            <div class="my-auto">
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow" x-placement="bottom-end">
                            <!-- القائمة المنسدلة التي تحتوي على خيارات تغيير اللغة -->
                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <!-- تكرار لكل اللغات المدعومة -->
                                <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    <!-- رابط لتغيير اللغة -->
                                    @if ($properties['native'] == 'English')
                                        <i class="flag-icon flag-icon-us"></i>
                                        <!-- عرض العلم الأمريكي إذا كانت اللغة إنجليزية -->
                                    @elseif($properties['native'] == 'العربية')
                                        <i class="flag-icon flag-icon-sy"></i>
                                        <!-- عرض العلم السوري إذا كانت اللغة عربية -->
                                    @endif
                                    {{ $properties['native'] }}
                                    <!-- عرض اسم اللغة -->
                                </a>
                            @endforeach
                        </div>
                    </div>
                </li>
            </ul>
            <div class="nav nav-item navbar-nav-right ml-auto">
                <div class="nav-link" id="bs-example-navbar-collapse-1">
                    <form class="navbar-form" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <span class="input-group-btn">
                                <button type="reset" class="btn btn-default">
                                    <i class="fas fa-times"></i>
                                </button>
                                <button type="submit" class="btn btn-default nav-link resp-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-search">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                    </svg>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="nav-item full-screen fullscreen-button">
                    <a class="new nav-link full-screen-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-maximize">
                            <path d="M8 3H5a2 2 0 0 0-2 2v3"></path>
                            <path d="M16 3h3a2 2 0 0 1 2 2v3"></path>
                            <path d="M8 21H5a2 2 0 0 1-2-2v-3"></path>
                            <path d="M16 21h3a2 2 0 0 0 2-2v-3"></path>
                        </svg>
                    </a>
                </div>
                <div class="dropdown main-profile-menu nav nav-item nav-link">
                    <a class="profile-user d-flex" href="">
                        <img alt="" src="{{ URL::asset('Dashboard/img/faces/6.jpg') }}">
                    </a>
                    <div class="dropdown-menu">
                        <div class="main-header-profile bg-primary p-3">
                            <div class="d-flex wd-100p">
                                <div class="main-img-user">
                                    <img alt="" src="{{ URL::asset('Dashboard/img/faces/6.jpg') }}"
                                        class="">
                                </div>
                                <div class="mr-3 my-auto">
                                    <h6>Petey Cruiser</h6>
                                    <span>Premium Member</span>
                                </div>
                            </div>
                        </div>
                        <a class="dropdown-item" href="page-signin.html">
                            <i class="bx bx-log-out"></i> Sign Out
                        </a>
                    </div>
                </div>
                <div class="dropdown main-header-message right-toggle">
                    <a class="nav-link pr-0" data-toggle="sidebar-left" data-target=".sidebar-right">
                        <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-menu">
                            <line x1="3" y1="12" x2="21" y2="12"></line>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <line x1="3" y1="18" x2="21" y2="18"></line>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /main-header -->
