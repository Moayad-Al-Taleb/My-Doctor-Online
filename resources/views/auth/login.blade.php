@extends('Dashboard.layouts.master2')
@section('css')
    <!-- Sidemenu-respoansive-tabs css -->
    <link href="{{ URL::asset('Dashboard/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css') }}"
        rel="stylesheet">

    <style>
        .panel {
            display: none;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
                <div class="row wd-100p mx-auto text-center">
                    <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                        <img src="{{ URL::asset('Dashboard/img/media/login 2.jpeg') }}"
                            class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
                    </div>
                </div>
            </div>
            <!-- The content half -->
            <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
                <div class="login d-flex align-items-center py-2">
                    <!-- Demo content-->
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                <div class="card-sigin">
                                    <div class="mb-5 d-flex">
                                        <a href="#">
                                            <img src="{{ URL::asset('Dashboard/img/brand/favicon 2.png') }}"
                                                class="sign-favicon ht-100" alt="logo">
                                        </a>
                                        <h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">my<span>-doctor-</span>online</h1>
                                    </div>
                                    <div class="card-sigin">
                                        <div class="main-signup-header">
                                            <h2>{{ trans('Dashboard/login_trans.welcome_back') }}</h2>

                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            {{-- ########## SELECT ########## --}}
                                            <div class="form-group">
                                                <label
                                                    for="sectionChooser">{{ trans('Dashboard/login_trans.choose_list') }}</label>
                                                <select class="form-control" name="sectionChooser" id="sectionChooser">
                                                    <option value="" selected disabled>
                                                        {{ trans('Dashboard/login_trans.choose_list') }}</option>
                                                    <option value="admin">{{ trans('Dashboard/login_trans.admin') }}
                                                    </option>
                                                    <option value="doctor">{{ trans('Dashboard/login_trans.doctor') }}
                                                    </option>
                                                    <option value="user">{{ trans('Dashboard/login_trans.user') }}
                                                    </option>
                                                </select>
                                            </div>
                                            {{-- ########## END SELECT ########## --}}

                                            {{-- ########## form admin ########## --}}
                                            <div class="panel" id="admin">
                                                <form method="POST" action="{{ route('login.admin') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>{{ trans('Dashboard/login_trans.email') }}</label>
                                                        <input class="form-control"
                                                            placeholder="{{ trans('Dashboard/login_trans.enter_your_email') }}"
                                                            type="email" name="email" :value="old('email')" autofocus>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>{{ trans('Dashboard/login_trans.password') }}</label>
                                                        <input class="form-control"
                                                            placeholder="{{ trans('Dashboard/login_trans.enter_your_password') }}"
                                                            type="password" name="password">
                                                    </div>

                                                    <button type="submit"
                                                        class="btn btn-main-primary btn-block">{{ trans('Dashboard/login_trans.sign_in') }}</button>
                                                </form>
                                            </div>
                                            {{-- ########## end form admin ########## --}}

                                            {{-- ########## form doctor ########## --}}
                                            <div class="panel" id="doctor">
                                                <form method="POST" action="{{ route('login.doctor') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>{{ trans('Dashboard/login_trans.email') }}</label>
                                                        <input class="form-control"
                                                            placeholder="{{ trans('Dashboard/login_trans.enter_your_email') }}"
                                                            type="email" name="email" :value="old('email')" autofocus>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>{{ trans('Dashboard/login_trans.password') }}</label>
                                                        <input class="form-control"
                                                            placeholder="{{ trans('Dashboard/login_trans.enter_your_password') }}"
                                                            type="password" name="password">
                                                    </div>

                                                    <button type="submit"
                                                        class="btn btn-main-primary btn-block">{{ trans('Dashboard/login_trans.sign_in') }}</button>
                                                </form>
                                            </div>
                                            {{-- ########## end form doctor ########## --}}

                                            {{-- ########## form user ########## --}}
                                            <div class="panel" id="user">
                                                <form method="POST" action="{{ route('login.user') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>{{ trans('Dashboard/login_trans.email') }}</label>
                                                        <input class="form-control"
                                                            placeholder="{{ trans('Dashboard/login_trans.enter_your_email') }}"
                                                            type="email" name="email" :value="old('email')" autofocus>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>{{ trans('Dashboard/login_trans.password') }}</label>
                                                        <input class="form-control"
                                                            placeholder="{{ trans('Dashboard/login_trans.enter_your_password') }}"
                                                            type="password" name="password">
                                                    </div>

                                                    <button type="submit"
                                                        class="btn btn-main-primary btn-block">{{ trans('Dashboard/login_trans.sign_in') }}</button>
                                                </form>
                                            </div>
                                            {{-- ########## end form user ########## --}}

                                            {{-- ----------  ----------  ----------  ----------  ----------  ----------  ----------  ----------   --}}

                                            <div class="main-signin-footer mt-5">
                                                <p>{{ trans('Dashboard/login_trans.dontt_have_an_account') }} <a
                                                        href="{{ route('register') }}">{{ trans('Dashboard/login_trans.create_an_account') }}</a>
                                                </p>
                                            </div>

                                            {{-- ----------  ----------  ----------  ----------  ----------  ----------  ----------  ----------   --}}

                                            <ul class="nav">
                                                <!-- قائمة التنقل الرئيسية -->
                                                <li class="">
                                                    <!-- عنصر القائمة -->
                                                    <div class="dropdown nav-item d-none d-md-flex">
                                                        <!-- قائمة منسدلة تظهر فقط على الشاشات المتوسطة والكبيرة -->
                                                        <a href="#"
                                                            class="d-flex nav-item nav-link pl-0 country-flag1"
                                                            data-toggle="dropdown" aria-expanded="false">
                                                            <!-- رابط يفتح القائمة المنسدلة عند الضغط -->
                                                            @if (App::getLocale() == 'ar')
                                                                <!-- إذا كانت اللغة الحالية هي العربية -->
                                                                <span
                                                                    class="avatar country-Flag mr-0 align-self-center bg-transparent">
                                                                    {{-- <img src="{{ URL::asset('Dashboard/img/flags/egypt_flag.jpg') }}" alt="img"> --}}
                                                                    <img src="{{ URL::asset('Dashboard/img/flags/syria_flag.jpg') }}"
                                                                        alt="img">
                                                                    <!-- عرض العلم المصري -->
                                                                </span>
                                                                <strong
                                                                    class="mr-2 ml-2 my-auto">{{ LaravelLocalization::getCurrentLocaleName() }}</strong>
                                                                <!-- عرض اسم اللغة الحالية -->
                                                            @else
                                                                <!-- إذا كانت اللغة الحالية ليست العربية -->
                                                                <span
                                                                    class="avatar country-Flag mr-0 align-self-center bg-transparent">
                                                                    <img src="{{ URL::asset('Dashboard/img/flags/us_flag.jpg') }}"
                                                                        alt="img">
                                                                    <!-- عرض العلم الأمريكي -->
                                                                </span>
                                                                <strong
                                                                    class="mr-2 ml-2 my-auto">{{ LaravelLocalization::getCurrentLocaleName() }}</strong>
                                                                <!-- عرض اسم اللغة الحالية -->
                                                            @endif
                                                            <div class="my-auto">
                                                            </div>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow"
                                                            x-placement="bottom-end">
                                                            <!-- القائمة المنسدلة التي تحتوي على خيارات تغيير اللغة -->
                                                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                                                <!-- تكرار لكل اللغات المدعومة -->
                                                                <a class="dropdown-item" rel="alternate"
                                                                    hreflang="{{ $localeCode }}"
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End -->
                </div>
            </div><!-- End -->
        </div>
    </div>
@endsection
@section('js')
    <script>
        $('#sectionChooser').change(function() {
            var myID = $(this).val();
            $('.panel').each(function() {
                myID === $(this).attr('id') ? $(this).show() : $(this).hide();
            });
        });
    </script>
@endsection
