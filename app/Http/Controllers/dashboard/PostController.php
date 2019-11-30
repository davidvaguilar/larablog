<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\PostImage;
use App\Http\Requests\StorePostPost;


class PostController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth')->only('index');
        //$this->middleware('auth')->except('index', 'create');
        $this->middleware('auth');       
    }

    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
                   // ->get();
        // select * from post

        return view("dashboard.post.index", ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('id', 'title');
        return view("dashboard.post.create", ['post' => new Post(), 'categories' => $categories ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostPost $request)
    {
        //dd("Hola");
        //echo "Titulo: ".$request->input('title');
        //dd($request);   
        //dd($request->all());  
        //dd($request->title);  
        //dd(request("title"));  
        //dd($request->validated());
        
        Post::create($request->validated());
        return back()->with('status', 'Post creado con exito');
        //dd($request->all())
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)  //Post $post
    {
        $post = POST::findOrFail($id);
        /* if(isset($post)){
            return view("dashboard.post.show", ['post' => $post]);
        }*/
        return view("dashboard.post.show", ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = POST::findOrFail($id);
        $categories = Category::pluck('id', 'title');
        //$categories = Category::get();
        return view("dashboard.post.edit", ['post' => $post, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostPost $request, $id)
    {
        $post = POST::findOrFail($id);
        $post->update($request->validated());
        return back()->with('status', 'Post actualizado con exito');
    }

    public function image(Request $request, $id)
    {
        $post = POST::findOrFail($id);
        $request->validate([
            'image' => 'required|mimes:jpeg,bmp,png|max:10240'  //10Mb
        ]);
        $filename = time().".".$request->image->extension();
        $request->image->move(public_path('images'), $filename);
       
        PostImage::create(['image' => $filename, 'post_id' => $post->id]);
        return back()->with('status', 'Imagen cargada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = POST::findOrFail($id);
        $post->delete();
        return back()->with('status', 'Post eliminado con exito');
    }
}
