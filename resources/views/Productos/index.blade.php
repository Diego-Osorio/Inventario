@extends('layouts.panel')

@section('content')

          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Inventarios</h3>
                </div>
                <div class="col text-right">
                  <a href="{{url('')}}" class="btn btn-sm btn-primary"></a>
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
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                  
                    <th scope="col">id</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Nombre Producto</th>
                    <th scope="col">Codigo</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Categoria</th>
                    
                    
               
                    
                  </tr>
                </thead>
                <tbody>
                  @foreach($days as $day)
                  <th>{{ $day }}</th>
                  <td>
                  <label class="custom-toggle">
                  <input type="checkbox" checked>
                  <span class="custom-toggle-slider rounded-circle"></span>
                  </label>
                  </td>
    
                  @endforeach
        </tbody>
            </div>

          
@endsection
