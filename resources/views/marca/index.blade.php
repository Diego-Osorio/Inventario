@extends('layouts.panel')

@section('content')
@switch(true)
@case(auth()->user()->role =='admin')
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Marca</h3>
                </div>
                <div class="col text-right">
                  <a href="{{url('/marca/create')}}" class="btn btn-sm btn-primary">Nueva Marca</a>
                </div>
              </div>
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
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">opciones</th>
                    
                  </tr>
                </thead>
                <tbody>
                  @foreach($marcas as $marcas)
                  <tr>
                    <th scope="row">
                      {{$marcas->nombre}}
                    </th>
                    <td>
                      {{$marcas->descripcion}}
                    </td>
                    <td>
                      
                      <form action="{{url('/marca/'.$marcas->id) }}"method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ url('/marca/'.$marcas->id.'/edit') }}"class="btn btn-sm btn-primary">Editar</a>
                        <button type="submit" class="btn btn-sm btn-danger">Eliminar </button>

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
