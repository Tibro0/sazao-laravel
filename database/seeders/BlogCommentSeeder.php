<?php

namespace Database\Seeders;

use App\Models\BlogComment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BlogComment::insert([
            [
                'user_id' => 2,
                'blog_id' => 4,
                'comment' => 'Good Post',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'blog_id' => 3,
                'comment' => 'Nice',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'blog_id' => 2,
                'comment' => 'Good',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'blog_id' => 1,
                'comment' => 'Excellent',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
