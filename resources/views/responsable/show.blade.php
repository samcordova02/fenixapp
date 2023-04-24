@extends('layouts.app')

@section('template_title')
    {{ $responsable->name ?? "{{ __('Show') Responsable" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Detalles De Responsables ') }} Responsable</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('responsables.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $responsable->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $responsable->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Correo:</strong>
                            {{ $responsable->correo }}
                        </div>
                        <div class="form-group">
                            <strong>Cargo:</strong>
                            {{ $responsable->cargo }}
                        </div>
                        <div class="form-group">
                            <strong>Imagen:</strong>
                            {{ $responsable->imagen }}
                        </div>
                        <div class="form-group">
                            <strong>Corporacion Id:</strong>
                            {{ $responsable->corporacion_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
