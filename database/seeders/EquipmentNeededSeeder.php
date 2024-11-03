<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Storage;

class EquipmentNeededSeeder extends Seeder
{
    public function run()
    {
        DB::table('equipment_needed')->insert([
            [
                'name' => 'Barbell',
                'description' => null,
                'image' => $this->getImageBlob('barbell.jpg'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Skipping Rope',
                'description' => null,
                'image' => $this->getImageBlob('skipping_rope.jpg'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bottle 1 Liters',
                'description' => null,
                'image' => $this->getImageBlob('bottle.jpg'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }

    private function getImageBlob($filename)
    {
        // Đọc nội dung ảnh từ thư mục lưu trữ và trả về dưới dạng binary
        $path = storage_path("app/public/images/{$filename}");
        return file_exists($path) ? file_get_contents($path) : null;
    }
}
