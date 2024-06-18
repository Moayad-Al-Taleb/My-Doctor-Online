@extends('Dashboard.Admin.layouts.master')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('Dashboard/plugins/select2/css/select2.min.css') }}" rel="stylesheet">

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
                <a href="{{ route('Admin.Doctors.index') }}">
                    <h4 class="content-title mb-0 my-auto">Doctors</h4>
                </a><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Show doctor</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @include('Dashboard.messages_alert')

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">{{ $doctor->name }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <h5>Email:</h5>
                            <p>{{ $doctor->email }}</p>
                        </div>
                        <div class="mb-3">
                            <h5>Status:</h5>
                            <p>
                                <span class="dot-label bg-{{ $doctor->status == 1 ? 'success' : 'danger' }} ml-1"></span>
                                {{ $doctor->status == 1 ? 'Enabled' : 'Not enabled' }}
                            </p>
                        </div>
                        <div class="mb-3">
                            <h5>Birth Date:</h5>
                            <p>{{ $doctor->birth_date }}</p>
                        </div>
                        <div class="mb-3">
                            <h5>Telegram Number:</h5>
                            <p>{{ $doctor->telegram_number == null ? '-' : $doctor->telegram_number }}</p>
                        </div>
                        <div class="mb-3">
                            <h5>Telegram Id:</h5>
                            <p>{{ $doctor->telegram_id == null ? '-' : $doctor->telegram_id }}</p>
                        </div>
                        <div class="mb-3">
                            <h5>Profile Picture:</h5>
                            <p>
                            <div class="row row-xs align-items-center mg-b-20">
                                @if ($doctor->profile_picture)
                                    <img style="border-radius:20%; cursor:pointer;"
                                        src="{{ Url::asset('Dashboard/Attachments/img/' . $doctor->profile_picture) }}"
                                        height="150px" width="150px" alt="" data-toggle="modal"
                                        data-target="#profilePictureModal">
                                @else
                                    -
                                @endif
                            </div>
                            </p>
                        </div>
                        <!-- Profile Picture Modal -->
                        <div class="modal fade" id="profilePictureModal" tabindex="-1" role="dialog"
                            aria-labelledby="profilePictureModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="profilePictureModalLabel">Profile Picture</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <img src="{{ Url::asset('Dashboard/Attachments/img/' . $doctor->profile_picture) }}"
                                            class="img-fluid" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <h5>Id Card Picture:</h5>
                            <p>
                            <div class="row row-xs align-items-center mg-b-20">
                                @if ($doctor->id_card_picture)
                                    <img style="border-radius:20%; cursor:pointer;"
                                        src="{{ Url::asset('Dashboard/Attachments/img/' . $doctor->id_card_picture) }}"
                                        height="150px" width="150px" alt="" data-toggle="modal"
                                        data-target="#idCardPictureModal">
                                @else
                                    -
                                @endif
                            </div>
                            </p>
                        </div>
                        <!-- Id Card Picture Modal -->
                        <div class="modal fade" id="idCardPictureModal" tabindex="-1" role="dialog"
                            aria-labelledby="idCardPictureModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="idCardPictureModalLabel">Id Card Picture</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <img src="{{ Url::asset('Dashboard/Attachments/img/' . $doctor->id_card_picture) }}"
                                            class="img-fluid" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <h5>About Doctor:</h5>
                            <p>{{ $doctor->description }}</p>
                        </div>
                        <div class="mb-3">
                            <h5>Address:</h5>
                            <p>{{ $doctor->address }}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ---------------------------------------- Doctor Files ---------------------------------------- --}}
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">Doctor Certificates</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>

                    <a href="{{ route('Admin.DoctorImages.create', $doctor->id) }}" class="btn btn-primary"
                        role="button" aria-pressed="true">Add
                        certificate</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        @php
                            $counter = 1;
                        @endphp

                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">#</th>
                                    <th class="wd-15p border-bottom-0">Certificate</th>
                                    <th class="wd-15p border-bottom-0">Description</th>
                                    <th class="border-bottom-0">Created At</th>
                                    <th class="border-bottom-0">Processes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($doctorImages as $doctorImage)
                                    <tr>
                                        <td>{{ $counter++ }}</td>
                                        <td>
                                            <img src="{{ Url::asset('Dashboard/Attachments/img/' . $doctorImage->image) }}"
                                                height="150px" width="150px" alt="" data-toggle="modal"
                                                data-target="#certificateModal">

                                            <div class="modal fade" id="certificateModal" tabindex="-1" role="dialog"
                                                aria-labelledby="certificateModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="certificateModalLabel">Certificate
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body text-center">
                                                            <img src="{{ Url::asset('Dashboard/Attachments/img/' . $doctorImage->image) }}"
                                                                class="img-fluid" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ \Str::limit($doctorImage->description, 50) }}</td>
                                        <td>{{ $doctorImage->created_at->diffforhumans() }}</td>
                                        <td>
                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                data-toggle="modal"
                                                href="#delete{{ $doctor->id }}{{ $doctorImage->id }}"><i
                                                    class="las la-trash"></i></a>
                                        </td>
                                    </tr>

                                    @include('Dashboard.Admin.Doctor.Doctor-Image.delete')
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
    <!--Internal Select2 js -->
    <script src="{{ URL::asset('Dashboard/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Form-Dashboard.Doctor.layouts js -->
    <script src="{{ URL::asset('Dashboard/js/form-Dashboard.Doctor.layouts.js') }}"></script>

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
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('Dashboard/js/table-data.js') }}"></script>

    <!--Internal Notify js -->
    <script src="{{ URL::asset('Dashboard/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/notify/js/notifit-custom.js') }}"></script>
@endsection
