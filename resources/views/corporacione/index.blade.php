@extends('adminlte::page')

@section('title', 'Corporaciones')

@section('content_header')
    <h1>Corporaciones</h1>
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
                                <a href="{{ route('corporaciones.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nueva Corporacion') }}
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
										<th>Rif</th>
										<th>Imagen</th>
										<th>Telefono</th>
										<th>Responsable</th>
										<th>Correo</th>
										<th>Gabinete</th>
										<th>Direccion</th>

                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($corporaciones as $corporacione)
                                        <tr>
                                            <td>{{ $corporacione->id }}</td>
                                            
											<td>{{ $corporacione->nombre }}</td>
											<td>{{ $corporacione->rif }}</td>
                                            <td><img src="{{ asset ($corporacione->imagen) }}" class="img-responsive" style="max-height: 100px; max-width: 100px" alt=""></td>
											
											<td>{{ $corporacione->telefono }}</td>
											<td>{{ $corporacione->responsable }}</td>
											<td>{{ $corporacione->correo }}</td>
											<td>{{ $corporacione->gabinete->nombre }}</td>
											<td>{{ $corporacione->direccione->descripcion }}</td>

                                            <td>
                                                <form action="{{ route('corporaciones.destroy',$corporacione->id) }}" method="POST" class="submit-prevent-form">
                                                    <a class="btn btn-sm btn-primary btn-block" href="{{ route('corporaciones.show',$corporacione->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Detalles') }}</a>
                                                    <a class="btn btn-sm btn-success btn-block" href="{{ route('corporaciones.edit',$corporacione->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
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
                {!! $corporaciones->links() !!}
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
    
    @stop
    
