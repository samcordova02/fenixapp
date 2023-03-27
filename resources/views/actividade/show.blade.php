@extends('layouts.app')

@section('template_title')
    {{ $actividade->name ?? "{{ __('Show') Actividade" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Actividade</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('actividades.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $actividade->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Costo:</strong>
                            {{ $actividade->costo }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $actividade->status }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $actividade->cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $actividade->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Proyecto Id:</strong>
                            {{ $actividade->proyecto_id }}
                        </div>
                        <div class="form-group">
                            <strong>Responsable Id:</strong>
                            {{ $actividade->responsable_id }}
                        </div>
                        <div class="form-group">
                            <strong>Direcion Id:</strong>
                            {{ $actividade->direcion_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
