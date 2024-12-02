@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Inventarios</h3>
            </div>
            <div class="col text-right">
                <a href="{{ url('') }}" class="btn btn-sm btn-primary">Nuevo Producto</a>
            </div>
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
        <!-- Projects table -->
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Nombre Producto</th>
                    <th scope="col">Código</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Categoría</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto) <!-- Cambié $days por $productos -->
                    <tr>
                        <td>{{ $producto->id }}</td>
                        <td>{{ $producto->marca->nombre ?? 'N/A' }}</td> <!-- Suponiendo que tienes la relación 'marca' -->
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->codigo }}</td>
                        <td>{{ $producto->descripcion }}</td>
                        <td>
                            <label class="custom-toggle">
                                <input type="checkbox" {{ $producto->estado ? 'checked' : '' }}>
                                <span class="custom-toggle-slider rounded-circle"></span>
                            </label>
                        </td>
                        <td>{{ $producto->stock }}</td>
                        <td>{{ $producto->categoria->nombre ?? 'N/A' }}</td> <!-- Suponiendo que tienes la relación 'categoria' -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
