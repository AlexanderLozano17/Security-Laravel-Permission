@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Lista de Roles
                    </div>

                    <div class="card-body">
                        
                        @can('create_rol') 
                            <div class="row justify-content-end pb-2">
                                <a href="{{ url('/roles/create') }}" class="btn btn-success">Nuevo Rol</a>
                            </div>
                        @endcan
                        
                        <table class="table">
                            <thead>
                                <th>Name</th>
                                <th>Guard Name</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                            </thead>
                            <tbody>
                                @foreach ($rols as $rol)
                                    
                                <tr>
                                    <td>{{ $rol->name }}</td>
                                    <td>{{ $rol->guard_name }}</td>
                                    <td>{{ $rol->created_at }}</td>
                                    <td>{{ $rol->updated_at }}</td>
                                    <td>
                                    
                                        @can('update_rol')  
                                            <a href="{{ url('roles/'.$rol->id.'/edit') }}" class="btn btn-primary">Editar</a>
                                        @endcan
                                        
                                        
                                        @can('delete_rol')   
                                         
                                        @endcan
                                    
                                    </td>
                                </tr>
                    
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection