@extends('adminlte::page')

@section('title', 'Registro de Gabinetes ')

@section('content_header')
    <h1> Registro de Gabinetes </h1>
@stop
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Gabinetes') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('gabinetes.create') }}" class="btn btn-outline-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nuevo') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-condensed table-bordered small">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Nombre</th>
										<th>Responsable</th>
										<th>Imagen</th>
										<th>Telefono</th>
										<th>Correo</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($gabinetes as $gabinete)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $gabinete->nombre }}</td>
											<td>{{ $gabinete->responsable }}</td>
											<td>{{ $gabinete->imagen }}</td>
											<td>{{ $gabinete->telefono }}</td>
											<td>{{ $gabinete->correo }}</td>

                                            <td>
                                                <form action="{{ route('gabinetes.destroy',$gabinete->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-outline-primary " href="{{ route('gabinetes.show',$gabinete->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-outline-success" href="{{ route('gabinetes.edit',$gabinete->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $gabinetes->links() !!}
            </div>
        </div>
    </div>
    @stop

    @section('css')
        
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{ asset('css/submit.css') }}">
        
    @stop
    
    @section('js')
    <script src="{{ asset('js/submit.js') }}"></script>
    
    
    @stop