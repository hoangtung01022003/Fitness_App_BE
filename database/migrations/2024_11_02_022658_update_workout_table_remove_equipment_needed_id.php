<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Chạy migration để xóa khóa ngoại và cột `equipment_needed_id`.
     */
    public function up(): void
    {
        Schema::table('workout', function (Blueprint $table) {
            // Xóa ràng buộc khóa ngoại trước
            $table->dropForeign(['equipment_needed_id']);
            
            // Xóa cột `equipment_needed_id`
            $table->dropColumn('equipment_needed_id');
        });
    }

    /**
     * Đảo ngược migration.
     */
    public function down(): void
    {
        Schema::table('workout', function (Blueprint $table) {
            // Thêm lại cột `equipment_needed_id`
            $table->unsignedBigInteger('equipment_needed_id')->nullable();
            
            // Thêm lại ràng buộc khóa ngoại
            $table->foreign('equipment_needed_id')->references('equipment_needed_id')->on('equipment_needed')->onDelete('cascade');
        });
    }
};
