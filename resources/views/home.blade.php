@extends('layouts.panel')

@section('content')

<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <h4 class="mb-4">¡Bienvenido, {{ auth()->user()->name }}!</h4>

                <div class="row">
                    @if(auth()->user()->role =='admin')
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a class="card-link" href="{{ url('/categorias') }}">
                                <div class="card bg-primary text-white shadow">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h5 class="text-uppercase mb-0">Categorías</h5>
                                                <span class="h2 font-weight-bold">{{ $categorias }}</span>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-sitemap fa-2x"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <a class="card-link" href="{{ url('/usuario') }}">
                                <div class="card bg-success text-white shadow">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h5 class="text-uppercase mb-0">Usuarios</h5>
                                                <span class="h2 font-weight-bold">{{ $usuarios }}</span>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-users fa-2x"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <a class="card-link" href="{{ url('/ingreso') }}">
                                <div class="card bg-info text-white shadow">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h5 class="text-uppercase mb-0">Ingresos</h5>
                                                <span class="h2 font-weight-bold">{{ $ingreso }}</span>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-chart-pie fa-2x"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <a class="card-link" href="{{ url('/bodegas') }}">
                                <div class="card bg-warning text-white shadow">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h5 class="text-uppercase mb-0">Bodegas</h5>
                                                <span class="h2 font-weight-bold">{{ $bodegas }}</span>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-warehouse fa-2x"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @elseif(auth()->user()->role =='usuario')
                        <div class="col-xl-6 col-md-6 mb-4">
                            <a class="card-link" href="{{ url('/categorias') }}">
                                <div class="card bg-primary text-white shadow">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h5 class="text-uppercase mb-0">Categorías</h5>
                                                <span class="h2 font-weight-bold">{{ $categorias }}</span>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-sitemap fa-2x"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-6 col-md-6 mb-4">
                            <a class="card-link" href="{{ url('/ingreso') }}">
                                <div class="card bg-primary text-white shadow">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h5 class="text-uppercase mb-0">Ingresos</h5>
                                                <span class="h2 font-weight-bold">{{ $ingreso }}</span>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-chart-pie fa-2x"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
