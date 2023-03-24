@extends('layouts.app')

@section('template_title')
    Direccion
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Direccion') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('direccions.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Descripcion</th>
										<th>Municipios Id</th>
										<th>Parroquias Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($direccions as $direccion)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $direccion->descripcion }}</td>
											<td>{{ $direccion->municipios_id }}</td>
											<td>{{ $direccion->parroquias_id }}</td>

                                            <td>
                                                <form action="{{ route('direccions.destroy',$direccion->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('direccions.show',$direccion->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('direccions.edit',$direccion->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $direccions->links() !!}
            </div>
        </div>
    </div>
@endsection
