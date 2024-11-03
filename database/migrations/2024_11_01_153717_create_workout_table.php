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
        Schema::create('workout', function (Blueprint $table) {
            $table->id("workout_id"); // Primary key
            $table->string('name'); // Name of the workout (e.g., Full Body Workout)
            $table->text('description')->nullable(); // Description of the workout
            $table->unsignedBigInteger('equipment_needed_id')->nullable(); // Foreign key to equipment_needed
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('equipment_needed_id')->references('equipment_needed_id')->on('equipment_needed')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workout');
    }
};
