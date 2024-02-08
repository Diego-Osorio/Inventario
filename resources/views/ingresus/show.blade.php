<?php use Illuminate\Support\Str; ?>

@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Detalles del ingreso</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ url('/ingreso') }}" method="POST">
            @csrf
            <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                        <label for="nombre">Nombre Producto:</label>
                        <p>{{ isset($producto) && is_object($producto) ? $producto->nombre : '' }}</p>
                    </div>
                </div>
              
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="ordencompra">Orden de compra:</label>
                        <p>{{ $ingreso->ordencompra }}</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                        <label for="codigo">Código Producto:</label>
                        <p>{{ isset($producto) && is_object($producto) ? $producto->codigo : '' }}</p>
                    </div>
                </div>
        
                <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                        <label for="idcategoria">Categoría:</label>
                        <p>{{ isset($producto) && is_object($producto) ? $producto->categoria_id : '' }}</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                        <label for="idmarca">Marca:</label>
                        <p>{{ isset($producto) && is_object($producto) ? $producto->marcas_id : '' }}</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                        <label for="cantidad">Cantidad:</label>
                        <p>{{ isset($producto) && is_object($producto) ? $producto->stock : '' }}</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                        <label for="codigo">Ubicación:</label>
                        @if(isset($producto) && is_object($producto) && isset($producto->ubicacion))
                            {{ QrCode::size(80)->generate($producto->ubicacion) }}
                        @else
                            <p>No disponible</p>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <input name="_token" value="{{ csrf_token() }}" type="hidden">
                </div>
                <div class="col text-right">
                    <a href="{{ url('/ingreso') }}" class="btn btn-sm btn-success">
                        <i class="fas fa-angle-left"></i> Regresar
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
