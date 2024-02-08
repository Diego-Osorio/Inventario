@extends('layouts.app')

@section('content')
    <h1>Editar Bodega</h1>

    <form action="{{ route('bodegas.update', $bodega->id) }}" method="post">
        @csrf
        @method('PUT')
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="{{ $bodega->nombre }}" required>

        <label for="ubicacion">Ubicación:</label>
        <input type="text" name="ubicacion" value="{{ $bodega->ubicacion }}" required>

        <label for="estado">Estado:</label>
        <input type="text" name="estado" value="{{ $bodega->estado }}" required>

        <button type="submit">Actualizar</button>
    </form>
@endsection
