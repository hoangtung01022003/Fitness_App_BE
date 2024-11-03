<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentNeededTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('equipment_needed', function (Blueprint $table) {
            $table->id("equipment_needed_id"); // Cột ID chính
            $table->string('name'); // Tên dụng cụ
            $table->text('description')->nullable(); // Mô tả (nếu có)
            $table->binary('image')->nullable(); // Ảnh (kiểu blob)
            $table->timestamps(); // Thời gian tạo và cập nhật
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipment_needed');
    }
}
