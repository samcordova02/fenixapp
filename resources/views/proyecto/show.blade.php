@extends('adminlte::page')

@section('title', 'Detalles del Proyecto')

@section('content_header')
    <h1>Proyectos</h1>
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
                        &nbsp;&nbsp;
                        &nbsp;&nbsp;
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('proyectos.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                        &nbsp;&nbsp;
                        &nbsp;&nbsp;
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ url('#') }}"> {{ __('Imprimir') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $proyecto->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Duracion:</strong>
                            {{ $proyecto->duracion }}
                        </div>
                        <div class="form-group">
                            <strong>Costo:</strong>
                            {{ $proyecto->costo }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Inicio:</strong>
                            {{ $proyecto->fecha_inicio }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Fin:</strong>
                            {{ $proyecto->fecha_fin }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $proyecto->status }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $proyecto->cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Unidad de Medida:</strong>
                            {{ $proyecto->unidadmedida->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Responsable:</strong>
                            {{ $proyecto->responsable->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Corporacion:</strong>
                            {{ $proyecto->corporacione->nombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    @stop

    @section('css')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{ asset('css/submit.css') }}">
     
        <link rel="stylesheet" href="/css/admin_custom.css">
    @stop
    
    @section('js')

    <script src="{{ asset('js/submit.js') }}"></script>
        <script> console.log('Hi!'); </script>
    @stop
    