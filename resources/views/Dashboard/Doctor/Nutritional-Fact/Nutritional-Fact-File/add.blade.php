@extends('Dashboard.Doctor.layouts.master')
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
        .preview-container img,
        .preview-container video {
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
                <h4 class="content-title mb-0 my-auto">Nutritional Fact Files</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Add nutritional fact</span>
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
                    <form action="{{ route('Doctor.NutritionalFactFiles.store') }}" method="post" autocomplete="off"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="pd-30 pd-sm-40 bg-gray-200">
                            <div class="row row-xs align-items-center mg-b-20">
                                <input type="hidden" name="nutritional_fact_id" value="{{ $nutritional_fact_id }}">

                                <div class="col-md-4">
                                    <label for="file" class="form-label mg-b-0">File</label>
                                </div>

                                <div class="col-md-8 d-flex align-items-center mg-t-5 mg-md-t-0">
                                    <input name="file" id="file" type="file" accept="image/*,video/*">
                                    <div id="preview" class="preview-container"
                                        style="border-radius: 50%; width: 150px; height: 150px;"></div>
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
        // تعليق عن الكود
        // يتم استدعاء هذه الدالة عندما يتغير الملف المحدد في عنصر input من نوع file
        document.getElementById('file').addEventListener('change', function() {
            // يتم الحصول على الملف المحدد
            var file = this.files[0];
            // يتم الحصول على نوع الملف
            var fileType = file.type;
            // يتم إنشاء كائن FileReader
            var reader = new FileReader();

            // يتم تعيين دالة التحميل للكائن FileReader
            reader.onload = function(e) {
                // إذا كان الملف نوعه صورة
                if (fileType.includes('image')) {
                    // يتم عرض الصورة في عنصر img بناء على النتيجة المحملة
                    document.getElementById('preview').innerHTML = '<img src="' + e.target.result + '" />';
                } else if (fileType.includes('video')) {
                    // إذا كان الملف نوعه فيديو
                    // يتم عرض الفيديو في عنصر video مع أزرار التحكم بناء على النتيجة المحملة
                    document.getElementById('preview').innerHTML = '<video controls><source src="' + e.target
                        .result + '" type="' + fileType + '"></video>';
                }
            };

            // يتم قراءة الملف المحدد كنص بصيغة URL مؤقتة
            reader.readAsDataURL(file);
        });
    </script>
@endsection
