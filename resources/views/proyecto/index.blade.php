@extends('adminlte::page')

@section('title', 'Proyecto')


@section('content')
    <div class="container-fluid">

         <!-- /.col -->
         <div class="row">
         <section class="content">
            <div class="container-fluid">
         <div class="col-md-12 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-blue"><i class="far fa-copy"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Proyectos </span>
                <span class="info-box-number"> </span>
              </div>
              
            </div>
        </div>
        </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('proyectos.create') }}" class="btn btn-outline-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nuevo Proyecto') }}
                                </a>
                              </div>
                        </div>
                    </div>

                    <?php 
                    $eliminar = false;
                    $editar = false;
                    $registrar = false;
                    $error = false;
                    ?>

                    @if ($message = Session::get('success'))
                        

                        <?php 
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
                        }elseif($message == 'error')
                        {
                            $error = true;
                        }

                        
                        ?>
                    @endif

                    <div class="card-body">

                            <form method="GET">
                            <div class="input-group mb-3">
                              <input type="text" name="search" class="form-control" placeholder="Buscar">
                              <button class="btn btn-outline-primary" type="submit" id="button-addon2">Buscar</button>
                            </div>
                            </form>

                        <div class="table-responsive">
                            <table class="table table table-striped table-hover table-condensed table-bordered small">
                                {{-- <table class="table table-striped table-hover"> --}}
                                <thead class="thead">
                                    <tr>
                                        <th>Id</th>
                                        
										<th>Nombre</th>
										<th>Duracion</th>
										<th>Costo</th>
										
										<th>Estado</th>
                                        <th>Tipo</th>
										<th>Cantidad</th>
										
										<th>Corporacion</th>

                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($proyectos as $proyecto)
                                        <tr>
                                            <td>{{ $proyecto->id }}</td>
                                            
											<td style="width: 40%">{!! 'Responsable: ' . $proyecto->responsable->nombre . ' Proyecto: ' .$proyecto->nombre !!}</td>
											<td>{{ $proyecto->duracion .' Inicio: ' . $proyecto->fecha_inicio . ' Fin: ' . $proyecto->fecha_fin }}</td>
											<td>{{ number_format($proyecto->costo, 2,',','.') }}</td>
											
											<td>{{ $proyecto->status }}</td>
                                            <td>{{ $proyecto->tipo }}</td>
											<td>{{ $proyecto->cantidad . ' ' . $proyecto->unidadmedida->nombre }}</td>
											
											<td>{{ $proyecto->corporacione->nombre }}</td>

                                            <td>
                                                <form action="{{ route('proyectos.destroy',$proyecto->id) }}" method="POST" class="submit-prevent-form">
                                                    <a class="btn btn-sm btn-outline-primary" href="{{ route('proyectos.show',$proyecto->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('') }}</a>
                                                    <a class="btn btn-sm btn-outline-primary" href="{{ route('proyectos.edit',$proyecto->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-primary btn-sm submit-prevent-button show-alert-delete-box"><i class="fa fa-fw fa-trash"></i> {{ __('') }}</button>
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
    
