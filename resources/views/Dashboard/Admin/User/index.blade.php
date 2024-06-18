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
                <h4 class="content-title mb-0 my-auto">Users</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
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
                <div class="card-header pb-0">
                    <button type="button" class="btn btn-danger" id="btn_delete_all">Delete select</button>

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
                                    <th class="border-bottom-0">Profile Picture</th>
                                    <th class="border-bottom-0">Name</th>
                                    <th class="border-bottom-0">email</th>
                                    <th class="border-bottom-0">Status</th>
                                    <th class="border-bottom-0">Birth Date</th>
                                    <th class="border-bottom-0">Telegram Number</th>
                                    <th class="border-bottom-0">Created At</th>
                                    <th class="border-bottom-0">Processes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $counter++ }}</td>
                                        <td><input type="checkbox" name="delete_select" id="example-select-all"
                                                value="{{ $user->id }}"></td>
                                        <td>
                                            @if ($user->profile_picture)
                                                <img src="{{ Url::asset('Dashboard/Attachments/img/' . $user->profile_picture) }}"
                                                    height="100px" width="100px" alt="">
                                            @else
                                                <img src="{{ Url::asset('Dashboard/img/UserDefault.png') }}" height="75px"
                                                    width="75px" alt="">
                                            @endif
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <div class="dot-label bg-{{ $user->status == 1 ? 'success' : 'danger' }} ml-1">
                                            </div>
                                            {{-- {{ $user->status == 1 ? 'Enabled' : 'Not enabled' }} --}}
                                        </td>
                                        <td>{{ $user->birth_date }}</td>
                                        <td>
                                            {{ $user->telegram_number == null ? '-' : $user->telegram_number }}
                                        </td>
                                        <td>{{ $user->created_at->diffforhumans() }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <!-- زر لفتح القائمة المنسدلة -->
                                                <button aria-expanded="false" aria-haspopup="true"
                                                    class="btn ripple btn-outline-primary btn-sm" data-toggle="dropdown"
                                                    type="button">Processes<i class="fas fa-caret-down mr-1"></i></button>
                                                <!-- القائمة المنسدلة -->
                                                <div class="dropdown-menu tx-13">
                                                    <!-- رابط لتغيير حالة -->
                                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                                        data-target="#update_status{{ $user->id }}">
                                                        <i class="text-warning ti-back-right"></i>&nbsp;&nbsp;Status change
                                                    </a>
                                                    <!-- رابط لتغيير كلمة المرور -->
                                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                                        data-target="#update_password{{ $user->id }}">
                                                        <i class="text-warning ti-key"></i>&nbsp;&nbsp;Password change
                                                    </a>
                                                    <!-- رابط لحذف بيانات -->
                                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                                        data-target="#delete{{ $user->id }}">
                                                        <i class="text-danger ti-trash"></i>&nbsp;&nbsp;Delete data
                                                    </a>
                                                    <!-- رابط لعرض بيانات -->
                                                    <a class="dropdown-item"
                                                        href="{{ route('Admin.Users.show', $user->id) }}">
                                                        <i style="color: #0ba360" <i
                                                            class="text-info ti-eye"></i>&nbsp;&nbsp;Show data
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    @include('Dashboard.Admin.User.delete')
                                    @include('Dashboard.Admin.User.update_password')
                                    @include('Dashboard.Admin.User.update_status')
                                    @include('Dashboard.Admin.User.delete_select')
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
