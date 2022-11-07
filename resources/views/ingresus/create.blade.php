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

    <div class="row">
        <div class="col-md-12">
        <div class="card-header">   
       
    
            <div class="card card-default">
                  <div class="card-body">
      
               

                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                           <div class="form-group">
                            <label for="example-date-input" class="form-control-label">Fecha</label>
                           <input class="form-control" type="date" value="" id="example-date-input">
                    </div>
                     </div>
                        </div>
                        
                        <!-- end col-md-3 -->
                        <div class="col-md-4 col-sm-6">

                        <div class="form-group ">
                                <label class="control-label clear"> Tipo de Documento </label>
                                <select id="category_id" class="form-control select2 select2-hidden-accessible" name="category_id" data-select2-id="category_id" tabindex="-1" aria-hidden="true"><option value="0" data-select2-id="2">Selecciona tipo de documento</option>
                                <option value="3">Factura</option>
                                <option value="4">Boleta</option>
                               
                              </select>
                            
                              <span class="select2-selection__arrow" role="presentation"><b role="presentation"></b>
                           </span>
                        </span>
                     </span>
                     <span class="dropdown-wrapper" aria-hidden="true">
                     </span>
                  </span>
                           </div>
                           
                        <div class="form-group ">
                                <label class="control-label clear"> N° de documento </label>
                                <input class="form-control" name="numer" type="text" value="">
                    </div>
                                                      
                           
                          
                
                        </div>
                        <div class="col-md-4 col-sm-6">

                                                            
                            
                     </div>
                     <div id="main">
                     <div class="form-group">
                    <div class="btn-group" role="group" aria label="">
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
        
      </section>
      
    </div>
@endsection


