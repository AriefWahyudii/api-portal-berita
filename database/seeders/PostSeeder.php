<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
            'title' => 'berita pertama',
            'news_content' => "berita terkini",
            'user_id' => 1
        ]);
        
        Post::create([
            'title' => 'berita kedua',
            'news_content' => "berita kedua",
            'user_id' => 1
        ]);
    }
}
