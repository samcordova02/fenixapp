@extends('adminlte::page')

@section('title', 'Detalles de Actividades')


@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Detalles de Actividades') }}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('actividades.index') }}"><i class="fas fa-reply-all"></i> {{ __('Regresar') }}</a>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ url('#') }}"><i class="fas fa-print"></i> {{ __('Imprimir') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">

                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Nombre De La Actividad:</strong>
                            {{ $actividade->nombre }}
                        </div>
                    </div>

                        <div class="col-md-12">
                        <div class="form-group">
                            <strong>Descripcion De La Actividad:</strong>
                            {!! $actividade->descripcion !!}
                        </div>
                    </div>
                                            <div class="col-md-12">
                        <div class="form-group">
                            <strong>Imagen De La Actividad:</strong>
                            <img src="{{ asset ($actividade->imagen) }}" class="rounded mx-auto d-block" style="max-height: 500px; max-width: 500px" alt="">
                            
                        </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Proyecto :</strong>
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
