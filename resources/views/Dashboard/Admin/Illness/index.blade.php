@extends('Dashboard.Admin.layouts.master')
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
                <h4 class="content-title mb-0 my-auto">{{ trans('Dashboard/admin/pages/illnesses_trans.illnesses') }}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    {{ trans('Dashboard/admin/pages/illnesses_trans.view_all') }}</span>
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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
                            {{ trans('Dashboard/admin/pages/illnesses_trans.add_illness') }}
                        </button>
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
                                    <th class="wd-15p border-bottom-0">
                                        {{ trans('Dashboard/admin/pages/illnesses_trans.name') }}</th>
                                    <th class="wd-15p border-bottom-0">
                                        {{ trans('Dashboard/admin/pages/illnesses_trans.description') }}</th>
                                    <th class="wd-15p border-bottom-0">
                                        {{ trans('Dashboard/admin/pages/illnesses_trans.created_at') }}</th>
                                    <th class="wd-15p border-bottom-0">
                                        {{ trans('Dashboard/admin/pages/illnesses_trans.processes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($illnesses as $illness)
                                    <tr>
                                        <td>{{ $counter++ }}</td>
                                        <td>{{ $illness->name }}</td>
                                        <td>{{ \Str::limit($illness->description, 50) }}</td>
                                        <td>{{ $illness->created_at->diffforhumans() }}</td>
                                        <td>
                                            <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                data-toggle="modal" href="#edit{{ $illness->id }}"><i
                                                    class="las la-pen"></i></a>
                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                data-toggle="modal" href="#delete{{ $illness->id }}"><i
                                                    class="las la-trash"></i></a>
                                            <a class="modal-effect btn btn-sm btn-primary" data-effect="effect-scale"
                                                data-toggle="modal" href="#show{{ $illness->id }}">
                                                <i class="las la-eye"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    @include('Dashboard.Admin.Illness.edit')
                                    @include('Dashboard.Admin.Illness.delete')
                                    @include('Dashboard.Admin.Illness.show')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('Dashboard.Admin.Illness.add')

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
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('Dashboard/js/table-data.js') }}"></script>
    <!--Internal Notify js -->
    <script src="{{ URL::asset('Dashboard/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/notify/js/notifit-custom.js') }}"></script>

    <script>
        // تعريف الدالة loadFile لتحميل ملف الصورة وعرضها
        var loadFile = function(event) {
            // الحصول على العنصر <img> الذي سيتم عرض الصورة فيه
            var output = document.getElementById('output');

            // تعيين مصدر الصورة إلى ملف الصورة المحملة
            output.src = URL.createObjectURL(event.target.files[0]);

            // عندما يتم تحميل الصورة في <img>
            output.onload = function() {
                // تحرير الذاكرة المستخدمة لتخزين عنوان URL المؤقت
                URL.revokeObjectURL(output.src);
            }
        };
    </script>
@endsection
