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
                <h4 class="content-title mb-0 my-auto">{{ trans('Dashboard/admin/pages/articles_trans.articles') }}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    {{ trans('Dashboard/admin/pages/articles_trans.view_all') }}</span>
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
                <div class="card-header pb-0">

                    <button type="button" class="btn btn-danger"
                        id="btn_delete_all">{{ trans('Dashboard/admin/pages/articles_trans.delete_select') }}</button>

                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        @php
                            $counter = 1;
                        @endphp

                        <table id="example" class="table key-buttons text-md-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th><input type="checkbox" name="select_all" id="example-select-all"></th>
                                    <th class="border-bottom-0">{{ trans('Dashboard/admin/pages/articles_trans.name') }}
                                    </th>
                                    <th class="border-bottom-0">
                                        {{ trans('Dashboard/admin/pages/articles_trans.description') }}</th>
                                    <th class="border-bottom-0">
                                        {{ trans('Dashboard/admin/pages/articles_trans.health_category_name') }}</th>
                                    <th class="border-bottom-0">
                                        {{ trans('Dashboard/admin/pages/articles_trans.illness_name') }}</th>
                                    <th class="border-bottom-0">
                                        {{ trans('Dashboard/admin/pages/articles_trans.doctor_name') }}</th>
                                    <th class="border-bottom-0">{{ trans('Dashboard/admin/pages/articles_trans.status') }}
                                    </th>
                                    <th class="border-bottom-0">
                                        {{ trans('Dashboard/admin/pages/articles_trans.Created_at') }}</th>
                                    <th class="border-bottom-0">
                                        {{ trans('Dashboard/admin/pages/articles_trans.processes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($articles as $article)
                                    <tr>
                                        <td>{{ $counter++ }}</td>
                                        <td><input type="checkbox" name="delete_select" id="example-select-all"
                                                value="{{ $article->id }}"></td>
                                        <td>{{ $article->name }}</td>
                                        <td>{{ \Str::limit($article->description, 50) }}</td>
                                        <td>
                                            {{ $article->healthCategory == null ? '-' : $article->healthCategory->name }}
                                        </td>
                                        <td>
                                            {{ $article->illness == null ? '-' : $article->illness->name }}
                                        </td>
                                        <td>{{ $article->doctor->name }}</td>
                                        <td>
                                            <div
                                                class="dot-label bg-{{ $article->status == 1 ? 'success' : 'danger' }} ml-1">
                                            </div>
                                            {{-- {{ $article->status == 1 ? 'Enabled' : 'Not enabled' }} --}}
                                        </td>
                                        <td>{{ $article->created_at->diffforhumans() }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <!-- زر لفتح القائمة المنسدلة -->
                                                <button aria-expanded="false" aria-haspopup="true"
                                                    class="btn ripple btn-outline-primary btn-sm" data-toggle="dropdown"
                                                    type="button">{{ trans('Dashboard/admin/pages/articles_trans.processes') }}<i
                                                        class="fas fa-caret-down mr-1"></i></button>
                                                <!-- القائمة المنسدلة -->
                                                <div class="dropdown-menu tx-13">
                                                    <!-- رابط لتعديل بيانات -->
                                                    <a class="dropdown-item"
                                                        href="{{ route('Admin.Articles.edit', $article->id) }}">
                                                        <i style="color: #0ba360"
                                                            class="text-success ti-user"></i>&nbsp;&nbsp;{{ trans('Dashboard/admin/pages/articles_trans.edit') }}
                                                    </a>
                                                    <!-- رابط لتغيير حالة -->
                                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                                        data-target="#update_status{{ $article->id }}">
                                                        <i
                                                            class="text-warning ti-back-right"></i>&nbsp;&nbsp;{{ trans('Dashboard/admin/pages/articles_trans.status_change') }}
                                                    </a>
                                                    <!-- رابط لحذف بيانات -->
                                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                                        data-target="#delete{{ $article->id }}">
                                                        <i
                                                            class="text-danger ti-trash"></i>&nbsp;&nbsp;{{ trans('Dashboard/admin/pages/articles_trans.delete_data') }}
                                                    </a>
                                                    <!-- رابط لعرض بيانات -->
                                                    <a class="dropdown-item"
                                                        href="{{ route('Admin.Articles.show', $article->id) }}">
                                                        <i style="color: #0ba360" <i
                                                            class="text-info ti-eye"></i>&nbsp;&nbsp;{{ trans('Dashboard/admin/pages/articles_trans.show_data') }}
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    @include('Dashboard.Admin.Article.delete')
                                    @include('Dashboard.Admin.Article.update_status')
                                    @include('Dashboard.Admin.Article.delete_select')
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

    <script>
        // عند تحميل الصفحة بالكامل
        $(function() {
            // عند النقر على العنصر الذي يحمل الاسم "select_all"
            jQuery("[name=select_all]").click(function(source) {
                // الحصول على جميع العناصر التي تحمل الاسم "delete_select"
                checkboxes = jQuery("[name=delete_select]");
                // تكرار على جميع العناصر وتحديث حالة الاختيار بناءً على حالة الزر "select_all"
                for (var i in checkboxes) {
                    checkboxes[i].checked = source.target.checked;
                }
            });
        })
    </script>

    <script type="text/javascript">
        // عند تحميل الصفحة بالكامل
        $(function() {
            // عند النقر على العنصر الذي يحمل المعرف "btn_delete_all"
            $("#btn_delete_all").click(function() {
                // إنشاء مصفوفة لتخزين القيم المحددة
                var selected = [];
                // الحصول على جميع المدخلات المحددة التي تحمل الاسم "delete_select" داخل العنصر الذي يحمل المعرف "example"
                $("#example input[name=delete_select]:checked").each(function() {
                    // إضافة قيمة المدخل المحدد إلى المصفوفة
                    selected.push(this.value);
                });

                // إذا كانت هناك عناصر محددة
                if (selected.length > 0) {
                    // عرض النافذة المنبثقة التي تحمل المعرف "delete_select"
                    $('#delete_select').modal('show')
                    // تعيين قيم العناصر المحددة إلى المدخل الذي يحمل المعرف "delete_select_id"
                    $('input[id="delete_select_id"]').val(selected);
                }
            });
        });
    </script>
@endsection
