<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $parroquia->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('municipios_id') }}
            {{ Form::text('municipios_id', $parroquia->municipios_id, ['class' => 'form-control' . ($errors->has('municipios_id') ? ' is-invalid' : ''), 'placeholder' => 'Municipios Id']) }}
            {!! $errors->first('municipios_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-outline-primary">{{ __('Submit') }}</button>
    </div>
</div>