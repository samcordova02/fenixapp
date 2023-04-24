<div class="box box-info padding-1">
    <div class="box-body">
        

        <div class="row">

       <div class="col-md-12">
        <div class="form-group">
            {{ Form::label('Nombre De la Actividad') }}
            {{ Form::text('nombre', $actividade->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

    <div class="col-md-12">
        {{ Form::label('Descripcion De la Actividad a Realizar') }}
        <textarea class="ckeditor form-control" name="descripcion">{{ $actividade->descripcion }}</textarea>
        {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
       
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('costo') }}
            {{ Form::text('costo', $actividade->costo, ['class' => 'form-control' . ($errors->has('costo') ? ' is-invalid' : ''), 'placeholder' => 'Costo $']) }}
            {!! $errors->first('costo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

        <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('status') }}
            {{ Form::text('status', $actividade->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Status']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

        <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('cantidad') }}
            {{ Form::text('cantidad', $actividade->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
            {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

       

        <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('proyectos') }}
            {{ Form::select('proyecto_id', $proyectos, $actividade->proyecto_id, ['class' => 'form-control' . ($errors->has('proyecto_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione el Proyecto']) }}
            {!! $errors->first('proyecto_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

        <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('responsables') }}
            {{ Form::select('responsable_id', $responsables, $actividade->responsable_id, ['class' => 'form-control' . ($errors->has('responsable_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione el Responsable']) }}
            {!! $errors->first('responsable_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

        <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('direcciones') }}
            {{ Form::select('direcion_id', $direcciones, $actividade->direcion_id, ['class' => 'form-control' . ($errors->has('direcion_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione la Direccion']) }}
            {!! $errors->first('direcion_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('Fecha') }}
            {{ Form::date('created_at', $actividade->created_at, ['class' => 'form-control' . ($errors->has('created_at') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese Fecha']) }}
            {!! $errors->first('created_at', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

    <div class="col-md-8">
        <div class="form-group">
            {{ Form::label('imagen') }}
            {{ Form::file('imagen', ['class' => 'form-control' . ($errors->has('imagen') ? ' is-invalid' : ''), 'placeholder' => 'Imagen']) }}
            {!! $errors->first('imagen', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

    </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-outline-primary submit-prevent-button"> <i class="fas fa-upload"></i>{{ __('         Registrar ') }}</button>
    </div>
</div>