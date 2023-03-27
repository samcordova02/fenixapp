@extends('adminlte::page')

@section('title', 'Unidades de Medidades')

@section('content_header')
    <h1>Unidades de Medidades</h1>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Crear') }} Unidades Medidas</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('unidadmedidas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('unidadmedida.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
        @stop
        @section('js')
        <script src="{{ asset('js/submit.js') }}"></script>
        
        
        @stop
    