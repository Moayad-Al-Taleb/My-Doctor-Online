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

    <!--Internal Notify -->
    <link href="{{ URL::asset('Dashboard/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <a href="{{ route('User.NutritionPrograms.show', $nutrition_program_id) }}">
                    <h4 class="content-title mb-0 my-auto">Nutrition Program</h4>
                </a><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Show nutrition program meal</span>
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
                        <h3 class="card-title">{{ $nutritionProgramMeal->meal_name }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <h5>Description:</h5>
                            <p> {{ $nutritionProgramMeal->description == null ? '-' : \Str::limit($nutritionProgramMeal->description, 50) }}
                            </p>
                        </div>
                        <div class="mb-3">
                            <h5>Additional Notes:</h5>
                            <p> {{ $nutritionProgramMeal->additional_notes == null ? '-' : \Str::limit($nutritionProgramMeal->additional_notes, 50) }}
                            </p>
                        </div>
                        <div class="mb-3">
                            <h5>Quantity:</h5>
                            <p> {{ $nutritionProgramMeal->quantity }}
                            </p>
                        </div>
                        <div class="mb-3">
                            <h5>Calories:</h5>
                            <p> {{ $nutritionProgramMeal->calories == null ? '-' : \Str::limit($nutritionProgramMeal->calories, 50) }}
                            </p>
                        </div>
                        <div class="mb-3">
                            <h5>Proteins:</h5>
                            <p> {{ $nutritionProgramMeal->proteins == null ? '-' : \Str::limit($nutritionProgramMeal->proteins, 50) }}
                            </p>
                        </div>
                        <div class="mb-3">
                            <h5>Fats:</h5>
                            <p> {{ $nutritionProgramMeal->fats == null ? '-' : \Str::limit($nutritionProgramMeal->fats, 50) }}
                            </p>
                        </div>
                        <div class="mb-3">
                            <h5>Carbohydrates:</h5>
                            <p> {{ $nutritionProgramMeal->carbohydrates == null ? '-' : \Str::limit($nutritionProgramMeal->carbohydrates, 50) }}
                            </p>
                        </div>
                        <div class="mb-3">
                            <h5>Meal Type:</h5>
                            <p> {{ $nutritionProgramMeal->meal_type == null ? '-' : \Str::limit($nutritionProgramMeal->meal_type, 50) }}
                            </p>
                        </div>
                        <div class="mb-3">
                            <h5>Meal Time:</h5>
                            <p> {{ $nutritionProgramMeal->meal_time == null ? '-' : \Str::limit($nutritionProgramMeal->meal_time, 50) }}
                            </p>
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

    <!--Internal Notify js -->
    <script src="{{ URL::asset('Dashboard/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/notify/js/notifit-custom.js') }}"></script>
@endsection
