@extends('Dashboard.layouts.master2')
@section('css')
    <!-- Sidemenu-respoansive-tabs css -->
    <link href="{{ URL::asset('Dashboard/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css') }}"
        rel="stylesheet">
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
                                    <div class="main-signup-header">
                                        <h2 class="text-primary">{{ trans('Dashboard/register_trans.get_started') }}</h2>
                                        <h5 class="font-weight-normal mb-4">
                                            {{ trans('Dashboard/register_trans.its_free_to_signup_and_only_takes_a_minute.') }}
                                        </h5>

                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <form action="{{ route('register') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label>{{ trans('Dashboard/register_trans.firstname') }} &amp;
                                                    {{ trans('Dashboard/register_trans.lastname') }}</label>
                                                <input class="form-control"
                                                    placeholder="{{ trans('Dashboard/register_trans.enter_your_firstname_and_lastname') }}"
                                                    type="text" name="name" value="{{ old('name') }}" autofocus>
                                            </div>

                                            <div class="form-group">
                                                <label>{{ trans('Dashboard/register_trans.email') }}</label>
                                                <input class="form-control"
                                                    placeholder="{{ trans('Dashboard/register_trans.enter_your_email') }}"
                                                    type="email" name="email" value="{{ old('email') }}">
                                            </div>

                                            <div class="form-group">
                                                <label>{{ trans('Dashboard/register_trans.password') }}</label>
                                                <input class="form-control"
                                                    placeholder="{{ trans('Dashboard/register_trans.enter_your_password') }}"
                                                    type="password" name="password">
                                            </div>

                                            <div class="form-group">
                                                <label>{{ trans('Dashboard/register_trans.confirm_password') }}</label>
                                                <input class="form-control"
                                                    placeholder="{{ trans('Dashboard/register_trans.enter_your_confirm_password') }}"
                                                    type="password" name="password_confirmation">
                                            </div>

                                            <div class="form-group">
                                                <label>{{ trans('Dashboard/register_trans.birth_date') }}</label>
                                                <input class="form-control"
                                                    placeholder="{{ trans('Dashboard/register_trans.enter_your_birth_date') }}"
                                                    type="date" name="birth_date" value="{{ old('birth_date') }}">
                                            </div>

                                            <div class="form-group">
                                                <label>{{ trans('Dashboard/register_trans.gender') }}</label>
                                                <select class="form-control" name="gender">
                                                    <option value="" selected disabled>
                                                        {{ trans('Dashboard/register_trans.choose_list') }}</option>
                                                    <option value="0" {{ old('gender') == '0' ? 'selected' : '' }}>
                                                        {{ trans('Dashboard/register_trans.male') }}
                                                    </option>
                                                    <option value="1" {{ old('gender') == '1' ? 'selected' : '' }}>
                                                        {{ trans('Dashboard/register_trans.female') }}
                                                    </option>
                                                </select>
                                            </div>

                                            <button
                                                class="btn btn-main-primary btn-block">{{ trans('Dashboard/register_trans.create_account') }}</button>
                                        </form>

                                        <div class="main-signup-footer mt-5">
                                            <p>{{ trans('Dashboard/register_trans.already_have_an_account?') }} <a
                                                    href="{{ route('login') }}">{{ trans('Dashboard/register_trans.sign_in') }}</a>
                                            </p>
                                        </div>

                                        <ul class="nav">
                                            <li class="">
                                                <div class="dropdown nav-item d-none d-md-flex">
                                                    <a href="#" class="d-flex nav-item nav-link pl-0 country-flag1"
                                                        data-toggle="dropdown" aria-expanded="false">
                                                        @if (App::getLocale() == 'ar')
                                                            <span
                                                                class="avatar country-Flag mr-0 align-self-center bg-transparent">
                                                                <img src="{{ URL::asset('Dashboard/img/flags/syria_flag.jpg') }}"
                                                                    alt="img">
                                                            </span>
                                                            <strong
                                                                class="mr-2 ml-2 my-auto">{{ LaravelLocalization::getCurrentLocaleName() }}</strong>
                                                        @else
                                                            <span
                                                                class="avatar country-Flag mr-0 align-self-center bg-transparent">
                                                                <img src="{{ URL::asset('Dashboard/img/flags/us_flag.jpg') }}"
                                                                    alt="img">
                                                            </span>
                                                            <strong
                                                                class="mr-2 ml-2 my-auto">{{ LaravelLocalization::getCurrentLocaleName() }}</strong>
                                                        @endif
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow"
                                                        x-placement="bottom-end">
                                                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                                            <a class="dropdown-item" rel="alternate"
                                                                hreflang="{{ $localeCode }}"
                                                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                                @if ($properties['native'] == 'English')
                                                                    <i class="flag-icon flag-icon-us"></i>
                                                                @elseif($properties['native'] == 'العربية')
                                                                    <i class="flag-icon flag-icon-sy"></i>
                                                                @endif
                                                                {{ $properties['native'] }}
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
                    </div><!-- End -->
                </div>
            </div><!-- End -->
        </div>
    </div>
@endsection
@section('js')
@endsection
