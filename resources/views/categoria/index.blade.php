@extends('layouts.panel')

@section('content')

          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Categorias</h3>
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
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">opciones</th>
                    
                  </tr>
                </thead>
                <tbody>
                  @foreach($categories as $categorias)
                  <tr>
                    <th scope="row">
                      {{$categorias->name}}
                    </th>
                    <td>
                      {{$categorias->descripcion}}
                    </td>

                    <td>
                      {{$categorias->stock}}
                    </td>
                    <td>
                      
                      <form action="{{url('/categoria/'.$categorias->id) }}"method="POST">
                        @csrf
                        @method('DELETE')
                      </form>
                      
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
@endsection
