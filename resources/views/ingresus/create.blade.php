<?php
use Illuminate\Support\Str;
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
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="fecha">Fecha</label>
                        <input type="date" class="form-control" id="fecha" placeholder="Fecha" name="fecha" value="{{old('fecha') }}" >
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="num_documento">Numero de Documento</label>
                        <input type="text" class="form-control" id="ndocumento" name="ndocumento" placeholder="Numero de Documento"value="{{old('ndocumento')}}">
                    </div>
                    </div>
                  
                <div class="col-md-4  col-sm-12">
                    <div class="form-group">
                      <label for="tipodocumento">Tipo de Documento</label>
                      <select type="select" class="form-control" id="tipodocumento" name="tipodocumento" placeholder="tipodocumento" value="{{old('tipodocumento')}}" >
                        <option value="#">Seleciona </option>
                         <option value="FACTURA">FACTURA</option>
                        <option value="BOLETA">BOLETA</option>
                      </select>
                    </div>
                </div>
            
           
                <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                        <label for="codigo">Codigo producto</label>
                        <input type="text" name="codigo" id="codigo" class="form-control" placeholder="codigo">
                    </div>
                </div>
                <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                        <label for="nombre">Nombre producto</label>
                        <input type="text" name="producto" id="producto" class="form-control" placeholder="nombre">
                    </div>
                </div>
                <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                        <label for="idcategoria">Categorias</label>
                        <select name="idcategoria" id="idcategoria" class="form-control">
                            @foreach($categorias as $categoria)
                            <option value="{{$categoria->id}}"> {{$categoria->name}}</option>
                            @endforeach
                            </select>
                    </div>
               </div>
                <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                   <label for="ordencompra"> Ingrese Orden de Compra</label>
                   <input type="text" name="ordencompra"> 
                  
                    </div>
               </div>

               <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                        <label for="idcategoria">Marca</label>
                        <select name="idmarca" id="idmarca" class="form-control">
                            @foreach($marcas as $marca)
                            <option value="{{$marca->id}}"> {{$marca->nombre}}</option>
                            @endforeach
                            </select>
                    </div>
               </div>
                <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" name="cantidad" id="cantidad" class="form-control" placeholder="cantidad">
                    </div>              
                </div>
                <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                        <label for="idcategoria">Bodega</label>
                        <select name="idbodegas" id="idbodegas" class="form-control">
                            @foreach($bodegas as $bodega)
                            <option value=""> {{$bodegas->nombre}}</option>
                            @endforeach
                            </select>
                    </div>
               </div>
                <div class="col-md-3 col-sm-12">
                  <div class="form-group">
                    <button type="button" name="bt_add" id="bt_add" class="btn btn-primary">Agregar</button>
                 </div>
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 m-3">
                    <table id="detalles"class="table table-striped table-bordered table-condensed table-hover">
                        <thead style="background-color:#825ee4">
                            <th >opciones</th>
                            <th >Nombre</th>
                            <th >Codigo</th>
                            <th >Cantidad</th>
                            <th >Marca</th>
                            <th >Categorias</th>
                            <th>Ubicacion</th>

                         </thead> 
                        <tfoot>
                          <th ></th>
                          <th ></th>
                          <th ></th>
                          <th ></th> 
                          <th ></th>
                          <th ></th>
                          <th></th>
                      </tfoot>
                    </table>
                </div>
               <div class="form-group">
                        <input name="_token" value="{{csrf_token() }}" type="hidden"></input>
                </div>
                <div class="col-md-6 col-xs-12 col-sm-12">
                    <button type="submit" class="btn btn-primary">Ingresar </button>
                </div>
                <div class="col-md-6 col-xs-12 col-sm-12">
                    <a href="{{url('/ingreso')}}" class="btn btn-success ">
                        <i class="fas fa-angle-left"></i>Regresar
                    </a>
                </div>
            </div>
        </form>  
    </div>
</div>  

@endsection