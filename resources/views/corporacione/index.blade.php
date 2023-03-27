<<<<<<< HEAD
@extends('adminlte::page')

@section('title', 'Registro de Corporaciones ')

@section('content_header')
    <h1> Registro de Corporaciones</h1>
@stop
=======
@extends('layouts.app')

@section('template_title')
    Corporacione
@endsection
>>>>>>> proyecto

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
<<<<<<< HEAD
                                {{ __('Corporaciones') }}
=======
                                {{ __('Corporacione') }}
>>>>>>> proyecto
                            </span>

                             <div class="float-right">
                                <a href="{{ route('corporaciones.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
<<<<<<< HEAD
                                  {{ __('Crear Nuevo') }}
=======
                                  {{ __('Create New') }}
>>>>>>> proyecto
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
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Nombre</th>
										<th>Rif</th>
<<<<<<< HEAD
										<th>Imagen De la Coporacion</th>
										<th>Telefono</th>
										<th>Gabinete </th>
										<th>Direcion </th>
										<th>Responsable</th>
										<th>Correo</th>
=======
										<th>Imagen</th>
										<th>Telefono</th>
										<th>Responsable</th>
										<th>Correo</th>
										<th>Gabinete Id</th>
										<th>Direcion Id</th>
>>>>>>> proyecto

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($corporaciones as $corporacione)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $corporacione->nombre }}</td>
											<td>{{ $corporacione->rif }}</td>
											<td>{{ $corporacione->imagen }}</td>
											<td>{{ $corporacione->telefono }}</td>
<<<<<<< HEAD
											<td>{{ $corporacione->gabinete_id }}</td>
											<td>{{ $corporacione->direcion_id }}</td>
											<td>{{ $corporacione->responsable }}</td>
											<td>{{ $corporacione->correo }}</td>

                                            <td>
                                                <form action="{{ route('corporaciones.destroy',$corporacione->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('corporaciones.show',$corporacione->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver ') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('corporaciones.edit',$corporacione->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Borrar') }}</button>
=======
											<td>{{ $corporacione->responsable }}</td>
											<td>{{ $corporacione->correo }}</td>
											<td>{{ $corporacione->gabinete_id }}</td>
											<td>{{ $corporacione->direcion_id }}</td>

                                            <td>
                                                <form action="{{ route('corporaciones.destroy',$corporacione->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('corporaciones.show',$corporacione->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('corporaciones.edit',$corporacione->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
>>>>>>> proyecto
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
<<<<<<< HEAD
    @stop

    @section('css')
        
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{ asset('css/submit.css') }}">
        
    @stop
    
    @section('js')
    <script src="{{ asset('js/submit.js') }}"></script>
    
    
    @stop
    
=======
@endsection
>>>>>>> proyecto
