@extends('layouts.panel')

@section('content')

          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0"> Editar Categorias</h3>
                </div>
                <div class="col text-right">
                  <a href="{{url('/categorias')}}" class="btn btn-sm btn-success">
                  <i class="fas fa-angle-left"></i>  
                  
                  Regresar</a>
                  
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

                <form action="{{url('/categorias/'.$categoria->id )}}" method="POST">
                    @csrf
                    @method('PUT')
                 <div class="form-group">
                    <label for="name">Nombre De Categoria</label>
                    <input type="text"name="name" class="form-control" value="{{ old('name',$categoria->name )}}" required>
                 </div>
                 <div class="form-group">
                    <label for="description">Descripcion</label>
                    <input type="text"name="description" class="form-control" value="{{ old('description', $categoria->description )}}" >
                 </div>
                 <button type="submit" class="btn btn-sm btn-primary ">Guardar Categoria</button> 
                </form>
                 </div>
          </div>
@endsection
