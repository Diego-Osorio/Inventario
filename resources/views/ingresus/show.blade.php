@extends('layouts.panel')

@section('content')
<div class="card shadow w-50 mx-auto">
    <div class="card-header bg-primary text-white text-center">
        <h5 class="mb-0">Detalles del Ingreso</h5>
    </div>
    <div class="card-body">
        <!-- Información del ingreso -->
        <div class="table-responsive">
            <table class="table table-sm table-borderless mx-auto">
                <tbody>
                    <!-- <tr>
                        <th class="text-muted text-end pe-3">ID:</th>
                        <td class="text-start">{{ $ingreso->id }}</td>
                    </tr> -->
                    <tr>
                        <th class="text-muted text-end pe-3">Fecha:</th>
                        <td class="text-start">{{ $ingreso->fecha }}</td>
                    </tr>
                    <tr>
                        <th class="text-muted text-end pe-3">Tipo de Documento:</th>
                        <td class="text-start">{{ $ingreso->tipodocumento }}</td>
                    </tr>
                    <tr>
                        <th class="text-muted text-end pe-3">Número de Documento:</th>
                        <td class="text-start">{{ $ingreso->ndocumento }}</td>
                    </tr>
                    <tr>
                        <th class="text-muted text-end pe-3">Stock:</th>
                        <td class="text-start">{{ $ingreso->cantidad ?? 'Sin datos' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Código QR -->
        <div class="text-center mt-3">
            <div class="border border-primary rounded p-3">
                <h6 class="text-primary mb-3">Código QR</h6>
                @php
                    // Generar el código QR dinámicamente
                    $barcode = DNS2D::getBarcodeSVG($ingreso->ndocumento ?? 'Sin datos', 'QRCODE', 4, 4);
                @endphp
                <div>
                    {!! $barcode !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
