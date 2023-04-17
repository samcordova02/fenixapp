@extends('adminlte::page')

@section('title', 'Unidades de Medidades')

@section('content_header')
    <h1>Unidades de Medidades</h1>
@stop
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Unidadmedida</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-outline-primary" href="{{ route('unidadmedidas.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $unidadmedida->nombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @stop
        @section('js')
        <script src="{{ asset('js/submit.js') }}"></script>
        
        
        @stop
    