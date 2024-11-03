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
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary(); // ID phiên làm việc
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
            ->references('user_id')
            ->on('users')
            ->onDelete('cascade'); // Tham chiếu đến bảng users
            $table->string('ip_address', 45)->nullable(); // Địa chỉ IP của người dùng
            $table->text('user_agent')->nullable(); // Thông tin trình duyệt của người dùng
            $table->longText('payload'); // Dữ liệu phiên
            $table->integer('last_activity')->index(); // Thời gian hoạt động cuối cùng
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::dropIfExists('sessions');
    }
};
