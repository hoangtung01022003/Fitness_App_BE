<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_workout_sessions', function (Blueprint $table) {
            $table->id(); // ID tự động
            $table->unsignedBigInteger('user_id'); // Khóa ngoại liên kết đến bảng người dùng
            $table->unsignedBigInteger('exercise_id'); // Khóa ngoại liên kết đến bảng Exercise
            $table->integer('duration'); // Thời gian tập luyện (phút)
            $table->integer('calories_burned')->nullable(); // Số calorie tiêu thụ (tùy chọn)
            $table->timestamps();
            // Ràng buộc khóa ngoại
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('exercise_id')->references('exercise_id')->on('exercise')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_workout_sessions');
    }
};
