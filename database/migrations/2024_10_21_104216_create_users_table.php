<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id'); // Khóa chính
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('gender')->nullable(); // Giới tính
            $table->date('date_of_birth')->nullable(); // Ngày sinh
            $table->float('weight')->nullable(); // Cân nặng
            $table->float('height')->nullable(); // Chiều cao
            // $table->timestamp('email_verified_at')->nullable(); // Thêm dòng này
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
