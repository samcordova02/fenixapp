@extends('layouts.app')

@section('template_title')
    {{ $direccion->name ?? "{{ __('Show') Direccion" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Direccion</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('direccions.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $direccion->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Municipios Id:</strong>
                            {{ $direccion->municipios_id }}
                        </div>
                        <div class="form-group">
                            <strong>Parroquias Id:</strong>
                            {{ $direccion->parroquias_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
