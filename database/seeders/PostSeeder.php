<?php

namespace Database\Seeders;

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
        // postsテーブルの初期値として設定する値の定義
        DB::table('posts')->insert([
            ['title' => 'はじめての投稿', 'content' => 'シーダーで初期投入した1つ目の投稿です。', 'published_at' => now(), 'created_at' => now(), 'updated_at' => now()],
            ['tile' => '2つ目の投稿', 'content' => 'シーダーで初期投入した2つ目の投稿です。' , 'published_at' => now(), 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
