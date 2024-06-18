@extends('Dashboard.User.layouts.master')
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
                <h4 class="content-title mb-0 my-auto">Nutrition Programs</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/
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
                                    <th class="border-bottom-0">Doctor Name</th>
                                    <th class="border-bottom-0">Name</th>
                                    <th class="border-bottom-0">Description</th>
                                    <th class="border-bottom-0">Health Category Name</th>
                                    <th class="border-bottom-0">Illness Name</th>
                                    <th class="border-bottom-0">Strat Date</th>
                                    <th class="border-bottom-0">End Date</th>
                                    <th class="border-bottom-0">Processes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($nutritionPrograms as $nutritionProgram)
                                    <tr>
                                        <td>{{ $counter++ }}</td>
                                        <td><a
                                                href="{{ route('User.Doctors.show', $nutritionProgram->doctor->id) }}"><b>{{ $nutritionProgram->doctor->name }}</b></a>
                                        </td>
                                        <td>{{ $nutritionProgram->name }}</td>
                                        <td>{{ \Str::limit($nutritionProgram->description, 50) }}</td>
                                        <td>
                                            {{ $nutritionProgram->healthCategory->name == null ? '-' : $nutritionProgram->healthCategory->name }}
                                        </td>
                                        <td>
                                            {{ $nutritionProgram->illness->name == null ? '-' : $nutritionProgram->illness->name }}
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($nutritionProgram->start_date)->diffForHumans() }}
                                        <td>{{ \Carbon\Carbon::parse($nutritionProgram->end_date)->diffForHumans() }}
                                        <td>
                                            <div class="dropdown">
                                                <!-- زر لفتح القائمة المنسدلة -->
                                                <button aria-expanded="false" aria-haspopup="true"
                                                    class="btn ripple btn-outline-primary btn-sm" data-toggle="dropdown"
                                                    type="button">Processes<i class="fas fa-caret-down mr-1"></i></button>
                                                <!-- القائمة المنسدلة -->
                                                <div class="dropdown-menu tx-13">
                                                    <!-- رابط لعرض بيانات -->
                                                    <a class="dropdown-item"
                                                        href="{{ route('User.NutritionPrograms.show', $nutritionProgram->id) }}">
                                                        <i style="color: #0ba360" <i
                                                            class="text-info ti-eye"></i>&nbsp;&nbsp;Show data
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    @include('Dashboard.Doctor.Nutrition-Program.delete')
                                    @include('Dashboard.Doctor.Nutrition-Program.delete_select')
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
