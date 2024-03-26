<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            $posts = [
                ['id' => 1],
                ['id' => 2],
                ['id' => 3],
            ];
            DB::table('posts')->insert($posts);
        }
    }
}
