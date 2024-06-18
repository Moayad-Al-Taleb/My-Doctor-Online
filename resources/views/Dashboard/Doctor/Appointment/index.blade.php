@extends('Dashboard.Doctor.layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('Dashboard/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('Dashboard/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('Dashboard/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('Dashboard/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('Dashboard/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('Dashboard/plugins/select2/css/select2.min.css') }}" rel="stylesheet">

    <!--Internal Notify -->
    <link href="{{ URL::asset('Dashboard/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">My Appointments</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    View all</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @include('Dashboard.messages_alert')

    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        @php
                            $counter = 1;
                        @endphp

                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th class="wd-5p border-bottom-0">#</th>
                                    <th class="wd-15p border-bottom-0">Appointment Date</th>
                                    <th class="wd-15p border-bottom-0">Appointment Time</th>
                                    <th class="wd-15p border-bottom-0">User Name</th>
                                    <th class="wd-15p border-bottom-0">Status</th>
                                    <th class="wd-15p border-bottom-0">Meeting link</th>
                                    <th class="wd-15p border-bottom-0">Processes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($appointments as $appointment)
                                    <tr>
                                        <td>{{ $counter++ }}</td>
                                        <td>{{ \Carbon\Carbon::parse($appointment->appointment_date)->diffForHumans() }}
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A') }}
                                        </td>
                                        <td>
                                            <a href="{{ route('Doctor.Users.show', $appointment->user->id) }}">
                                                {{ $appointment->user->name }}</a>
                                        </td>
                                        <td>
                                            @switch($appointment->status)
                                                @case(0)
                                                    {{ 'You have a new meeting request' }}
                                                @break

                                                @case(1)
                                                    {{ 'You have approved the request' }}
                                                @break

                                                @case(2)
                                                    {{ 'You have rejected the request' }}
                                                @break

                                                @case(3)
                                                    {{ 'The appointment has ended after its meeting' }}
                                                @break
                                            @endswitch
                                        </td>
                                        <td>
                                            @switch($appointment->status)
                                                @case(0)
                                                    -
                                                @break

                                                @case(1)
                                                    @if ($appointment->meeting_link)
                                                        <a class="modal-effect btn btn-sm btn-primary"
                                                            href="{{ $appointment->meeting_link }}" target="_blank"><i
                                                                class="las la-calendar"></i></a>

                                                        <a class="modal-effect btn btn-sm btn-secondary"
                                                            href="https://meet.google.com/" target="_blank">
                                                            <i class="las la-calendar-plus"></i> Schedule Meeting
                                                        </a>
                                                    @else
                                                        <a class="modal-effect btn btn-sm btn-secondary"
                                                            href="https://meet.google.com/" target="_blank">
                                                            <i class="las la-calendar-plus"></i> Schedule Meeting
                                                        </a>
                                                    @endif
                                                @break

                                                @case(2)
                                                    -
                                                @break

                                                @case(3)
                                                    {{ 'The appointment is over' }}
                                                @break
                                            @endswitch
                                        </td>
                                        <td>
                                            {{-- delete --}}
                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                data-toggle="modal" href="#delete{{ $appointment->id }}"><i
                                                    class="las la-trash"></i></a>

                                            @if ($appointment->status == 0 || $appointment->status == 1)
                                                {{-- edit --}}
                                                <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                    data-toggle="modal" href="#edit{{ $appointment->id }}"><i
                                                        class="las la-pen"></i></a>
                                            @endif
                                        </td>
                                    </tr>

                                    @include('Dashboard.Doctor.Appointment.delete')
                                    @include('Dashboard.Doctor.Appointment.edit')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
    <!-- Internal Data tables -->
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal Datatable js -->
    <script src="{{ URL::asset('Dashboard/js/table-data.js') }}"></script>
    <!--Internal Notify js -->
    <script src="{{ URL::asset('Dashboard/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/notify/js/notifit-custom.js') }}"></script>
@endsection
