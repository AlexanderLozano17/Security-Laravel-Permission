@extends('layouts.app')

@section('content')
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Lista de Permisos
                    </div>

                    <div class="card-body">
                        
                        @can('create_permission') 
                            <div class="row justify-content-end pb-2">
                                <a href="{{ url('/permisos/create') }}" class="btn btn-success">Nuevo Permiso</a>
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
                                @foreach ($permisos as $permiso)
                                    
                                <tr>
                                    <td>{{ $permiso->name }}</td>
                                    <td>{{ $permiso->guard_name }}</td>
                                    <td>{{ $permiso->created_at }}</td>
                                    <td>{{ $permiso->updated_at }}</td>
                                    <td>
                                    
                                        @can('update_permission')  
                                            <a href="{{ url('permisos/'.$permiso->id.'/edit') }}" class="btn btn-primary">Editar</a>
                                        @endcan
                                        
                                        
                                        @can('delete_user')   
                                         
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