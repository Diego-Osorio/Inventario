@extends('layouts.panel')

@section('content')

<div class="row">
            <div class="col-md-12 mb-4">
            <div class="card">
                <div class="card-header">{{ __('Inicio') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('¡Estás conectado!') }}
                </div>
            </div>
        </div>
          <!-- categoria -->
            <div class="col-xl-3 col-lg-6">
            <a class="nav-link " href="{{url('/categorias')}}">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Categorias</h5>
                    </div>
                    <div class="col-auto">
                      
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-sitemap"></i>
                      <div>
                        
                      </div>
                           
                      </div>
                      
                    </div>
                  </div>
                 
                  
                </div>
              </div>
            </div>
           <!-- usuario -->
            <div class="col-xl-3 col-lg-6">
            <a class="nav-link " href="{{url('/usuarios')}}">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
           
                  <div class="row">
                    <div class="col">
                      <h5s class="card-title text-uppercase text-muted mb-0"> usuarios</h5>
                      <span class="h2 font-weight-bold mb-0"></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
              <!-- productos -->
            <div class="col-xl-3 col-lg-6">
            <a class="nav-link " href="{{url('/productos')}}">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Productos</h5>
                      <span class="h2 font-weight-bold mb-0"></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <i class="fas fa-chart-pie"></i>
                        
                      </div>
                    </div>
                  </div>
                  
                
                </div>
              </div>
            </div>
              <!-- inventario -->
            <div class="col-xl-3 col-lg-6">
            <a class="nav-link " href="{{url('/inventario')}}">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Inventario</h5>
                      <span class="h2 font-weight-bold mb-0"></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                        <i class="fas fa-percent"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
             
@endsection
