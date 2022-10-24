<?php
use Illuminate\Support\Str;
?>


@extends('layouts.panel')

@section('content')

          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0"> Nuevo usuario</h3>
                </div>
                <div class="col text-right">
                  <a href="{{url('/usuario')}}" class="btn btn-sm btn-success">
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

                <form action="{{url('/usuario')}}" method="POST">
                    @csrf
                  
                 <div class="form-group">
                    <label for="name">Nombre Del usuario</label>
                    <input type="text"name="name" class="form-control" value="{{ old('name')}}" required>
                 </div>
                 <div class="form-group">
                    <label for="email">Correo electronico</label>
                    <input type="text"name="email" class="form-control" value="{{old('email')}}" >
                 </div>
                    <!-- Brand 
                 <div class="form-group">
                    <label for="rol">Rol </label>
                    <input type="text"name="rol" class="form-control" value="{{old('rol')}}" >
                 </div> -->
                 <div class="form-group">
                    <label for="password">Contraseña </label>
                    <input type="text"name="password" class="form-control" value="{{old('password', Str::random(8)) }}" >
                 </div>
                 <div class="form-group">
                    <label for="phone">Telefono </label>
                    <input type="text"name="phone" class="form-control" value="{{old('phone') }}" >
                 </div>
                 <div class="form-group">
                    <label for="address">Direccion </label>
                    <input type="text"name="address" class="form-control" value="{{old('address') }}" >
                 </div>

                 <button type="submit" class="btn btn-sm btn-primary ">Crear usuario</button>
                </form>
                 </div>
          </div>
@endsection
