<?php

use App\Category;
use App\Post;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::truncate();
        $categories = Category::all();

        foreach ($categories as $key => $c) {
            for ($i=2; $i <= 20; $i++) { 
                Post::create([
                    'title' => "Post $i $key",
                    'url_clean' => "post-$i-$key",
                    'content' => "Algo de comentario",
                    'posted' => 'yes',
                    'category_id' => $c->id
                ]);
            }
        }        
    }
}
