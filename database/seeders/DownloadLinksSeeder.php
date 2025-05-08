<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DownloadLinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('download_links')->insert([
            'id' => 1,
            'download_link' => 'https://drive.google.com/drive/folders/1lc3OABN1dc35VDGtypniNHY6Z69D6OqO?usp=sharing',
            'description' => 'First launch version',
            'version' => 'v_1.0.0',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
