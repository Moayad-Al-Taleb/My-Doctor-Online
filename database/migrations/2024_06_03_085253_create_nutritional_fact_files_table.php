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
        Schema::create('nutritional_fact_files', function (Blueprint $table) {
            $table->id();
            $table->string('file');
            $table->integer('type')->comment('1 - Image, 2 - Video, 3 - File');
            $table->unsignedBigInteger('nutritional_fact_id');
            $table->foreign('nutritional_fact_id')->references('id')->on('nutritional_facts')->onDelete('cascade');
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
        Schema::dropIfExists('nutritional_fact_files');
    }
};
