@extends('adminlte::page')


@section('template_title')


@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Detalles Del Gabinete') }} </span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('gabinetes.index') }}"><i class="fas fa-reply-all"></i>{{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                                <div class="row">
                        
                            <div class="col-md-6">
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $gabinete->nombre }}
                        </div>
                                          </div>
                        <div class="form-group">
                            <strong>Responsable:</strong>
                            {{ $gabinete->responsable }}
                        </div>
                            <div class="col-md-12">
                        <div class="form-group">
                          <strong>Imagen de Perfil:</strong>
                            <img src="{{ asset ($gabinete->imagen) }}" class="rounded mx-auto d-block" style="max-height: 500px; max-width: 500px" alt="">
                            
                        </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-12">
                            <strong>Telefono:</strong>
                            {{ $gabinete->telefono }}
                        </div>
                      </div>
                        <div class="form-group">
                            <div class="col-md-12">
                            <strong>Correo:</strong>
                            {{ $gabinete->correo }}
                        </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
