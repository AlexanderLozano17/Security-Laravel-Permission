<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\UserCreateRequest;

class UserController extends Controller
{

    public function __construct() 
    {
        // Evita que los usuarios sin permiso accedan por la url
        // permisos y el array son los metodos que quieren que se ejecuten con los permisos
        $this->middleware(['permission:create_user'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:read_user'], ['only' => 'index']);
        $this->middleware(['permission:update_user'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:delete_user'], ['only' => 'delete']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('usuarios.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all()->pluck('name', 'id');
        return view('usuarios.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        $usuario = new user;

        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);

        if($usuario->save()) {
            // Asigna el rol
            $usuario->assignRole($request->rol);

            return redirect('/usuarios');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = User::findOrFail($id);

        $roles = Role::all()->pluck('name', 'id');

        return view('usuarios.edit', compact('usuario', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserCreateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserCreateRequest $request, $id)
    {
        $usuario = User::findOrFail($id);

        $usuario->name = $request->name;
        $usuario->email = $request->email;
    
        if ($request->password != null) {

            $usuario->password = $request->password;
        }

        $usuario->syncRoles($usuario->rol);

        $usuario->assignRole($request->rol);

        $usuario->save();

        return redirect('/usuarios');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);

        // Eliminar el rol
        $usuario->removeRole($usuario->roles->implode('name', ', '));

        // Eliminar el usuario
        if ($usuario->delete()) {

            return redirect('/usuarios');
        } else {

            return response()->json([
                'message' => 'Error al eliminar el usuario.'
            ]);
        }
    }
}
