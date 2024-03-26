<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostTranslationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            $translations = [
                ['post_id' => 1, 'language_id' => 6, 'title' => 'Заголовок поста 1', 'description' => 'Описание поста 1', 'content' => 'Контент поста 1'],
                ['post_id' => 1, 'language_id' => 7, 'title' => 'Post 1 Title', 'description' => 'Post 1 Description', 'content' => 'Post 1 Content'],

                ['post_id' => 2, 'language_id' => 6, 'title' => 'Заголовок поста 2', 'description' => 'Описание поста 2', 'content' => 'Контент поста 2'],
                ['post_id' => 2, 'language_id' => 8, 'title' => 'Post 2 Title', 'description' => 'Post 2 Description', 'content' => 'Post 2 Content'],

                ['post_id' => 3, 'language_id' => 6, 'title' => 'Заголовок поста 3', 'description' => 'Описание поста 3', 'content' => 'Контент поста 3'],
                ['post_id' => 3, 'language_id' => 7, 'title' => 'Post 3 Title', 'description' => 'Post 3 Description', 'content' => 'Post 3 Content'],

            ];

            DB::table('post_translations')->insert($translations);
        }
    }
}
