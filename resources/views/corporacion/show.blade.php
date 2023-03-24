@extends('layouts.app')

@section('template_title')
    {{ $corporacion->name ?? "{{ __('Show') Corporacion" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Corporacion</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('corporacions.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $corporacion->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Rif:</strong>
                            {{ $corporacion->rif }}
                        </div>
                        <div class="form-group">
                            <strong>Imagen:</strong>
                            {{ $corporacion->imagen }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $corporacion->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Gabinte Id:</strong>
                            {{ $corporacion->gabinte_id }}
                        </div>
                        <div class="form-group">
                            <strong>Dirrecion Id:</strong>
                            {{ $corporacion->dirrecion_id }}
                        </div>
                        <div class="form-group">
                            <strong>Responsable:</strong>
                            {{ $corporacion->responsable }}
                        </div>
                        <div class="form-group">
                            <strong>Correo:</strong>
                            {{ $corporacion->correo }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
