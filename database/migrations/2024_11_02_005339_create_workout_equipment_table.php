<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkoutEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('workout_equipment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('workout_id'); // Khóa ngoại liên kết đến bảng workout
            $table->unsignedBigInteger('equipment_needed_id'); // Khóa ngoại liên kết đến bảng equipment_needed
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('workout_id')->references('workout_id')->on('workout')->onDelete('cascade');
            $table->foreign('equipment_needed_id')->references('equipment_needed_id')->on('equipment_needed')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workout_equipment');
    }
}
