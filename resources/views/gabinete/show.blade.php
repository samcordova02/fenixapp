@extends('layouts.app')

@section('template_title')
    {{ $gabinete->name ?? "{{ __('Show') Gabinete" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Gabinete</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-outline-primary" href="{{ route('gabinetes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $gabinete->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Responsable:</strong>
                            {{ $gabinete->responsable }}
                        </div>
                        <div class="form-group">
                            <strong>Imagen:</strong>
                            {{ $gabinete->imagen }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $gabinete->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Correo:</strong>
                            {{ $gabinete->correo }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
