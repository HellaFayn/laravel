<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Treatment;
use Illuminate\Support\Facades\DB;

class TreatmentSeeder extends Seeder
{
    public function run(): void
    {
        Treatment::insert([
            [
                'disease' => 'Black Pod Rot',
                'short_description' => 'A fungal disease affecting cacao plants.',
                'img_url' => 'https://example.com/black_pod_rot.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'disease' => 'Frosty Pod Rot',
                'short_description' => 'Causes pod deformation and reduces yield.',
                'img_url' => 'https://example.com/frosty_pod_rot.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
