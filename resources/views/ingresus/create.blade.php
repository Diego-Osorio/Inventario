<?php
use Illuminate\Support\Str;
use js\plugins\imput;
?>

@extends('layouts.panel')

@section('content')

          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0"> Nuevo ingreso</h3>
                </div>
              </div>
            </div>
            <div class="card-body">

               @if ($errors->any())
                  @foreach ($errors->all() as $errors) 
                   <div class="alert alert-danger" role="alert">
                    
                    <i class="	fas fa-exclamation-triangle"></i>
                        <strong>Por Favor!!</strong> {{ $errors }}
                   </div>
                @endforeach

              @endif

                <form action="{{url('/ingreso')}}" method="POST">
                    @csrf
                    <form class="container">
                    <div class="row">
                   <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                     <label for="fecha">Fecha</label>
                     <input type="date" name="fecha" class="form-control" value="{{old('date')}}" id="fecha" placeholder="Fecha" required>
                   </div>
                   </div>
                   <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                     <label for="num_documento">Numero de Documento</label>
                     <input type="text" name="ndocumento"class="form-control" value="{{old('ndocumento')}}" id="num_documento" placeholder="Numero de Documento" required>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                      <label for="tipo_documento">Tipo de Documento</label>
                      <select type="date" name="tipo_documento" class="form-control" value="{{old('tipo_documento')}}"id="tipo_documento" placeholder="Tipo de Documento" required>
                         <option value="factura">FACTURA</option>
                         <option value="boleta">BOLETA</option>
                      </select>
                    </div>
                    </div>
                    </div>
                </form>
                  <div class="btn-group" role="group" aria label="">
                  <div id="main">
                          <div class="form-group">
                             <imput type="buttom" id="btAdd" value="Agregar Producto" class ="btn btn-primary float">Añadir Producto</imput>
                             <input type="button" id="btRemove" value="Eliminar" class="btn btn-primary float">
                            <input type="button" id="btRemoveAll" value="Eliminar Todo" class="btn btn-primary float-rigth" /><br />  
                          </div>
                        </div>
                       </div>
                      </div>
                    </div>
                   <form action="{{url('/inventario')}}" method="POST">
                    @csrf
                        <button type="btSubmit" class="btn btn-sm btn-primary ">Ingresar</button>
                           <a href="{{url('/inventario')}}" class="btn btn-sm btn-success">
                           <i class="fas fa-angle-left"></i>  
                              Regresar</a>
                    </form>
                   </div>
                  </div>
                </div>
              </div>
@endsection


