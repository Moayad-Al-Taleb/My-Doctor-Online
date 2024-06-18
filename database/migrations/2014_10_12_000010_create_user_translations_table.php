<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('locale')->index();

            $table->unsignedBigInteger('user_id');
            $table->unique(['user_id', 'locale']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('name')->unique();
            $table->longText('address')->nullable(); // العنوان 
            // الحقول المضافة لاخصائي التغذية
            $table->longText('blood_type')->nullable(); // فصيلة الدم
            $table->longText('medical_conditions')->nullable(); // الحالات الطبية
            $table->longText('allergies')->nullable(); // الحساسيات
            $table->longText('dietary_restrictions')->nullable(); // القيود الغذائية
            $table->longText('occupation')->nullable(); // المهنة
            $table->longText('physical_activity_level')->nullable(); // مستوى النشاط البدني
            $table->longText('goal')->nullable(); // الهدف من العلاج التغذوي
            $table->longText('food_preferences')->nullable(); // تفضيلات الطعام
            $table->longText('chronic_diseases')->nullable(); // الأمراض المزمنة
            $table->longText('current_medications')->nullable(); // الأدوية الحالية
            $table->longText('smoking_status')->nullable(); // حالة التدخين
            $table->longText('alcohol_consumption')->nullable(); // استهلاك الكحول
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_translations');
    }
};
