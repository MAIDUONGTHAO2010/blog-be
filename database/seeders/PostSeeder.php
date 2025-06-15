<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::truncate();
        // remove all existing post-tab relationships
        PostTag::truncate();

        for ($i = 0; $i < 8; $i++) {
            $post = new Post([
                'category_id' => rand(1, 3),
                'title' => 'Post Title '.($i + 1),
                'description' => 'This is a description for post '.($i + 1),
                'content' => 'This is the content of post '.($i + 1),
                'view_count' => rand(100, 1000),
                'is_active' => true,
            ]);
            $post->save();

            // randomly attach many tabs to the post, tab is unique within post

            $tabIds = Tag::inRandomOrder()->take(rand(1, 5))->pluck('id')->unique();
            $post->tags()->attach($tabIds);
        }
    }
}
