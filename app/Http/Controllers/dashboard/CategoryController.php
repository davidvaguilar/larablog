<?php

namespace App\Http\Controllers\dashboard;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryPost;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'rol.admin']);
    }

    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->paginate(5);
        return view("dashboard.category.index", ['categories' => $categories]);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.category.create", ['category' => new Category() ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryPost $request)
    {
        Category::create( $request->validated() );
        return back()->with('status', 'Categoria creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view("dashboard.category.show", ['category' => $category]);
    }

    public function edit(Category $category)
    {
        return view("dashboard.category.edit", ['category' => $category]);
    }

    public function update(StoreCategoryPost $request, Category $category)
    {
        $category->update( $request->validated() );
        return back()->with('status', 'Categoria actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //$post = POST::findOrFail($id);
        $category->delete();
        return back()->with('status', 'Categoria eliminada con exito');
    }
}
