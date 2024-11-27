@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Nuevo ingreso</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        @if ($errors->any())
            @foreach ($errors->all() as $error) 
                <div class="alert alert-danger" role="alert">
                    <i class="fas fa-exclamation-triangle"></i>
                    <strong>Por Favor!!</strong> {{ $error }}
                </div>
            @endforeach
        @endif

        <form action="{{ url('/ingreso') }}" method="POST">
            @csrf
            <div class="row">
                <!-- Fecha -->
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="fecha">Fecha</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" value="{{ old('fecha') }}">
                    </div>
                </div>

                <!-- Número de Documento -->
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="ndocumento">Número de Documento</label>
                        <input type="text" class="form-control" id="ndocumento" name="ndocumento" value="{{ old('ndocumento') }}" placeholder="Número de Documento">
                    </div>
                </div>

                <!-- Tipo de Documento -->
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="tipodocumento">Tipo de Documento</label>
                        <select class="form-control" id="tipodocumento" name="tipodocumento">
                            <option value="">Selecciona</option>
                            <option value="FACTURA">FACTURA</option>
                            <option value="BOLETA">BOLETA</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Campos para producto dinámico -->
            <div class="row">
                <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                        <label for="codigo">Código Producto</label>
                        <input type="text" name="codigo" id="codigo" class="form-control" placeholder="Código">
                    </div>
                </div>
                <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                        <label for="producto">Nombre Producto</label>
                        <input type="text" name="producto" id="producto" class="form-control" placeholder="Nombre">
                    </div>
                </div>
                <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                        <label for="idcategoria">Categoría</label>
                        <select name="idcategoria" id="idcategoria" class="form-control">
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" name="cantidad" id="cantidad" class="form-control" placeholder="Cantidad">
                    </div>
                </div>
                <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                        <label for="idmarca">Marca</label>
                        <select name="idmarca" id="idmarca" class="form-control">
                            @foreach($marcas as $marca)
                                <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
               <div class="col-md-3 col-sm-12">
    <div class="form-group">
        <label for="bodega_id">Bodega</label>
        <select name="bodega_id" id="bodega_id" class="form-control">
            @foreach($bodegas as $bodega)
                <option value="{{ $bodega->id }}">{{ $bodega->nombre }}</option>
            @endforeach
        </select>
    </div>
</div>

                <!-- Botón Agregar -->
                <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                        <button type="button" name="bt_add" id="bt_add" class="btn btn-primary">Agregar</button>
                    </div>
                </div>
            </div>

            <!-- Tabla dinámica -->
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 m-3">
                <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                    <thead style="background-color:#825ee4">
                        <tr>
                            <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Código</th>
                            <th>Cantidad</th>
                            <th>Marca</th>
                            <th>Categoría</th>
                          
                        </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                        <tr>
                            <th colspan="7"></th>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <!-- Botones de acción -->
            <div class="col-md-6 col-xs-12 col-sm-12">
                <button type="submit" class="btn btn-primary">Ingresar</button>
            </div>
            <div class="col-md-6 col-xs-12 col-sm-12">
                <a href="{{ url('/ingreso') }}" class="btn btn-success">
                    <i class="fas fa-angle-left"></i> Regresar
                </a>
            </div>
        </form>
    </div>
</div>

<!-- Script para manejo dinámico -->
<script>
    document.getElementById('bt_add').addEventListener('click', function () {
        let producto = document.getElementById('producto').value;
        let codigo = document.getElementById('codigo').value;
        let cantidad = document.getElementById('cantidad').value;
        let categoria = document.getElementById('idcategoria').selectedOptions[0].text;
        let idCategoria = document.getElementById('idcategoria').value;
        let marca = document.getElementById('idmarca').selectedOptions[0].text;
        let idBodega = document.getElementById('idbodegas').value;

        if (producto && codigo && cantidad) {
            let row = ``
                <tr>
                    <td><button type="button" class="btn btn-danger btn-sm remove-item">X</button></td>
                    <td><input type="hidden" name="producto[]" value="${producto}">${producto}</td>
                    <td><input type="hidden" name="codigo[]" value="${codigo}">${codigo}</td>
                    <td><input type="hidden" name="cantidad[]" value="${cantidad}">${cantidad}</td>
                    <td>${marca}</td>
                    <td><input type="hidden" name="idcategoria[]" value="${idCategoria}">${categoria}</td>
                    <td><input type="hidden" name="idbodegas[]" value="${idBodega}">${idBodega}</td>
                </tr>
            `;
            document.querySelector('#detalles tbody').insertAdjacentHTML('beforeend', row);
        } else {
            alert('Por favor, completa todos los campos antes de agregar.');
        }
    });

    // Eliminar filas dinámicas
    document.querySelector('#detalles').addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('remove-item')) {
            e.target.closest('tr').remove();
        }
    });
</script>
@endsection
