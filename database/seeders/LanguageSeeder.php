<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('languages')->insert([
            ['locale' => 'en', 'prefix' => 'en'],
            ['locale' => 'ua', 'prefix' => 'ua'],
            ['locale' => 'ru', 'prefix' => 'ru'],
        ]);
    }
}
