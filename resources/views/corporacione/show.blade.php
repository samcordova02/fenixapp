@extends('layouts.app')

@section('template_title')
    {{ $corporacione->name ?? "{{ __('Show') Corporacione" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Corporacione</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('corporaciones.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $corporacione->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Rif:</strong>
                            {{ $corporacione->rif }}
                        </div>
                        <div class="form-group">
                            <strong>Imagen:</strong>
                            {{ $corporacione->imagen }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $corporacione->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Gabinete Id:</strong>
                            {{ $corporacione->gabinete_id }}
                        </div>
                        <div class="form-group">
                            <strong>Direcion Id:</strong>
                            {{ $corporacione->direcion_id }}
                        </div>
                        <div class="form-group">
                            <strong>Responsable:</strong>
                            {{ $corporacione->responsable }}
                        </div>
                        <div class="form-group">
                            <strong>Correo:</strong>
                            {{ $corporacione->correo }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
