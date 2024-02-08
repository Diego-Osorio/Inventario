@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header bg-gradient">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Bodegas</h3>
            </div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#crearBodegaModal">
                Crear Bodega
            </button>
        </div>
    </div>

    <div class="card-body header bg-gradient">
        @if(session('notification'))
            <div class="alert alert-success" role="alert">
                {{ session('notification') }}
            </div>
        @endif
    </div>

    <div class="row">
        <div class="col-lg-12 col-sm-12 table-responsive">
            <table id="example1" class="table table-bordered table-hover stylish-table mb-0 mt-2">
                <thead>
                    <tr class="tableBlack">
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Ubicación</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($bodegas as $bodega)
    <tr>
        <td>{{ $bodega->id }}</td>
        <td>{{ $bodega->nombre }}</td>
        <td>{{ $bodega->direccion }}</td>
        <td>
            @if($bodega->activo)
                <span class="badge badge-success">Activada</span>
            @else
                <span class="badge badge-danger">Desactivada</span>
            @endif
        </td>
        <td>
            <div class="btn-group">
                <a href="{{ route('bodegas.edit', $bodega->id) }}" class="btn btn-warning">
                    Editar
                </a>
                <button class="btn btn-info toggle-activo"
                        data-bodega-id="{{ $bodega->id }}"
                        data-activo="{{ $bodega->activo ? '1' : '0' }}">
                    {{ $bodega->activo ? 'Desactivar' : 'Activar' }}
                </button>
            </div>
        </td>
    </tr>
@endforeach
                </tbody>
            </table>
        </div>

        <div class="card-body">
            {{ $bodegas->links() }}
        </div>
    </div>
</div>
<div class="modal fade" id="crearBodegaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Bodega</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario de creación -->
                <form action="{{ route('bodegas.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="direccion">Direccion:</label>
                        <input type="text" name="direccion" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

