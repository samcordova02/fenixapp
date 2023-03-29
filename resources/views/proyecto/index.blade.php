@extends('adminlte::page')

@section('title', 'Dashboard')


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            
                            <div class="col-3 col-sm-12 col-md-3">
                                <div class="info-box mb-6">
                                  <span class="info-box-icon bg-blue elevation-1"><i class="fas fa-users"></i></span>
                    
                                  <div class="info-box-content">
                                    <span class="info-box-text">Data de Proyectos/span>
                                    <span class="info-box-number">Registrados :</span>
                                  </div>
                                  <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                              </div>

                             <div class="float-right">
                                <a href="{{ route('proyectos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nuevo Proyecto') }}
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
										<th>Duracion</th>
										<th>Costo</th>
										<th>Fecha Inicio</th>
										<th>Fecha Fin</th>
										<th>Status</th>
										<th>Cantidad</th>
										<th>Unidad Id</th>
										<th>Responsable Id</th>
										<th>Corporacion Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($proyectos as $proyecto)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $proyecto->nombre }}</td>
											<td>{{ $proyecto->duracion }}</td>
											<td>{{ $proyecto->costo }}</td>
											<td>{{ $proyecto->fecha_inicio }}</td>
											<td>{{ $proyecto->fecha_fin }}</td>
											<td>{{ $proyecto->status }}</td>
											<td>{{ $proyecto->cantidad }}</td>
											<td>{{ $proyecto->unidad_id }}</td>
											<td>{{ $proyecto->responsable_id }}</td>
											<td>{{ $proyecto->corporacion_id }}</td>

                                            <td>
                                                <form action="{{ route('proyectos.destroy',$proyecto->id) }}" method="POST" class="submit-prevent-form">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('proyectos.show',$proyecto->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('proyectos.edit',$proyecto->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm submit-prevent-button"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $proyectos->links() !!}
            </div>
        </div>
    </div>

    @stop

    @section('css')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{ asset('css/submit.css') }}">
     
        <link rel="stylesheet" href="/css/admin_custom.css">
    @stop
    
    @section('js')

    <script src="{{ asset('js/submit.js') }}"></script>
        <script> console.log('Hi!'); </script>
    @stop
    
