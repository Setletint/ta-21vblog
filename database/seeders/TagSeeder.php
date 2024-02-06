<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = Tag::factory(20)->create();
        $posts = Post::all();
        foreach($posts as $post){
            $randTags = $tags->random(rand(0,10));
            foreach($randTags as $tag){
                $post->tags()->attach($tag);
            }
        }
    }
}
