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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('status')->default(1);
            $table->date('birth_date'); // تاريخ الميلاد
            $table->string('telegram_number')->nullable(); // رقم تليجرام 
            $table->string('telegram_id')->nullable(); // معرف تليجرام 
            $table->string('profile_picture')->nullable(); // صورة الملف الشخصي 
            $table->string('id_card_picture')->nullable(); // صورة بطاقة الهوية 
            $table->float('height')->nullable(); // الطول 
            $table->float('weight')->nullable(); // الوزن 
            $table->tinyInteger('gender')->nullable(); // الجنس
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
