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

                  <div class="form-group ">
                                <label class="control-label clear"> N° de documento </label>
                                <input class="form-control" name="numer" type="text" value="">
                    </div>
                    <label for="example-date-input" class="form-control-label">Descripcion</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        <label for="example-date-input" class="form-control-label">Cantidad</label>
                        <input class="form-control" type="number" value="0" id="example-number-input"></imput>
                    
                     </div>
                        </div>
                        
                        <!-- end col-md-3 -->
                              <span class="select2-selection__arrow" role="presentation"><b role="presentation"></b>
                           </span>
</div>
</div>

</div>

                           <div class="btn-group" role="group" aria label="">
                    <imput type="buttom1" id="btAdd1" value="Agregar Producto" class ="btn btn-primary float">Añadir Producto</imput>
                    
                    <input type="button" id="btRemove" value="Eliminar" class="btn btn-primary float">
                    <input type="button" id="btRemoveAll" value="Eliminar Todo" class="btn btn-primary float-rigth" /><br />
    
                     </div>
                        </span>
                     </span>
                     <span class="dropdown-wrapper" aria-hidden="true">
                     </span>
                  </span>
                           </div>
                           
                                          
                           
                          
                
                        </div>
                        <div class="col-md-4 col-sm-6">

                                                            
                            
                     
 
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
            
        </div>
        
      </section>
      
    </div>

</div>
@endsection

