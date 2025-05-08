<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use Str;
use function Laravel\Prompts\table;

class CacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('cacaos')->insert([
                'uuid' => 'awdadawdawdawdawdwa',
                'label' => 'Label ' . $i,
                'confidence' => rand(70, 99) / 100,
                'photo' => 'photo_' . $i . '.jpg',
                'uploaderId' => 1,
                'caption' => Str::random(20),
                'date_analyzed' => now()->subDays(rand(1, 30)),
                'created_at' => now()->addDay()
            ]);
        }
    }
}
