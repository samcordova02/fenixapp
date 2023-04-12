@extends('adminlte::page')

@section('title', 'Corporaciones')


@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Detalles de la Corporacion o Entes') }} </span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('corporaciones.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="row">
                        
                            <div class="col-md-6">
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $corporacione->nombre }}
                        </div>
                    </div>

                        <div class="col-md-6">
                        <div class="form-group">
                            <strong>Rif:</strong>
                            {{ $corporacione->rif }}
                        </div>
                    </div>

                        <div class="col-md-12">
                        <div class="form-group">
                            <strong>Imagen de Perfil:</strong>
                            <img src="{{ asset ($corporacione->imagen) }}" class="rounded mx-auto d-block" style="max-height: 500px; max-width: 500px" alt="">
                            
                        </div>
                    </div>

                        <div class="col-md-4">
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $corporacione->telefono }}
                        </div>
                    </div>

                        <div class="col-md-4">
                        <div class="form-group">
                            <strong>Responsable:</strong>
                            {{ $corporacione->responsable}}
                        </div>
                    </div>

                        <div class="col-md-4">
                        <div class="form-group">
                            <strong>Correo:</strong>
                            {{ $corporacione->correo }}
                        </div>
                    </div>

                        <div class="col-md-4">
                        <div class="form-group">
                            <strong>Gabinete:</strong>
                            {{ $corporacione->gabinete->nombre }}
                        </div>
                    </div>

                        <div class="col-md-4">
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $corporacione->direccione->descripcion }}
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
    
    <script src="{{ asset('js/submit.js') }}"></script>
        <script> console.log('Hi!'); </script>

     
    @stop
