@extends('Dashboard.Doctor.layouts.master')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('Dashboard/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Nutritional Facts</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Add article</span>
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
                    <form action="{{ route('Doctor.NutritionalFacts.store') }}" method="post" autocomplete="off"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="pd-30 pd-sm-40 bg-gray-200">
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0" for="fact">Fact</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" placeholder="Enter your fact" type="text" name="fact"
                                        id="fact">
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0" for="description">Description</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0" for="health_category_id">Health Category Name</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <select name="health_category_id" id="health_category_id" class="form-control SlectBox">
                                        <option value="" selected disabled>----</option>
                                        @foreach ($healthCategories as $healthCategory)
                                            <option value="{{ $healthCategory->id }}">{{ $healthCategory->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0" for="illness_id">Illness Name</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <select name="illness_id" id="illness_id" class="form-control SlectBox">
                                        <option value="" selected disabled>----</option>
                                        @foreach ($illnesses as $illness)
                                            <option value="{{ $illness->id }}">{{ $illness->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <button class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5">Submit</button>
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
    <!-- Form-Dashboard.Doctor.layouts js -->
    <script src="{{ URL::asset('Dashboard/js/form-Dashboard.Doctor.layouts.js') }}"></script>
@endsection
