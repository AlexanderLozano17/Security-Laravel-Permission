@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if(count($errors)>0)
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach($errors->all() as $error)
                                
                                <li>{{ $error }}</li>
                                
                            @endforeach   
                        </ul>
                    </div>                 
                @endif

                <div class="card">
                    <div class="card-header">
                        Editar permiso
                    </div>

                    <div class="card-body">

                        <form action="{{ route('permisos.update', $permiso->id) }}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $permiso->name }}">
                            </div>

                            <div class="form-group">
                                <label for="guard_name">Guard Name</label>
                                <input type="text" name="guard_name" class="form-control" value="{{ $permiso->guard_name }}">
                            </div>

                            <div class="justify-content-end">
                                <input type="submit" value="Enviar" class="btn btn-success">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection