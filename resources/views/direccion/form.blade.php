<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $direccion->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('municipios_id') }}
            {{ Form::text('municipios_id', $direccion->municipios_id, ['class' => 'form-control' . ($errors->has('municipios_id') ? ' is-invalid' : ''), 'placeholder' => 'Municipios Id']) }}
            {!! $errors->first('municipios_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('parroquias_id') }}
            {{ Form::text('parroquias_id', $direccion->parroquias_id, ['class' => 'form-control' . ($errors->has('parroquias_id') ? ' is-invalid' : ''), 'placeholder' => 'Parroquias Id']) }}
            {!! $errors->first('parroquias_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>