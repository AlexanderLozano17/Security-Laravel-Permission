<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolsController extends Controller
{

    public function __construct() {
        
        // Evita que los usuarios sin permiso accedan por la url
        // permisos y el array son los metodos que quieren que se ejecuten con los permisos
        $this->middleware(['permission:create_rol'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:read_rol'], ['only' => 'index']);
        $this->middleware(['permission:update_urol'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:delete_rol'], ['only' => 'delete']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rols = Role::all();

        return view('roles.index', compact('rols', 'permisos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rol = new Role();

        $rol->name = $request->name;
        $rol->guard_name = $request->guard_name;

        $rol->save();

        return redirect('roles');
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
        $rol = Role::findOrFail($id);
        return view('roles.edit', compact('rol'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rol = Role::findOrFail($id);

        $rol->name = $request->name;
        $rol->guard_name = $request->guard_name;
        $rol->save();

        return redirect('roles');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
