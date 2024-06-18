@extends('Dashboard.User.layouts.master')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('Dashboard/plugins/select2/css/select2.min.css') }}" rel="stylesheet">

    <!--Internal Notify -->
    <link href="{{ URL::asset('Dashboard/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />

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
                <h4 class="content-title mb-0 my-auto">My Profile</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Edit profile</span>
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

                    <p class="mg-b-20">Please, after entering the data in either English or Arabic, switch the website
                        language to the other one, and re-enter the data to display your information in both languages.
                        Thank you!</p>

                    <form action="{{ route('User.Users.update', 'test') }}" method="post" autocomplete="off"
                        enctype="multipart/form-data">
                        {{ method_field('put') }}
                        @csrf

                        <input name="id" class="form-control" type="hidden" value="{{ $user->id }}">

                        <div class="pd-30 pd-sm-40 bg-gray-200">

                            <div class="row row-xs align-items-center mg-b-20">
                                @if ($user->profile_picture)
                                    <img style="border-radius:20%"
                                        src="{{ Url::asset('Dashboard/Attachments/img/' . $user->profile_picture) }}"
                                        height="150px" width="150px" alt="">
                                @endif
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                @if ($user->id_card_picture)
                                    <img style="border-radius:20%"
                                        src="{{ Url::asset('Dashboard/Attachments/img/' . $user->id_card_picture) }}"
                                        height="150px" width="150px" alt="">
                                @endif
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0" for="name">Name</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" placeholder="Enter your name" type="text" name="name"
                                        id="name" value="{{ $user->name }}">
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0" for="email">Email</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" placeholder="Enter your email" type="email" name="email"
                                        id="email" value="{{ $user->email }}">
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0" for="birth_date">BirthDate</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" type="date" name="birth_date" id="birth_date"
                                        value="{{ $user->birth_date }}">
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0" for="telegram_number">Telegram Number</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" type="text" name="telegram_number" id="telegram_number"
                                        value="{{ $user->telegram_number }}">
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0" for="telegram_id">Telegram Id</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" type="text" name="telegram_id" id="telegram_id"
                                        value="{{ $user->telegram_id }}">
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label for="profile_picture" class="form-label mg-b-0">Profile Picture</label>
                                </div>
                                <div class="col-md-8 d-flex align-items-center mg-t-5 mg-md-t-0">
                                    <input name="profile_picture" id="profile_picture" type="file" accept="image/*"
                                        onchange="loadFile(event, 'output')">

                                    <div class="preview-container" style="border-radius: 50%; width: 150px; height: 150px;">
                                        <img class="preview-img" id="output" />
                                    </div>
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label for="id_card_picture" class="form-label mg-b-0">ID Card Picture</label>
                                </div>
                                <div class="col-md-8 d-flex align-items-center mg-t-5 mg-md-t-0">
                                    <input name="id_card_picture" id="id_card_picture" type="file" accept="image/*"
                                        onchange="loadFile(event, 'id_card_output')">

                                    <div class="preview-container"
                                        style="border-radius: 50%; width: 150px; height: 150px;">
                                        <img class="preview-img" id="id_card_output" />
                                    </div>
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0" for="height">Height</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" type="" name="height" id="height"
                                        value="{{ $user->height }}">
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0" for="weight">Weight</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" type="" name="weight" id="weight"
                                        value="{{ $user->weight }}">
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0" for="telegram_number">Gender</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <select class="form-control" name="gender">
                                        <option value="" selected disabled>Choose List</option>
                                        <option value="0" {{ old('gender') == '0' ? 'selected' : '' }}
                                            {{ $user->gender == '0' ? 'selected' : '' }}>Male</option>
                                        <option value="1" {{ old('gender') == '1' ? 'selected' : '' }}
                                            {{ $user->gender == '1' ? 'selected' : '' }}>Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0" for="address">Address</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <textarea name="address" id="address" cols="30" rows="5" class="form-control">{{ $user->address }}</textarea>
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0" for="blood_type">Blood Type</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <textarea name="blood_type" id="blood_type" cols="30" rows="5" class="form-control">{{ $user->blood_type }}</textarea>
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0" for="medical_conditions">Medical Conditions</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <textarea name="medical_conditions" id="medical_conditions" cols="30" rows="5" class="form-control">{{ $user->medical_conditions }}</textarea>
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0" for="dietary_restrictions">Dietary
                                        Restrictions</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <textarea name="dietary_restrictions" id="dietary_restrictions" cols="30" rows="5" class="form-control">{{ $user->dietary_restrictions }}</textarea>
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0" for="occupation">Occupation</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input type="text" name="occupation" id="occupation" class="form-control"
                                        value="{{ $user->occupation }}">
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0" for="physical_activity_level">Physical Activity
                                        Level</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input type="text" name="physical_activity_level" id="physical_activity_level"
                                        class="form-control" value="{{ $user->physical_activity_level }}">
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0" for="goal">Goal</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input type="text" name="goal" id="goal" class="form-control"
                                        value="{{ $user->goal }}">
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0" for="food_preferences">Food Preferences</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <textarea name="food_preferences" id="food_preferences" cols="30" rows="5" class="form-control">{{ $user->food_preferences }}</textarea>
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0" for="chronic_diseases">Chronic Diseases</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <textarea name="chronic_diseases" id="chronic_diseases" cols="30" rows="5" class="form-control">{{ $user->chronic_diseases }}</textarea>
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0" for="current_medications">Current Medications</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <textarea name="current_medications" id="current_medications" cols="30" rows="5" class="form-control">{{ $user->current_medications }}</textarea>
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0" for="smoking_status">Smoking Status</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input type="text" name="smoking_status" id="smoking_status" class="form-control"
                                        value="{{ $user->smoking_status }}">
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0" for="alcohol_consumption">Alcohol Consumption</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input type="text" name="alcohol_consumption" id="alcohol_consumption"
                                        class="form-control" value="{{ $user->alcohol_consumption }}">
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

    <!--Internal Datatable js -->
    <script src="{{ URL::asset('Dashboard/js/table-data.js') }}"></script>
    <!--Internal Notify js -->
    <script src="{{ URL::asset('Dashboard/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/notify/js/notifit-custom.js') }}"></script>

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
