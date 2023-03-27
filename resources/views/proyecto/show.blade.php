@extends('layouts.app')

@section('template_title')
    {{ $proyecto->name ?? "{{ __('Show') Proyecto" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Proyecto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('proyectos.index') }}"> {{ __('Back') }}</a>
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
                            <strong>Unidad Id:</strong>
                            {{ $proyecto->unidad_id }}
                        </div>
                        <div class="form-group">
                            <strong>Responsable Id:</strong>
                            {{ $proyecto->responsable_id }}
                        </div>
                        <div class="form-group">
                            <strong>Corporacion Id:</strong>
                            {{ $proyecto->corporacion_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
