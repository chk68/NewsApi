<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            ['id' => 1, 'name' => 'Tag 1'],
            ['id' => 2, 'name' => 'Tag 2'],
            ['id' => 3, 'name' => 'Tag 3'],
        ];

        DB::table('tags')->insert($tags);
    }
}
