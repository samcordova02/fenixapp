@extends('adminlte::page')

@section('title', 'Registro de Parroquis ')


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Parroquias') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('parroquias.create') }}" class="btn btn-outline-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nueva') }}
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
                                        
										<th>Nombre De la Parroquia</th>
										<th>Municipios </th>
                                        <th>Estado </th>
                                        <th>Opciones  </th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($parroquias as $parroquia)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $parroquia->nombre }}</td>
											<td>{{ $parroquia->municipio->nombre }}</td>
                                            <td>{{$parroquia->municipio->estado->nombre }}</td>
                                          

                                            <td>
                                                <form action="{{ route('parroquias.destroy',$parroquia->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-outline-primary " href="{{ route('parroquias.show',$parroquia->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-outline-success" href="{{ route('parroquias.edit',$parroquia->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $parroquias->links() !!}
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
    