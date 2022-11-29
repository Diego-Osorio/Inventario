@extends('layouts.panel')
@section('content')
@switch(true)
@case(auth()->user()->role =='usuarios')
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
                  @foreach($ingresar as $ingreso)
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
                      <form action="{{url('/ingreso/'.$ingresos->id) }}"method="POST">
                        @csrf
                        <a href="{{ url('/ingreso/'.$ingresos->id.'/show') }}"class="btn btn-sm btn-primary">Detalles</a>
                        </form>
                      
                      </td>
                      
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          @endswitch
  @endsection

                