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
        <div class="row">
            <div class="col-md-6">
                <ul class="list-unstyled">
             <li><strong>ID:</strong> {{ $ingreso->id }}</li>
<li><strong>Fecha:</strong> {{ $ingreso->fecha }}</li>
<li><strong>Tipo de Documento:</strong> {{ $ingreso->tipodocumento }}</li>
<li><strong>Número de Documento:</strong> {{ $ingreso->ndocumento }}</li>
<li><strong>Orden de Compra:</strong> {{ $ingreso->ordencompra }}</li>

                </ul>
            </div>
            <div class="col-md-6">
                <div class="card border-primary mb-3">
                    <div class="card-header bg-primary text-white">Código de Barras</div>
                    <div class="card-body text-center">
                        @php
                            // Generar el código de barras
                            $barcode = DNS2D::getBarcodeSVG("123456789", "QRCODE");
                        @endphp
                        {{-- Mostrar el código de barras generado --}}
                        <div>{!! $barcode !!}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


