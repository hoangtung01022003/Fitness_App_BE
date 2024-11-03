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
        Schema::create('set', function (Blueprint $table) {
            $table->id("set_id"); // Primary key
            $table->unsignedBigInteger('exercise_id'); // Khóa ngoại liên kết đến bảng Exercise
            $table->integer('set_number'); // Số thứ tự set
            $table->json('exercises'); // Danh sách các bài tập trong set
            $table->timestamps();

            // Ràng buộc khóa ngoại
            $table->foreign('exercise_id')->references('exercise_id')->on('exercise')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('set');
    }
};
