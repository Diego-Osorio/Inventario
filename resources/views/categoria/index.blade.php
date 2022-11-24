@extends('layouts.panel')
@section('content')
@switch(true)
        @case(auth()->user()->role =='usuarios')
        <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Categorias</h3>
                </div>
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
                    <form action="{{url('/categorias/'.$categorias->id) }}"method="POST">
                        @csrf
                        </form
                    
                  </tr>
                  @endforeach
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
          @endswitch
@endsection
