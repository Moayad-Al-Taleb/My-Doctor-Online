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
        Schema::create('nutrition_program_meals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nutrition_program_id'); // معرف برنامج التغذية
            $table->string('quantity'); // كمية الوجبة
            $table->integer('calories')->nullable(); // عدد السعرات الحرارية (اختياري)
            $table->integer('proteins')->nullable(); // كمية البروتينات (اختياري)
            $table->integer('fats')->nullable(); // كمية الدهون (اختياري)
            $table->integer('carbohydrates')->nullable(); // كمية الكربوهيدرات (اختياري)
            $table->string('meal_type')->nullable(); // نوع الوجبة (اختياري)
            $table->time('meal_time')->nullable(); // وقت الوجبة (اختياري)
            $table->foreign('nutrition_program_id')->references('id')->on('nutrition_programs')->onDelete('cascade'); // ربط بـ nutrition_programs
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nutrition_program_meals');
    }
};
