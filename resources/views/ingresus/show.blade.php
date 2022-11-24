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
   
        <form action="{{url('/ingreso')}}" method="POST">
            @csrf 
            <div class="form-group">   
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="fecha">Fecha</label>
                        <p>{{$ingreso->fecha}}</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="num_documento">Numero de Documento</label>
                        <p>{{$ingreso->ndocumento}}</p>
                    </div>
                </div>
                <div class="col-md-4  col-sm-12">
                    <div class="form-group">
                      <label for="tipodocumento">Tipo de Documento</label>
                     <p>{{$ingreso->tipodocumento}}</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                        <label for="codigo">codigo producto</label>
                        <p>{{$productos->codigo}}</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                        <label for="nombre">Nombre producto</label>
                        <p>{{$productos->nombre}}</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                        <label for="idcategoria">categorias</label>
                        <p>{{$productos->categoria_id}}</p>
                    </div>
               </div>
               <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                        <label for="idmarca">marca</label>
                        <p>{{$productos->marca_id}}</p>
                    </div>
               </div>
                <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                        <label for="cantidad">cantidad</label>
                        <p>{{$productos->stock}}</p>
                    </div>              
                </div>
               <div class="form-group">
                        <input name="_token" value="{{csrf_token() }}" type="hidden"></input>
                </div>
               
                    </a>
                </div>
            </div>
        </form>  
    </div>
</div>
@endsection