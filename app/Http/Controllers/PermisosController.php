<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermisosController extends Controller
{
    public function __construct() {
       
        // Evita que los usuarios sin permiso accedan por la url
        // permisos y el array son los metodos que quieren que se ejecuten con los permisos
        $this->middleware(['permission:create_permission'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:read_permission'], ['only' => 'index']);
        $this->middleware(['permission:update_permission'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:delete_permission'], ['only' => 'delete']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $permisos = Permission::all();

        return view('permisos.index', compact('permisos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permisos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $permisos = new Permission();

        $permisos->name = $request->name;
        $permisos->guard_name = $request->guard_name;

        if ($permisos->save()) {

            return redirect('permisos');
        } else {

            return response()->json([
                'message' => 'No se logro crear el permiso'
            ]);
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

        $permiso = Permission::findOrFail($id);
        return view('permisos.edit', compact('permiso'));
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
        $permiso = Permission::findOrFail($id);

        $permiso->name = $request->name;
        $permiso->guard_name = $request->guard_name;
        $permiso->save();

        return redirect('permisos');
        
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
