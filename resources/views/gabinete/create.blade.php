@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Gabinete
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Gabinete</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('gabinetes.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('gabinete.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<div class="col-lg-3 col-6">

    <div class="small-box bg-warning">
    <div class="inner">
    <h3>44</h3>
    <p>User Registrations</p>
    </div>
    <div class="icon">
    <i class="ion ion-person-add"></i>
    </div>
    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
    </div>
