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
        Schema::create('nutrition_program_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('locale')->index();

            $table->unsignedBigInteger('nutrition_program_id');
            $table->unique(['nutrition_program_id', 'locale'], 'nutrition_program_locale_unique'); // Provide a shorter name for the constraint
            $table->foreign('nutrition_program_id')->references('id')->on('nutrition_programs', 'nutrition_program_id')->onDelete('cascade');

            $table->string('name');
            $table->longText('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nutrition_program_translations');
    }
};
