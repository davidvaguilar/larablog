<?php

namespace App\Http\Controllers\api;

use App\Post;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends ApiResponseController //Controller
{
    public function index()
    {
        //echo "Hola Mundo Laravel";
        /*return response()->json([
            "title" => "Hola Mundo Laravel",
            "content" =>"Contenido"
        ]);*/
       // $posts = Post::all();
       //$posts = Post::orderBy('created_at', 'desc')->paginate(5);
      
        $posts = Post::
            join('post_images','post_images.post_id','=','posts.id')->
            join('categories','categories.id','=','posts.category_id')->
            select('posts.id', 'posts.title', 'categories.title as category', 'post_images.image')->
            orderBy('posts.created_at', 'desc')->paginate(10);
        //return response()->json($posts, 200);
        return $this->successResponse($posts);
    }

    public function show(Post $post)
    {
        $post->image;// = $post->image->image;
        $post->category;
        
        //return response()->json(array("array" => $post, "code" => 200, "msj" => ""), 200);
        return $this->successResponse($post);
    }

    public function url_clean(String $url_clean)
    {
        $post = Post::where('url_clean', $url_clean)->firstOrFail();   //->get();
        $post->image;
        $post->category;

        return $this->successResponse($post);
    }

    public function category(Category $category)
    {
        //return $this->successResponse($category->post);
        //return $this->successResponse($category->post()->paginate(10));
        return $this->successResponse(["posts" => $category->post()->paginate(10), "category" => $category]);
    }

}
