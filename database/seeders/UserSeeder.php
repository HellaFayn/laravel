<?php

namespace Database\Seeders;

use DB;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'id' => 1,
            'uuid' => (string) Str::uuid(),
            'email_verified_at' => now(),
            'username' => 'Admin',
            'email' => 'cacaocare.ph@gmail.com',
            'password' => Hash::make('CacaoCare_123'),
            'profile' => 'https://cacaocare.s3.ap-southeast-2.amazonaws.com/profile-photos/default_profile.png',
            'region' => 'Region XI (Davao Region)',
            'province' => 'Davao del Sur',
            'city' => 'City of Davao',
            'barangay' => 'Mintal',
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
