@extends('layouts.panel')

@section('content')

          <div class="card shadow">
            <div class="card-header  bg-gradient-success ">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Usuarios</h3>
                </div>
                <div class="col text-right">
                  <a href="{{url('/usuario/create')}}" class="btn btn-sm btn-primary">Nuevo usuario</a>
                </div>
              </div>

            <div class="card-body header bg-gradient-success ">
            @if(session('notification'))
               <div class="alert alert-success" role="alert">
                  {{ session('notification') }}
               </div>
            @endif
          </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light bg-gradient-success">
                  <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Role</th>
                    <th scope="col">Opciones</th>
                    

                    
                  </tr>
                </thead>
                <tbody>
                @foreach($admins as $admin)
                  <tr>
                    <th scope="row">
                      {{$admin->name}}
                    </th>
                    <td>
                      {{$admin->email}}
                    </td>
                    <td>
                      {{$admin->role}}
                    </td>
                    
                    <td>
                      
                      <form action="{{url('/usuario/'.$admin->id) }}"method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ url('/usuario/'.$admin->id.'/edit') }}"class="btn btn-sm btn-primary">Editar</a>
                        <button type="submit" class="btn btn-sm btn-danger">Eliminar </button>

                      </form>
                      
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="card-body">
             {{$admins->links()}}
            </div>
          </div>
@endsection
