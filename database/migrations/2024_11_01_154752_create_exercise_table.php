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
        Schema::create('exercise', function (Blueprint $table) {
            $table->id("exercise_id"); // Primary key
            $table->unsignedBigInteger('workout_id'); // Foreign key linking to the Workout table
            $table->string('name'); // Name of the exercise (e.g., Warm Up, Jumping Jack)
            $table->integer('duration')->nullable(); // Duration in minutes
            $table->integer('reps')->nullable(); // Number of repetitions
            $table->integer('calories')->nullable(); // Calories burned
            $table->text('description')->nullable(); // Detailed description
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('workout_id')->references('workout_id')->on('workout')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercise');
    }
};
