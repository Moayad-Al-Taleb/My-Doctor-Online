@extends('Dashboard.User.layouts.master')
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
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <a href="{{ route('User.Doctors.index') }}">
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
    <div class="row">
        <div class="col-md-12">
            <h4>Certificates</h4>
        </div>
    </div>

    <div class="row row-sm">
        @foreach ($doctorImages as $doctorImage)
            <div class="col-xl-4 col-lg-4 col-md-12">
                <div class="card text-center">
                    <img class="card-img-top" src="{{ Url::asset('Dashboard/Attachments/img/' . $doctorImage->image) }}"
                        alt="Doctor Image" style="height: 200px; object-fit: contain; border-radius: 50%;"
                        data-toggle="modal" data-target="#certificateModal">
                    <div class="modal fade" id="certificateModal" tabindex="-1" role="dialog"
                        aria-labelledby="certificateModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="certificateModalLabel">Certificate
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                    <div class="card-body">
                        <p class="card-text">{{ \Str::limit($doctorImage->description, 200) }}</p>
                    </div>
                </div>
            </div>
        @endforeach
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
@endsection
