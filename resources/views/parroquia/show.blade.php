@extends('layouts.app')

@section('template_title')
    {{ $parroquia->name ?? "{{ __('Show') Parroquia" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Parroquia</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-outline-primary" href="{{ route('parroquias.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $parroquia->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Municipios Id:</strong>
                            {{ $parroquia->municipios_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
