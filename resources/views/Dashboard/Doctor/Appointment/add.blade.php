@extends('Dashboard.User.layouts.master')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('Dashboard/plugins/select2/css/select2.min.css') }}" rel="stylesheet">

    <!--Internal Notify -->
    <link href="{{ URL::asset('Dashboard/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Appointments</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Add appointment</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @include('Dashboard.messages_alert')

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">

                    <p class="mg-b-20">Welcome to book an appointment with
                    <h2> {{ $doctor_name }}</h2> online. These services are
                    free of charge, and after the meeting, we will prepare a nutritional program for you. We wish you a
                    pleasant time!</p>

                    <form action="{{ route('User.Appointments.store') }}" method="post" autocomplete="off"
                        enctype="multipart/form-data">
                        @csrf

                        <input name="doctor_id" class="form-control" type="hidden" value="{{ $doctor_id }}">
                        <input name="user_id" class="form-control" type="hidden" value="{{ auth()->id() }}">

                        <div class="pd-30 pd-sm-40 bg-gray-200">


                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0" for="appointment_date">Appointment Date</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" type="date" name="appointment_date"
                                        id="appointment_date">
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0" for="appointment_time">Appointment Time</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" type="time" name="appointment_time"
                                        id="appointment_time">
                                </div>
                            </div>

                            <button class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal Select2 js -->
    <script src="{{ URL::asset('Dashboard/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Form-Dashboard.Doctor.layouts js -->
    <script src="{{ URL::asset('Dashboard/js/form-Dashboard.Doctor.layouts.js') }}"></script>

    <!--Internal Datatable js -->
    <script src="{{ URL::asset('Dashboard/js/table-data.js') }}"></script>
    <!--Internal Notify js -->
    <script src="{{ URL::asset('Dashboard/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/notify/js/notifit-custom.js') }}"></script>
@endsection
