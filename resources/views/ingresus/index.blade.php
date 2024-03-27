@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Listado de Ingresos</h3>
            </div>
            @if(auth()->user()->role == 'admin')
            <div class="col text-right">
                <div class="dropdown">
                    <a class="btn btn-sm btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Reporte
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{ url('ingreso/export') }}">Generar Reporte Excel</a>
                        <a class="dropdown-item" href="{{ url('download-pdf') }}">Descargar en PDF</a>
                    </div>
                </div>
                <a href="{{ url('/ingreso/create') }}" class="btn btn-sm btn-primary ml-2">Nuevo ingreso</a>
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
        <div class="table-responsive">
            <table class="table table-striped custom-table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Fecha</th>
                        <th scope="col">N° Documento</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ingresos as $ingreso)
                    <tr>
                        <td>{{ $ingreso->fecha }}</td>
                        <td>{{ $ingreso->ndocumento }}</td>
                        <td>{{ $ingreso->tipodocumento }}</td>
                        <td>
                            <form action="{{ url('/ingreso/'.$ingreso->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{ url('/ingreso/'.$ingreso->id.'/show') }}" class="btn btn-sm btn-outline-info">Detalles</a>
                                @if(auth()->user()->role == 'admin')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Anular</button>
                                @endif
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $ingresos->links() }}
        </div>
    </div>
</div>
@endsection
