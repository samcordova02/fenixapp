@extends('adminlte::page')

@section('title', 'Actividades')

@section('content_header')
    <h1>Actividades</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('actividades.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nueva Actividad') }}
                                </a>
                              </div>
                        </div>
                    </div>
                   
                    @php 
                    $eliminar = false;
                    $editar = false;
                    $registrar = false;
                    $error = false;
                    @endphp

                    @if ($message = Session::get('success'))
                        
                        @php 
                        if($message == 'eliminar')
                        {
                            $eliminar = true;
                        }
                        elseif($message == 'editar')
                        {
                            $editar = true;
                        }
                        elseif($message == 'registrar')
                        {
                            $registrar = true;
                        }
                        elseif($message == 'error')
                        {
                            $error = true;
                        }

                        @endphp

                    @endif

                    <div class="card-body">

                        <form method="GET">
                            <div class="input-group mb-3">
                              <input type="text" name="search" class="form-control" placeholder="Buscar">
                              <button class="btn btn-outline-primary" type="submit" id="button-addon2">Buscar</button>
                            </div>
                            </form>

                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>Id</th>
                                      	<th>Nombre</th>
										<th>Costo</th>
										<th>Status</th>
										<th>Cantidad</th>
										<th>Descripcion</th>
										<th>Proyecto</th>
										<th>Responsable</th>
										<th>Direccion</th>

                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($actividades as $actividade)
                                        <tr>
                                            <td>{{ $actividade->id }}</td>
                                            
											<td>{{ $actividade->nombre }}</td>
											<td>{{ $actividade->costo }}</td>
											<td>{{ $actividade->status }}</td>
											<td>{{ $actividade->cantidad }}</td>
											<td>{!! $actividade->descripcion !!}</td>
											<td>{!! $actividade->proyecto->nombre !!}</td>
											<td>{{ $actividade->responsable->nombre }}</td>
											<td>{{ $actividade->direccione->descripcion }}</td>

                                            <td>
                                                <form action="{{ route('actividades.destroy',$actividade->id) }}" method="POST" class="submit-prevent-form">
                                                    <a class="btn btn-sm btn-primary btn-block" href="{{ route('actividades.show',$actividade->id) }}"><i class="fas fa-print"></i> {{ __('Detalles') }}</a>
                                                    <a class="btn btn-sm btn-success btn-block" href="{{ route('actividades.edit',$actividade->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger submit-prevent-button btn-sm btn-block show-alert-delete-box"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $actividades->links() !!}
            </div>
        </div>
    </div>

    @stop

    @section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">
    @stop
    
    @section('js')

        <script src="{{ asset('js/submit.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/alertaeliminar.js') }}"></script>

        @if($eliminar)
    <script type="text/javascript" src="{{ asset('js/eliminar.js') }}"></script>
    @elseif ($editar)
    <script type="text/javascript" src="{{ asset('js/editar.js') }}"></script>
    @elseif ($registrar)
    <script type="text/javascript" src="{{ asset('js/registrar.js') }}"></script>
    @elseif ($error)
    <script type="text/javascript" src="{{ asset('js/error.js') }}"></script>
    @endif

        <script> console.log('Hi!'); </script>

    @stop
