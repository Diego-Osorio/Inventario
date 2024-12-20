@extends('layouts.panel')

@section('content')

          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0"> Nueva marca</h3>
                </div>
                <div class="col text-right">
                  <a href="{{url('/marca')}}" class="btn btn-sm btn-success">
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

              <form action="{{ url('/marca') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nombre">Nombre de la Marca</label>
        <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
    </div>
    <div class="form-group">
        <label for="descripcion">Descripción</label>
        <input type="text" name="descripcion" class="form-control" value="{{ old('descripcion') }}">
    </div>
    <button type="submit" class="btn btn-sm btn-primary">Crear Marca</button>
</form>
                 </div>
          </div>
@endsection
