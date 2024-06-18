@extends('Dashboard.User.layouts.master')

@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('Dashboard/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('Dashboard/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('Dashboard/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('Dashboard/plugins/select2/css/select2.min.css') }}" rel="stylesheet">

    <!--Internal Notify -->
    <link href="{{ URL::asset('Dashboard/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
    <style>
        /* تحديد حجم الصور والفيديوهات */
        .card-img-top {
            max-height: 200px;
            /* تحديد أقصى ارتفاع للصورة */
            object-fit: contain;
            /* استخدام contain لضمان عرض الصورة بالكامل بدون قطع */
            background-color: #f0f0f0;
            /* إضافة خلفية للمناطق الفارغة */
        }

        video {
            max-height: 200px;
            width: 100%;
            object-fit: contain;
            /* استخدام contain لضمان عرض الفيديو بالكامل بدون قطع */
            background-color: #f0f0f0;
            /* إضافة خلفية للمناطق الفارغة */
        }
    </style>
    </style>
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Nutritional Facts</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    View all</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <div class="row">
        @foreach ($nutritionalFacts as $fact)
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ $fact->fact }}</div>
                    <div class="card-body">
                        <p>{{ $fact->description }}</p>
                        <!-- Check if fact has files -->
                        @if ($fact->nutritionalFactFiles->isNotEmpty())
                            <div id="carousel{{ $fact->id }}" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($fact->nutritionalFactFiles as $key => $file)
                                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                            @if ($file->type == 1)
                                                <img src="{{ asset('Dashboard/Attachments/img/' . $file->file) }}"
                                                    class="d-block w-100 card-img-top" alt="...">
                                            @elseif ($file->type == 2)
                                                <video controls>
                                                    <source src="{{ asset('Dashboard/Attachments/videos' . $file->file) }}"
                                                        type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#carousel{{ $fact->id }}" role="button"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carousel{{ $fact->id }}" role="button"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        @endif
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Created at: {{ $fact->created_at }}</small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
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
