@extends('layouts.panel')

@section('content')

          <div class="card shadow">
            <div class="card-header border-0 bg-gradient-success">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Inventario</h3>
                </div>
                <div class="col text-right">
                </div>
              </div>
            </div>
            <div class="card-body bg-gradient-success">
            @if(session('notification'))
               <div class="alert alert-success" role="alert">
                  {{ session('notification') }}
               </div>
            @endif
          </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush ">
                <thead class="thead-light bg-gradient-success">
                  <tr>
                  
                    <th scope="col">id</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Nombre Producto</th>
                    <th scope="col">Codigo</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Info</th>
                    
                    
               
                    
                  </tr>
                </thead>
                <tbody>
                  @foreach($producto as $inventario)
                  <th>{{ $inventario }}</th>
                  <td>
                  <label class="custom-toggle">
                  <input type="checkbox" checked>
                  <span class="custom-toggle-slider rounded-circle"></span>
                  </label>
                  </td>
    
                  @endforeach
        </tbody>
            </div>

            <section class="content">
            <div class="container-fluid">
                
<style type="text/css">


</style>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
    
                 

                
                        <tbody>
                                                    <tr>
                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1</font></font></td>
                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">cascos </font></font></td>
                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Cascos </font></font></td>
                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">xdcfr</font></font></td>
                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Cascos de seguridad </font></font></td>
                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Disponible</font></font></td>
                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">20</font></font></td>
                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Seguridad</font></font></td>
                                <td class="noPrint text-center">
                                    <div class="btn-group">
                                        <a href="http://posshop.bitspecksolutions.com/user/purchase/1651339158" class="btn btn-sm btn-info"><i class="fa fa-info-circle"> </i> </a>
                                                                          </div>
                                </td>
                            </tr>
  
          
@endsection
