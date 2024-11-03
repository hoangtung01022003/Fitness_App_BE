<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkoutSeeder extends Seeder
{
    public function run()
    {
        DB::table('workout')->insert([
            [
                'name' => 'Strength Training',
                'description' => 'Buổi tập toàn thân với barbell và các động tác nâng tạ cơ bản.',
                'equipment_needed_id' => 1, // ID của Barbell trong bảng equipment_needed
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cardio Session',
                'description' => 'Buổi tập cardio với skipping rope để tăng cường sức bền.',
                'equipment_needed_id' => 2, // ID của Skipping Rope trong bảng equipment_needed
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hydration Break',
                'description' => 'Giữ cơ thể đủ nước trong suốt buổi tập.',
                'equipment_needed_id' => 3, // ID của Bottle 1 Liters trong bảng equipment_needed
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bodyweight Circuit',
                'description' => 'Buổi tập toàn thân chỉ với trọng lượng cơ thể, không cần dụng cụ.',
                'equipment_needed_id' => null, // Không cần dụng cụ
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
