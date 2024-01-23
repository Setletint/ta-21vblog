<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Image;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::all();
        foreach ($posts as $post) {
            if(rand(0,9)){
                Image::factory(rand(0,5))->create(['post_id' => $post->id]);
            }
        }
    }
}
