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
                <a href="{{ route('Admin.Articles.index') }}">
                    <h4 class="content-title mb-0 my-auto">{{ trans('Dashboard/admin/pages/articles_trans.articles') }}</h4>
                </a><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    {{ trans('Dashboard/admin/pages/articles_trans.show_articles') }}</span>
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
                        <h3 class="card-title">{{ $article->name }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <h5>{{ trans('Dashboard/admin/pages/articles_trans.description') }}:</h5>
                            <p>{{ $article->description }}</p>
                        </div>
                        <div class="mb-3">
                            <h5>{{ trans('Dashboard/admin/pages/articles_trans.content') }}:</h5>
                            <p>{{ $article->content }}</p>
                        </div>
                        <div class="mb-3">
                            <h5>{{ trans('Dashboard/admin/pages/articles_trans.health_category_name') }}:</h5>
                            <p>{{ $article->healthCategory == null ? '-' : $article->healthCategory->name }}</p>
                        </div>
                        <div class="mb-3">
                            <h5>{{ trans('Dashboard/admin/pages/articles_trans.illness') }}:</h5>
                            <p>{{ $article->illness == null ? '-' : $article->illness->name }}</p>
                        </div>
                        <div class="mb-3">
                            <h5>{{ trans('Dashboard/admin/pages/articles_trans.doctor_name') }}:</h5>
                            <p>{{ $article->doctor->name }}</p>
                        </div>
                        <div class="mb-3">
                            <h5>{{ trans('Dashboard/admin/pages/articles_trans.status') }}:</h5>
                            <p>
                                <span class="dot-label bg-{{ $article->status == 1 ? 'success' : 'danger' }} ml-1"></span>
                                {{ $article->status == 1 ? 'Enabled' : 'Not enabled' }}
                            </p>
                        </div>
                        <div class="mb-3">
                            <h5>{{ trans('Dashboard/admin/pages/articles_trans.Created_at') }}:</h5>
                            <p>{{ $article->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ---------------------------------------- Article Files ---------------------------------------- --}}

    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">{{ trans('Dashboard/admin/pages/articles_trans.article_files') }}
                        </h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
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
                                    <th class="wd-15p border-bottom-0">#</th>
                                    <th class="wd-15p border-bottom-0">
                                        {{ trans('Dashboard/admin/pages/articles_trans.file') }}</th>
                                    <th class="wd-15p border-bottom-0">
                                        {{ trans('Dashboard/admin/pages/articles_trans.type') }}</th>
                                    <th class="border-bottom-0">
                                        {{ trans('Dashboard/admin/pages/articles_trans.Created_at') }}</th>
                                    <th class="border-bottom-0">
                                        {{ trans('Dashboard/admin/pages/articles_trans.processes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($articleFiles as $articleFile)
                                    <tr>
                                        <td>{{ $counter++ }}</td>
                                        <td>
                                            @if ($articleFile->type == 1)
                                                <img src="{{ Url::asset('Dashboard/Attachments/img/' . $articleFile->file) }}"
                                                    height="150px" width="150px" alt="" data-toggle="modal"
                                                    data-target="#fileModal">

                                                <div class="modal fade" id="fileModal" tabindex="-1" role="dialog"
                                                    aria-labelledby="fileModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="fileModalLabel">
                                                                    {{ trans('Dashboard/admin/pages/articles_trans.file') }}
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                <img src="{{ Url::asset('Dashboard/Attachments/img/' . $articleFile->file) }}"
                                                                    class="img-fluid" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <video
                                                    src="{{ asset('Dashboard/Attachments/videos/' . $articleFile->file) }}"
                                                    width="150px" height="150px" controls>
                                                    {{ trans('Dashboard/admin/pages/articles_trans.your_browser_does_not_support_the_video_tag') }}
                                                </video>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $articleFile->type == 1 ? 'Image' : 'Video' }}
                                        </td>
                                        <td>{{ $articleFile->created_at->diffforhumans() }}</td>
                                        <td>
                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                data-toggle="modal"
                                                href="#delete{{ $article->id }}{{ $articleFile->id }}"><i
                                                    class="las la-trash"></i></a>
                                        </td>
                                    </tr>

                                    @include('Dashboard.Admin.Article.Article-File.delete')
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
    <!-- Form-Dashboard.Admin.layouts js -->
    <script src="{{ URL::asset('Dashboard/js/form-Dashboard.Admin.layouts.js') }}"></script>

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
