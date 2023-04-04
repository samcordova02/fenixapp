<div class="box box-info padding-1">
    <div class="box-body">
        

        <div class="row">

       <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $actividade->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

        <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('costo') }}
            {{ Form::text('costo', $actividade->costo, ['class' => 'form-control' . ($errors->has('costo') ? ' is-invalid' : ''), 'placeholder' => 'Costo']) }}
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
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $actividade->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

        <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('proyecto_id') }}
            {{ Form::text('proyecto_id', $actividade->proyecto_id, ['class' => 'form-control' . ($errors->has('proyecto_id') ? ' is-invalid' : ''), 'placeholder' => 'Proyecto Id']) }}
            {!! $errors->first('proyecto_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

        <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('responsable_id') }}
            {{ Form::text('responsable_id', $actividade->responsable_id, ['class' => 'form-control' . ($errors->has('responsable_id') ? ' is-invalid' : ''), 'placeholder' => 'Responsable Id']) }}
            {!! $errors->first('responsable_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

        <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('direcion_id') }}
            {{ Form::text('direcion_id', $actividade->direcion_id, ['class' => 'form-control' . ($errors->has('direcion_id') ? ' is-invalid' : ''), 'placeholder' => 'Direcion Id']) }}
            {!! $errors->first('direcion_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

    </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary submit-prevent-button">{{ __('Enviar') }}</button>
    </div>
</div>