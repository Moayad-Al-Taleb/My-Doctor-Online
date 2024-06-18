@extends('Dashboard.Admin.layouts.master')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('Dashboard/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('Dashboard/admin/pages/articles_trans.articles') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    {{ trans('Dashboard/admin/pages/articles_trans.edit_article') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @include('Dashboard.messages_alert')

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('Admin.Articles.update', 'test') }}" method="post" autocomplete="off"
                        enctype="multipart/form-data">
                        {{ method_field('put') }}
                        @csrf

                        <input name="id" class="form-control" type="hidden" value="{{ $article->id }}">

                        <div class="pd-30 pd-sm-40 bg-gray-200">
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0"
                                        for="name">{{ trans('Dashboard/admin/pages/articles_trans.name') }}</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" placeholder="" type="text" name="name" id="name"
                                        value="{{ $article->name }}">
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0"
                                        for="description">{{ trans('Dashboard/admin/pages/articles_trans.description') }}</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $article->description }}</textarea>
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0"
                                        for="description">{{ trans('Dashboard/admin/pages/articles_trans.content') }}</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <textarea name="content" id="content" cols="30" rows="30" class="form-control">{{ $article->content }}</textarea>
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0"
                                        for="health_category_id">{{ trans('Dashboard/admin/pages/articles_trans.health_category_name') }}</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <select name="health_category_id" id="health_category_id" class="form-control SlectBox">
                                        <option value="" selected>----</option>
                                        @foreach ($healthCategories as $healthCategory)
                                            <option value="{{ $healthCategory->id }}"
                                                {{ $healthCategory->id == $article->health_category_id ? 'selected' : '' }}>
                                                {{ $healthCategory->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0"
                                        for="illness_id">{{ trans('Dashboard/admin/pages/articles_trans.illness_name') }}</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <select name="illness_id" id="illness_id" class="form-control SlectBox">
                                        <option value="" selected>----</option>
                                        @foreach ($illnesses as $illness)
                                            <option value="{{ $illness->id }}"
                                                {{ $illness->id == $article->illness_id ? 'selected' : '' }}>
                                                {{ $illness->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <button
                                class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5">{{ trans('Dashboard/admin/pages/articles_trans.submit') }}</button>
                        </div>

                    </form>
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
@endsection
