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
            <input type="date" class="form-control" id="fecha" placeholder="Fecha">
         </div>
     </div>
     <div class="col-md-3 col-sm-12">
       <div class="form-group">
         <label for="num_documento">Numero de Documento</label>
         <input type="text" class="form-control" id="num_documento" placeholder="Numero de Documento"/>
       </div>
     </div>
     <div class="col-md-3 col-sm-12">
       <div class="form-group">
         <label for="tipo_documento">Tipo de Documento</label>
         <select type="date" class="form-control" id="tipo_documento" placeholder="Tipo de Documento">
           <option value="factura">FACTURA</option>
           <option value="boleta">BOLETA</option>
         </select>
       </div>
     </div>
   </div>
</form>
                    <form class="row"
                     <div class="btn-group" role="group" aria label="">
                            <div id="main">
                              <div class="form-group">
                    <imput type="buttom" id="btAdd" value="Agregar Producto" class ="btn btn-primary float">Añadir Producto</imput>
                  
                    <input type="button" id="btRemove" value="Eliminar" class="btn btn-primary float">
                    <input type="button" id="btRemoveAll" value="Eliminar Todo" class="btn btn-primary float-rigth" /><br />
    
                     </div>
 
                    <div id="view_uploading_img" class="col-md-12 d-none">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-10">
                                        <img src="http://posshop.bitspecksolutions.com/uploads" id="view_uploading_img_src" width="200">
                                    </div>
                                </div>
                            </div>
                        </div> 
                         <!-- end col-md-3 -->
                        
                 </div>
</form>
                      
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
        
      </section>
      
    </div>
@endsection


