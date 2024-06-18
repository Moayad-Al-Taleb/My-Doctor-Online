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
                <a href="{{ route('User.NutritionPrograms.index') }}">
                    <h4 class="content-title mb-0 my-auto">Nutrition Programs</h4>
                </a><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Show nutrition program</span>
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
                        <h3 class="card-title">{{ $nutritionProgram->name }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <h5>Description:</h5>
                            <p> {{ $nutritionProgram->description }} </p>
                        </div>
                        <div class="mb-3">
                            <h5>Health Category Name:</h5>
                            <p> {{ $nutritionProgram->healthCategory->name }} </p>
                        </div>
                        <div class="mb-3">
                            <h5>Illness Name:</h5>
                            <p> {{ $nutritionProgram->healthCategory->name }} </p>
                        </div>
                        <div class="mb-3">
                            <h5>Illness Name:</h5>
                            <p> {{ $nutritionProgram->user->name }} </p>
                        </div>
                        <div class="mb-3">
                            <h5>Start Date:</h5>
                            <p>{{ \Carbon\Carbon::parse($nutritionProgram->start_date)->diffForHumans() }}</p>
                        </div>
                        <div class="mb-3">
                            <h5>End Date:</h5>
                            <p>{{ \Carbon\Carbon::parse($nutritionProgram->end_date)->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ---------------------------------------- Program details ---------------------------------------- --}}
    <div class="row">
        <div class="col-md-12">
            <h4>Program details</h4>
        </div>
    </div>

    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="table-responsive">

                        @php
                            $counter = 1;
                        @endphp

                        <table id="example" class="table key-buttons text-md-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">Meal Name</th>
                                    <th class="border-bottom-0">Description</th>
                                    <th class="border-bottom-0">Quantity</th>
                                    <th class="border-bottom-0">Meal Time</th>
                                    <th class="border-bottom-0">Processes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($nutritionProgramMeals as $nutritionProgramMeal)
                                    <tr>
                                        <td>{{ $counter++ }}</td>
                                        <th class="border-bottom-0">{{ $nutritionProgramMeal->meal_name }}</th>
                                        <th class="border-bottom-0">
                                            {{ $nutritionProgramMeal->description == null ? '-' : \Str::limit($nutritionProgramMeal->description, 50) }}
                                        </th>
                                        <th class="border-bottom-0">{{ \Str::limit($nutritionProgramMeal->quantity, 50) }}
                                        </th>
                                        <th class="border-bottom-0">
                                            {{ $nutritionProgramMeal->meal_time == null ? '-' : $nutritionProgramMeal->meal_time }}
                                        </th>
                                        <td>
                                            <!-- رابط لعرض بيانات -->
                                            <a class="modal-effect btn btn-sm btn-primary"
                                                href="{{ route('User.NutritionProgramMeals.show', ['NutritionProgram' => $nutritionProgram->id, 'NutritionProgramMeal' => $nutritionProgramMeal->id]) }}"><i
                                                    class="las la-eye"></i></a>
                                        </td>
                                    </tr>

                                    @include('Dashboard.Doctor.Nutrition-Program.Nutrition-Program-Meal.delete')
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
