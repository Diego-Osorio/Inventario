@extends('layouts.panel')
@section('content')
@switch(true)
@case(auth()->user()->role =='admin')

<div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Listado de Ingreso</h3>
                </div>
                <a class="btn btn-sm btn-primary" href="#" id="navbar-default_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ni ni-fat-add"></i>
                        <span class="nav-link-inner--text ">Reporte</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar">
                        <a class="dropdown-item" href="{{url('ingreso/export')}}">Generar Reporte Excel</a>
                        <a class="dropdown-item" href="{{ url('download-pdf') }}"">Descargar en PDF</a>
                    </div>
                <div class="col text-right">
                  <a href="{{url('/ingreso/create')}}" class="btn btn-sm btn-primary">Nuevo ingreso</a>
                  </div>
                  </div>
                  <div class="col-md-3 col-sm-12">
               <li class="nav-item dropdown">
                    <a class="nav-link nav-link-icon" href="#" id="navbar-default_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ni ni-fat-add"></i>
                        <span class="nav-link-inner--text ">Filtrar</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar">
                        <a class="nav-link" href="#">Todo</a>
                        <a class="dropdown-item" href="FACTURA">Solo  FACTURA</a>
                        <a class="dropdown-item" href="BOLETA">Solo  BOLETA</a>
                    </div>
</div>
</li> 
               <div class=d-md-flex-justify-content-md-end">
               <form action="url('/ingreso.index')" method="GET">
                <div class="btn-group">
                <input type="texto"  name="Buscar "class="form-control">
                <input type="submit" value="Buscar" class="btn btn-primary">
                </div>
               </form>
</div>
            <div class="card-body">
            @if(session('notification'))
               <div class="alert alert-success" role="alert">
                  {{ session('notification') }}
               </div>
            @endif
          </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <div class="box-body">        
               <div class="row">             
                <div class="col-sm-12">       
                  <table id="example1" class="table  table-bordered table-hover dataTable no-footer">
          

                <thead>
                  <tr>
                  <th scope="col">fecha</th>
                  <th scope="col">ndocumento</th>
                  <th scope="col">tipodocumento</th>
                  <th scope="col">opciones</th>

                 </tr>
                </thead>
                <tbody>
                  @foreach($ingresos as $ingreso)
                  <tr>
                    <th scope="row">
                      {{$ingreso->fecha}}
                    </th>
                    <td>
                      {{$ingreso->ndocumento}}
                    </td>
                    <td>
                      {{$ingreso->tipodocumento}}
                      </td>
                     <td>
                      <form action="{{url('/ingreso/'.$ingreso->id) }}"method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ url('/ingreso/'.$ingreso->id.'/show') }}"class="btn btn-sm btn-primary">Detalles</a>
                        <button type="submit" class="btn btn-sm btn-danger">Anular </button>

                      
                        </form>
                      
                      </td>
                      
                    </tr>
                    @endforeach
              
                  </tbody>
                </table>
              </div> 
              <div class="card-body">
             {{$ingresos->links()}}
            </div>
          </div>

</div>
</div>          
          @break
        @case(auth()->user()->role =='usuario')
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Listado de Ingreso</h3>
                </div>
          </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                  <th scope="col">fecha</th>
                  <th scope="col">ndocumento</th>
                  <th scope="col">tipodocumento</th>
                  <th scope="col">opciones</th>

                 </tr>
                </thead>
                <tbody>
                  @foreach($ingresos as $ingreso)
                  <tr>
                    <th scope="row">
                      {{$ingreso->fecha}}
                    </th>
                    <td>
                      {{$ingreso->ndocumento}}
                    </td>
                    <td>
                      {{$ingreso->tipodocumento}}
                      </td>
                     <td>
                      <form action="{{url('/ingreso/'.$ingreso->id) }}"method="POST">
                        @csrf
                        <a href="{{ url('/ingreso/'.$ingreso->id.'/show') }}"class="btn btn-sm btn-primary">Detalles</a>
                        </form>
                      
                      </td>
                      
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          @break
          @endswitch
                   @endsection

                