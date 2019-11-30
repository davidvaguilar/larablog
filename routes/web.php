<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name("home");

Route::get('/test', function () {
    return 'Hola Mundo';
});

/*Route::get('/hola/{nombre}', function ($nombre) {  //Parametro obligatorio
    return "Hola $nombre";
});*/

Route::get('/hola/{nombre?}', function ($nombre = "Juan") {  //Parametro opcional
    return "Hola $nombre conocenos: <a href='".route('nosotros')."'>nosotros</a>";
});

Route::get('/somos-nosotros-en-la-web', function () {   //ruta con nombre
    return "<h1>Toda la informacion sobre nosotros!</h1>";
})->name("nosotros");

/*Route::get('home', function () {
    $nombre = "David";
    return view('home')->with('nombre', $nombre);
})->name("home");*/


Route::get('home/{nombre?}/{apellido?}', function ($nombre = "Pepe", $apellido = "Cruz") {
    $posts = ["Post1", "Post2", "Post3", "Post4"];
    $posts2 = [];
    //return view('home')->with('nombre', $nombre)->with('apellido', $apellido);
    return view('home', ['nombre' => $nombre, 'apellido' => $apellido, 'posts' => $posts, 'posts2' => $posts2]);   // PASE POR ARRAY
})->name("home");


Route::resource('dashboard/post', 'dashboard\PostController');
Route::post('dashboard/post/{post}/image', 'dashboard\PostController@image')->name('post.image');
Route::resource('dashboard/category', 'dashboard\CategoryController');
Route::resource('dashboard/user', 'dashboard\UserController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
