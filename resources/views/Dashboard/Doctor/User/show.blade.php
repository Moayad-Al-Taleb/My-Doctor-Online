@extends('Dashboard.Doctor.layouts.master')
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
                <a href="{{ route('Doctor.Appointments.index', Auth::id()) }}">
                    <h4 class="content-title mb-0 my-auto">My Appointments</h4>
                </a><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Show user</span>
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
                        <h3 class="card-title">{{ $user->name }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <h5>Email:</h5>
                            <p>{{ $user->email }}</p>
                        </div>
                        <div class="mb-3">
                            <h5>Birth Date:</h5>
                            <p>{{ $user->birth_date }}</p>
                        </div>
                        <div class="mb-3">
                            <h5>Telegram Number:</h5>
                            <p>{{ $user->telegram_number == null ? '-' : $user->telegram_number }}</p>
                        </div>
                        <div class="mb-3">
                            <h5>Telegram Id:</h5>
                            <p>{{ $user->telegram_id == null ? '-' : $user->telegram_id }}</p>
                        </div>
                        <div class="mb-3">
                            <h5>Profile Picture:</h5>
                            <p>
                            <div class="row row-xs align-items-center mg-b-20">
                                @if ($user->profile_picture)
                                    <img style="border-radius:20%; cursor:pointer;"
                                        src="{{ Url::asset('Dashboard/Attachments/img/' . $user->profile_picture) }}"
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
                                        <img src="{{ Url::asset('Dashboard/Attachments/img/' . $user->profile_picture) }}"
                                            class="img-fluid" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <h5>Id Card Picture:</h5>
                            <p>
                            <div class="row row-xs align-items-center mg-b-20">
                                @if ($user->id_card_picture)
                                    <img style="border-radius:20%; cursor:pointer;"
                                        src="{{ Url::asset('Dashboard/Attachments/img/' . $user->id_card_picture) }}"
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
                                        <img src="{{ Url::asset('Dashboard/Attachments/img/' . $user->id_card_picture) }}"
                                            class="img-fluid" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <h5>Height:</h5>
                            <p>
                                @if (App::getLocale() == 'ar')
                                    {{ $user->height === null ? '-' : $user->height }} سم
                                @else
                                    {{ $user->height === null ? '-' : $user->height }} cm
                                @endif
                            </p>
                        </div>
                        <div class="mb-3">
                            <h5>Weight:</h5>
                            <p>
                                @if (App::getLocale() == 'ar')
                                    {{ $user->weight === null ? '-' : $user->weight }} كغ
                                @else
                                    {{ $user->weight === null ? '-' : $user->weight }} kg
                                @endif
                            </p>
                        </div>
                        <div class="mb-3">
                            <h5>Gender:</h5>
                            <p>
                                @if (App::getLocale() == 'ar')
                                    {{ $user->gender === null ? '-' : ($user->gender == 0 ? 'ذكر' : 'أنثى') }}
                                @else
                                    {{ $user->gender === null ? '-' : ($user->gender == 0 ? 'male' : 'female') }}
                                @endif
                            </p>
                        </div>
                        <div class="mb-3">
                            <h5>Address:</h5>
                            <p>{{ $user->address == null ? '-' : $user->address }}</p>
                        </div>
                        <div class="mb-3">
                            <h5>Blood Type:</h5>
                            <p>{{ $user->blood_type == null ? '-' : $user->blood_type }}</p>
                        </div>
                        <div class="mb-3">
                            <h5>Medical Conditions:</h5>
                            <p>{{ $user->medical_conditions == null ? '-' : $user->medical_conditions }}</p>
                        </div>
                        <div class="mb-3">
                            <h5>Dietary Restrictions:</h5>
                            <p>{{ $user->dietary_restrictions == null ? '-' : $user->dietary_restrictions }}</p>
                        </div>
                        <div class="mb-3">
                            <h5>Occupation:</h5>
                            <p>{{ $user->occupation == null ? '-' : $user->occupation }}</p>
                        </div>
                        <div class="mb-3">
                            <h5>Physical Activity Level:</h5>
                            <p>{{ $user->physical_activity_level == null ? '-' : $user->physical_activity_level }}</p>
                        </div>
                        <div class="mb-3">
                            <h5>Goal:</h5>
                            <p>{{ $user->goal == null ? '-' : $user->goal }}</p>
                        </div>
                        <div class="mb-3">
                            <h5>Food Preferences:</h5>
                            <p>{{ $user->food_preferences == null ? '-' : $user->food_preferences }}</p>
                        </div>
                        <div class="mb-3">
                            <h5>Chronic Diseases:</h5>
                            <p>{{ $user->chronic_diseases == null ? '-' : $user->chronic_diseases }}</p>
                        </div>
                        <div class="mb-3">
                            <h5>Current Medications:</h5>
                            <p>{{ $user->current_medications == null ? '-' : $user->current_medications }}</p>
                        </div>
                        <div class="mb-3">
                            <h5>Smoking Status:</h5>
                            <p>{{ $user->smoking_status == null ? '-' : $user->smoking_status }}</p>
                        </div>
                        <div class="mb-3">
                            <h5>Alcohol Consumption:</h5>
                            <p>{{ $user->alcohol_consumption == null ? '-' : $user->alcohol_consumption }}</p>
                        </div>
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
@endsection
