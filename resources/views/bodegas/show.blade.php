@extends('layouts.app')

@section('content')
    <h1>Detalles de la Bodega</h1>

    <p>ID: {{ $bodega->id }}</p>
    <p>Nombre: {{ $bodega->nombre }}</p>
    <p>Ubicación: {{ $bodega->ubicacion }}</p>
    <p>Estado: {{ $bodega->estado }}</p>

    <a href="{{ route('bodegas.edit', $bodega->id) }}">Editar</a>
    <form action="{{ route('bodegas.destroy', $bodega->id) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar</button>
    </form>
@endsection
