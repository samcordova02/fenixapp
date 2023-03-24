@extends('layouts.app')

@section('template_title')
    Corporacion
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Corporacion') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('corporacions.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Gabinte Id</th>
										<th>Dirrecion Id</th>
										<th>Responsable</th>
										<th>Correo</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($corporacions as $corporacion)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $corporacion->nombre }}</td>
											<td>{{ $corporacion->rif }}</td>
											<td>{{ $corporacion->imagen }}</td>
											<td>{{ $corporacion->telefono }}</td>
											<td>{{ $corporacion->gabinte_id }}</td>
											<td>{{ $corporacion->dirrecion_id }}</td>
											<td>{{ $corporacion->responsable }}</td>
											<td>{{ $corporacion->correo }}</td>

                                            <td>
                                                <form action="{{ route('corporacions.destroy',$corporacion->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('corporacions.show',$corporacion->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('corporacions.edit',$corporacion->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $corporacions->links() !!}
            </div>
        </div>
    </div>
@endsection
