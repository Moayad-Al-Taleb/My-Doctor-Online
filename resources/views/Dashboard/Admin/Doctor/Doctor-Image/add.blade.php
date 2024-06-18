@extends('Dashboard.Admin.layouts.master')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('Dashboard/plugins/select2/css/select2.min.css') }}" rel="stylesheet">

    <style>
        /* تحديد خصائص العنصر الذي يحمل العرض المسبق للملف (صورة أو فيديو) */
        .preview-container {
            overflow: hidden;
            /* إخفاء أي محتوى يتجاوز حجم العنصر */
            display: flex;
            /* تعيين العناصر ليكونوا في صف واحد */
            justify-content: center;
            /* توسيط المحتوى أفقيًا داخل العنصر */
            align-items: center;
            /* توسيط المحتوى عموديًا داخل العنصر */
            background-color: #f1f1f1;
            /* تحديد لون الخلفية للعنصر */
        }

        /* تحديد خصائص الصورة أو الفيديو داخل العنصر الذي يحمل العرض المسبق */
        .preview-container img {
            max-width: 100%;
            /* تحديد أقصى عرض للصورة أو الفيديو */
            max-height: 100%;
            /* تحديد أقصى ارتفاع للصورة أو الفيديو */
            border-radius: 50%;
            /* جعل الإطار دائريًا */
            object-fit: cover;
            /* تحديد كيفية تغطية المساحة داخل العنصر */
        }
    </style>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Doctor Certificates</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Add doctor Certificate</span>
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
                    <form action="{{ route('Admin.DoctorImages.store') }}" method="post" autocomplete="off"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="pd-30 pd-sm-40 bg-gray-200">

                            <div class="row row-xs align-items-center mg-b-20">
                                <input type="hidden" name="doctor_id" value="{{ $doctor_id }}">

                                <div class="col-md-4">
                                    <label for="description" class="form-label mg-b-0">Description</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label for="image" class="form-label mg-b-0">Certificate</label>
                                </div>
                                <div class="col-md-8 d-flex align-items-center mg-t-5 mg-md-t-0">
                                    <input name="image" id="image" type="file" accept="image/*"
                                        onchange="loadFile(event, 'output')">

                                    <div class="preview-container" style="border-radius: 50%; width: 150px; height: 150px;">
                                        <img class="preview-img" id="output" />
                                    </div>
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

    <script>
        // تعريف الدالة loadFile لتحميل ملف الصورة وعرضها
        var loadFile = function(event, outputId) {
            // الحصول على العنصر <img> الذي سيتم عرض الصورة فيه
            var output = document.getElementById(outputId);

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
