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
        Schema::create('nutrition_program_meal_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('locale')->index();

            $table->unsignedBigInteger('nutrition_program_meal_id');
            // تحديد اسم مختصر للفهرس الفريد
            $table->unique(['nutrition_program_meal_id', 'locale'], 'meal_trans_program_locale_unique');
            // تحديد اسم مختصر للفهرس الأجنبي
            $table->foreign('nutrition_program_meal_id', 'meal_trans_program_id_foreign')
                ->references('id')
                ->on('nutrition_program_meals')
                ->onDelete('cascade');

            $table->string('meal_name'); // اسم الوجبة
            $table->longText('description')->nullable(); // وصف الوجبة (اختياري)
            $table->longText('additional_notes')->nullable(); // ملاحظات إضافية (اختياري)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nutrition_program_meal_translations');
    }
};
