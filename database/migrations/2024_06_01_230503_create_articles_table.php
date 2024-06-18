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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->default(1);
            $table->unsignedBigInteger('health_category_id')->nullable();
            $table->unsignedBigInteger('illness_id')->nullable();
            $table->unsignedBigInteger('doctor_id');
            $table->foreign('health_category_id')->references('id')->on('health_categories', 'health_category_id')->onDelete('cascade');
            $table->foreign('illness_id')->references('id')->on('illnesses', 'illness_id')->onDelete('cascade');
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
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
        Schema::dropIfExists('articles');
    }
};
