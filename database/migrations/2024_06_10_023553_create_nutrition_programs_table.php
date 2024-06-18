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
        Schema::create('nutrition_programs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('health_category_id')->nullable();
            $table->unsignedBigInteger('illness_id')->nullable();
            $table->unsignedBigInteger('doctor_id');
            $table->unsignedBigInteger('user_id');
            $table->date('start_date'); // حقل تاريخ بداية البرنامج
            $table->date('end_date');   // حقل تاريخ نهاية البرنامج
            $table->foreign('health_category_id')->references('id')->on('health_categories', 'health_category_id')->onDelete('cascade');
            $table->foreign('illness_id')->references('id')->on('illnesses', 'illness_id')->onDelete('cascade');
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('nutrition_programs');
    }
};
