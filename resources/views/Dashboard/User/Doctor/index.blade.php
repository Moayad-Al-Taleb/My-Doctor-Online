@extends('Dashboard.User.layouts.master')
@section('css')
    <!--  Owl-carousel css-->
    <link href="{{ URL::asset('Dashboard/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />
    <!-- Maps css -->
    <link href="{{ URL::asset('Dashboard/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">

    <link href="{{ URL::asset('Dashboard/plugins/morris.js/morris.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('Dashboard/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Doctors</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    View all</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @include('Dashboard.messages_alert')

    <div class="row row-sm">
        @foreach ($doctors as $doctor)
            <div class="col-xl-4 col-lg-4 col-md-12">
                <div class="card text-center">
                    @if ($doctor->profile_picture)
                        <img class="card-img-top"
                            src="{{ Url::asset('Dashboard/Attachments/img/' . $doctor->profile_picture) }}"
                            alt="Doctor Image" style="height: 200px; object-fit: contain; border-radius: 50%;">
                    @else
                        <img class="card-img-top" src="{{ URL::asset('Dashboard/img/DoctorDefault.jpg') }}"
                            alt="Default Doctor Image" style="height: 200px; object-fit: contain; border-radius: 50%;">
                    @endif
                    <div class="card-body">
                        <h4 class="card-title mb-3">{{ $doctor->name }}</h4>
                        <h5 class="card-subtitle mb-3">Description</h5>
                        <p class="card-text">{{ \Str::limit($doctor->description, 30) }}</p>
                        <a class="btn btn-primary" href="{{ route('User.Doctors.show', $doctor->id) }}">View details</a>
                        <a class="btn btn-danger-gradient"
                            href="{{ route('User.Appointments.create', $doctor->id) }}">Appointment
                            Booking</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    </div>
    </div>
    <!-- Container closed -->
@endsection
@section('js')
    <!--Internal  Chart.bundle js -->
    <script src="{{ URL::asset('Dashboard/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <!-- Moment js -->
    <script src="{{ URL::asset('Dashboard/plugins/raphael/raphael.min.js') }}"></script>
    <!--Internal  Flot js-->
    <script src="{{ URL::asset('Dashboard/plugins/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/jquery.flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/jquery.flot/jquery.flot.categories.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/js/dashboard.sampledata.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/js/chart.flot.sampledata.js') }}"></script>
    <!--Internal Apexchart js-->
    <script src="{{ URL::asset('Dashboard/js/apexcharts.js') }}"></script>
    <!-- Internal Map -->
    <script src="{{ URL::asset('Dashboard/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/js/modal-popup.js') }}"></script>
    <!--Internal  index js -->
    <script src="{{ URL::asset('Dashboard/js/index.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/js/jquery.vmap.sampledata.js') }}"></script>
@endsection
