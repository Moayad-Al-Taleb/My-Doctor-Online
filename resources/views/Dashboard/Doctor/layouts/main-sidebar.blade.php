<!-- main-sidebar -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="#"><img
                src="{{ URL::asset('Dashboard/img/brand/logo 2.png') }}" class="main-logo" alt="logo"></a>
        <a class="desktop-logo logo-dark active" href="#"><img
                src="{{ URL::asset('Dashboard/img/brand/logo 2.png') }}" class="main-logo dark-theme"
                alt="logo"></a>
        <a class="logo-icon mobile-logo icon-light active" href="#"><img
                src="{{ URL::asset('Dashboard/img/brand/logo 2.png') }}" class="logo-icon" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-dark active" href="#"><img
                src="{{ URL::asset('Dashboard/img/brand/logo 2.png') }}" class="logo-icon dark-theme"
                alt="logo"></a>
    </div>
    <div class="main-sidemenu">
        <div class="app-sidebar__user clearfix">
            <div class="dropdown user-pro-body">
                <div class="">
                    @if (Auth::user()->profile_picture)
                        <img alt="user-img" class="avatar avatar-xl brround"
                            src="{{ Url::asset('Dashboard/Attachments/img/' . Auth::user()->profile_picture) }}">
                    @else
                        <img alt="user-img" class="avatar avatar-xl brround"
                            src="{{ URL::asset('Dashboard/img/DoctorDefault.jpg') }}">
                    @endif

                    <span class="avatar-status profile-status bg-green"></span>
                </div>
                <div class="user-info">
                    <h4 class="font-weight-semibold mt-3 mb-0">{{ Auth::user()->name }}</h4>
                    <span class="mb-0 text-muted">{{ Auth::user()->email }}</span>
                </div>
            </div>
        </div>
        <ul class="side-menu">
            <li class="side-item side-item-category">My doctor online software system</li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('dashboard.doctor') }}"><svg
                        xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
                        <path
                            d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z" />
                    </svg><span class="side-menu__label">Home</span><span
                        class="badge badge-success side-badge">1</span></a>
            </li>
            <li class="side-item side-item-category">Content and article</li>
            <li class="slide">
                <!-- رابط القائمة الرئيسية مع أيقونة ونص وتفعيل خاصية التمدد للقائمة الفرعية -->
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <!-- أيقونة SVG للقائمة -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <!-- مسار شفاف لتحديد إطار الأيقونة -->
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <!-- المسار الرئيسي للأيقونة على شكل صحيفة -->
                        <path
                            d="M21 3H3c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM19 19H5V5h14v14zm-2-9H7v2h10v-2zm0 4H7v2h10v-2z" />
                    </svg>
                    <!-- نص القائمة الرئيسية -->
                    <span class="side-menu__label">Articles</span>
                    <!-- أيقونة السهم للأسفل لتمييز القائمة القابلة للتوسيع -->
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <!-- قائمة فرعية تحتوي على عناصر الروابط لمختلف أنواع الرسوم البيانية -->
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('Doctor.Articles.index') }}">View all</a></li>
                </ul>
            </li>
            <li class="slide">
                <!-- رابط القائمة الرئيسية مع أيقونة ونص وتفعيل خاصية التمدد للقائمة الفرعية -->
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <!-- أيقونة SVG للقائمة -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <!-- مسار شفاف لتحديد إطار الأيقونة -->
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <!-- المسار الرئيسي للأيقونة على شكل تفاحة -->
                        <path
                            d="M12 2C8.69 2 6 4.69 6 8c0 3.87 3.13 7 7 7s7-3.13 7-7c0-3.31-2.69-6-6-6zm0 12c-2.8 0-5.09-2.29-5.09-5.09 0-1.1.36-2.13.99-3 .25-.35.49-.67.73-1 1.24 1.5 3.22 2.09 5.18 1.91-.04.3-.05.61-.05.91 0 2.8 2.29 5.09 5.09 5.09.13 0 .26-.01.39-.02-.54.8-1.28 1.53-2.17 2.09-.88.55-1.86.91-2.97.91zm.55-11.29C11.58 2.24 10.81 2 10 2 9.35 2 8.74 2.21 8.24 2.59c-.19.14-.35.3-.5.46.46.28.93.56 1.42.85.58.35 1.24.68 1.94 1.01.03-.32.04-.65.02-.99-.04-.56-.22-1.09-.57-1.51z" />
                    </svg>
                    <!-- نص القائمة الرئيسية -->
                    <span class="side-menu__label">Nutritional Facts</span>
                    <!-- أيقونة السهم للأسفل لتمييز القائمة القابلة للتوسيع -->
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <!-- قائمة فرعية تحتوي على عناصر الروابط لمختلف أنواع الرسوم البيانية -->
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('Doctor.NutritionalFacts.index') }}">View all</a></li>
                </ul>
            </li>
            <li class="side-item side-item-category">Managing patient requests</li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <!-- أيقونة SVG مواعيدي -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path fill="none" d="M0 0h24v24H0V0z" />
                        <path
                            d="M20 3h-1V2h-2v1H7V2H5v1H4c-1.11 0-1.99.9-1.99 2L2 19c0 1.1.89 2 1.99 2H20c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H4V8h16v11z" />
                    </svg>
                    <span class="side-menu__label">My Appointments</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('Doctor.Appointments.index', Auth::id()) }}">View all</a>
                    </li>
                </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <!-- أيقونة SVG البرامج الغذائية -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path fill="none" d="M0 0h24v24H0V0z" />
                        <path
                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zM9.5 7.75c0-.69.56-1.25 1.25-1.25h3c.69 0 1.25.56 1.25 1.25S14.44 9 13.75 9h-3c-.69 0-1.25-.56-1.25-1.25zm7 9.75H7c-.55 0-1 .45-1 1s.45 1 1 1h9c.55 0 1-.45 1-1s-.45-1-1-1z" />
                    </svg>
                    <span class="side-menu__label">Nutrition Programs</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('Doctor.NutritionPrograms.index') }}">View all</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
<!-- main-sidebar -->
