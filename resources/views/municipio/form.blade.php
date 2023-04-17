<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $municipio->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estados_id') }}
            {{ Form::text('estados_id', $municipio->estados_id, ['class' => 'form-control' . ($errors->has('estados_id') ? ' is-invalid' : ''), 'placeholder' => 'Estados Id']) }}
            {!! $errors->first('estados_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-outline-primary">{{ __('Submit') }}</button>
    </div>
</div>