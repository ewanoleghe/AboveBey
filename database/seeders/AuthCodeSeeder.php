<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    $authCodes = [
        'maga123',
        'auth456',
        'code789',
    ];

    foreach ($authCodes as $code) {
        DB::table('auth_codes')->insert([
            'authcode' => $code,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
}
