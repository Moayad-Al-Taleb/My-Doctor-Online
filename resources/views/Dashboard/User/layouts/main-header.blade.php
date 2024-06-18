<!-- main-header opened -->
<div class="main-header sticky side-header nav nav-item">
    <div class="container-fluid">
        <div class="main-header-left">
            <div class="responsive-logo">
                <a href="#">
                    <img src="{{ URL::asset('Dashboard/img/brand/logo 2.png') }}" class="logo-1" alt="logo">
                </a>
                <a href="#">
                    <img src="{{ URL::asset('Dashboard/img/brand/logo 2.png') }}" class="dark-logo-1" alt="logo">
                </a>
                <a href="#">
                    <img src="{{ URL::asset('Dashboard/img/brand/logo 2.png') }}" class="logo-2" alt="logo">
                </a>
                <a href="#">
                    <img src="{{ URL::asset('Dashboard/img/brand/logo 2.png') }}" class="dark-logo-2" alt="logo">
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
                        @if (Auth::user()->profile_picture)
                            <img alt=""
                                src="{{ Url::asset('Dashboard/Attachments/img/' . Auth::user()->profile_picture) }}">
                        @else
                            <img alt="" src="{{ URL::asset('Dashboard/img/UserDefault.png') }}">
                        @endif

                    </a>
                    <div class="dropdown-menu">
                        <div class="main-header-profile bg-primary p-3">
                            <div class="d-flex wd-100p">
                                <div class="main-img-user">

                                    @if (Auth::user()->profile_picture)
                                        <img alt=""
                                            src="{{ Url::asset('Dashboard/Attachments/img/' . Auth::user()->profile_picture) }}"
                                            class="">
                                    @else
                                        <img alt="" src="{{ URL::asset('Dashboard/img/UserDefault.png') }}"
                                            class="">
                                    @endif

                                </div>
                                <div class="mr-3 my-auto">
                                    <h6>{{ Auth::user()->name }}</h6>
                                    <span>{{ Auth::user()->email }}</span>
                                </div>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('logout.user') }}">
                            @csrf
                            <a class="dropdown-item" href="#"
                                onclick="event.preventDefault();
                                        this.closest('form').submit();"><i
                                    class="bx bx-log-out"></i> Sign Out</a>
                        </form>
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
