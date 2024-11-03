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
        Schema::create('exercise_instruction', function (Blueprint $table) {
            $table->id("exercise_instruction_id"); // Primary key
            $table->unsignedBigInteger('exercise_id'); // Foreign key linking to the Exercise table
            $table->text('how_to_do_it')->nullable(); // Steps or method for performing the exercise
            $table->string('guidance')->nullable(); // Additional guidance or notes
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('exercise_id')->references('exercise_id')->on('exercise')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercise_instruction');
    }
};
