@extends('layouts.app')

@section('template_title')
    {{ $direccione->name ?? "{{ __('Show') Direccione" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Direccione</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-outline-primary" href="{{ route('direcciones.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $direccione->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Municipios Id:</strong>
                            {{ $direccione->municipios_id }}
                        </div>
                        <div class="form-group">
                            <strong>Parroquias Id:</strong>
                            {{ $direccione->parroquias_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
