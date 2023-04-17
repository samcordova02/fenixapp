@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Detalles') }}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-outline-primary" href="{{ route('actividades.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-outline-primary" href="{{ url('#') }}"> {{ __('Imprimir') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">

                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $actividade->nombre }}
                        </div>
                    </div>

                        <div class="col-md-12">
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {!! $actividade->descripcion !!}
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Proyecto:</strong>
                            {!! $actividade->proyecto->nombre !!}
                        </div>
                    </div>

                        <div class="col-md-4">
                        <div class="form-group">
                            <strong>Costo:</strong>
                            {{ $actividade->costo }}
                        </div>
                    </div>

                        <div class="col-md-4">
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $actividade->status }}
                        </div>
                    </div>

                        <div class="col-md-4">
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $actividade->cantidad }}
                        </div>
                    </div>


                        <div class="col-md-4">
                        <div class="form-group">
                            <strong>Responsable:</strong>
                            {{ $actividade->responsable->nombre }}
                        </div>
                    </div>

                        <div class="col-md-4">
                        <div class="form-group">
                            <strong>Direcion:</strong>
                            {{ $actividade->direccione->descripcion }}
                        </div>
                    </div>

                    </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    @stop

    @section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">
    @stop
    
    @section('js')
        <script> console.log('Hi!'); </script>
    @stop
