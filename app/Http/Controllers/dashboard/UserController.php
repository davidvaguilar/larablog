<?php

namespace App\Http\Controllers\dashboard;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserPost;
use App\Http\Requests\UpdateUserPut;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'rol.admin']);
    }

    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(5);
        return view("dashboard.user.index", ['users' => $users]);   
    }

    public function create()
    {
        return view("dashboard.user.create", ['user' => new User() ]);
    }

    public function store(StoreUserPost $request)
    {
        User::create([
            'name' => $request['name'],
            'rol_id' => 1,  //rol de admin
            'surname' => $request['surname'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

       // User::create( $request->validated() );
        return back()->with('status', 'Usuario creado con exito');
    }

    public function show(User $user)
    {
        return view("dashboard.user.show", ['user' => $user]);
    }

    public function edit(User $user)
    {
        return view("dashboard.user.edit", ['user' => $user]);
    }

    public function update(UpdateUserPut $request, User $user)
    {
        //echo $request->route('user')->id;
        $user->update([
            'name' => $request['name'],
            'surname' => $request['surname'],
            'email' => $request['email'],
        ]);
        //$user->update( $request->validated() );
        return back()->with('status', 'Usuario actualizado con exito');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('status', 'Usuario eliminada con exito');
    }
}
