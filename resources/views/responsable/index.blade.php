@extends('layouts.app')

@section('template_title')
    Responsable
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Responsable') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('responsables.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Telefono</th>
										<th>Correo</th>
										<th>Cargo</th>
										<th>Imagen</th>
										<th>Corporacion Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($responsables as $responsable)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $responsable->nombre }}</td>
											<td>{{ $responsable->telefono }}</td>
											<td>{{ $responsable->correo }}</td>
											<td>{{ $responsable->cargo }}</td>
											<td>{{ $responsable->imagen }}</td>
											<td>{{ $responsable->corporacion_id }}</td>

                                            <td>
                                                <form action="{{ route('responsables.destroy',$responsable->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('responsables.show',$responsable->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('responsables.edit',$responsable->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $responsables->links() !!}
            </div>
        </div>
    </div>
@endsection
