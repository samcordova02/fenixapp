@extends('layouts.app')

@section('template_title')
    Corporacione
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Corporacione') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('corporaciones.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
										<th>Imagen</th>
										<th>Telefono</th>
										<th>Responsable</th>
										<th>Correo</th>
										<th>Gabinete Id</th>
										<th>Direcion Id</th>

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
@endsection
