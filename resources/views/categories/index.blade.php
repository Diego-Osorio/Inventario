@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Categorías</h3>
            </div>
            @if(auth()->user()->role =='admin')
            <div class="col text-right">
                <a href="{{ url('/categorias/create') }}" class="btn btn-sm btn-primary">Nueva Categoría</a>
            </div>
            @endif
        </div>
    </div>
    <div class="card-body">
        @if(session('notification'))
        <div class="alert alert-success" role="alert">
            {{ session('notification') }}
        </div>
        @endif
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $categoria)
                <tr>
                    <td>{{ $categoria->nombre }}</td>
                    <td>{{ $categoria->descripcion }}</td>
                    <td>
                        <form action="{{ url('/categorias/'.$categoria->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            @if(auth()->user()->role =='admin')
                            <a href="{{ url('/categorias/'.$categoria->id.'/edit') }}" class="btn btn-sm btn-primary">Editar</a>
                            <button type="submit" class="btn btn-sm btn-danger">Anular</button>
                            @endif
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
