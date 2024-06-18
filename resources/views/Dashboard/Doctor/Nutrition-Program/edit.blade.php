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
                <h4 class="content-title mb-0 my-auto">Nutrition Programs</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Edit nutrition program</span>
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
                    <form action="{{ route('Doctor.NutritionPrograms.update', 'test') }}" method="post" autocomplete="off"
                        enctype="multipart/form-data">
                        {{ method_field('put') }}
                        @csrf

                        <input name="id" class="form-control" type="hidden" value="{{ $nutritionProgram->id }}">

                        <div class="pd-30 pd-sm-40 bg-gray-200">
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0" for="name">Name</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" placeholder="Enter your name" type="text" name="name"
                                        id="name" value="{{ $nutritionProgram->name }}">
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0" for="description">Description</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $nutritionProgram->description }}</textarea>
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0" for="user_id">User</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <select class="form-control" name="user_id">
                                        <option value="" selected disabled>Patients who have requested nutritional
                                            programs from you</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}"
                                                {{ $user->id == $nutritionProgram->user_id ? 'selected' : '' }}>
                                                {{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0" for="health_category_id">Health Category</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <select class="form-control" name="health_category_id">
                                        <option value="" selected disabled>Choose List</option>
                                        @foreach ($healthCategories as $healthCategory)
                                            <option value="{{ $healthCategory->id }}"
                                                {{ $healthCategory->id == $nutritionProgram->health_category_id ? 'selected' : '' }}>
                                                {{ $healthCategory->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0" for="illness_id">Illness</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <select class="form-control" name="illness_id">
                                        <option value="" selected disabled>Choose List</option>
                                        @foreach ($illnesses as $illness)
                                            <option value="{{ $illness->id }}"
                                                {{ $illness->id == $nutritionProgram->illness_id ? 'selected' : '' }}>
                                                {{ $illness->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0" for="start_date">Start Date</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" type="date" name="start_date" id="start_date"
                                        value="{{ $nutritionProgram->start_date }}">
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0" for="end_date">End Date</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" type="date" name="end_date" id="end_date"
                                        value="{{ $nutritionProgram->end_date }}">
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
