<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $postTags = [
            ['post_id' => 1, 'tag_id' => 1],
            ['post_id' => 1, 'tag_id' => 2],
            ['post_id' => 2, 'tag_id' => 2],
            ['post_id' => 3, 'tag_id' => 3],

        ];

        // Используем массовое заполнение с помощью запроса к базе данных
        DB::table('post_tags')->insert($postTags);
    }
}
