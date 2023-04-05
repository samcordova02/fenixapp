<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $direccione->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Municipios') }}
            {{ Form::select('municipios_id', $municipio, $direccione->municipios_id, ['class' => 'form-control' . ($errors->has('municipios_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione El Municipio']) }}
            {!! $errors->first('municipios_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Parroquias') }}
            {{ Form::select('parroquias_id', $parroquia, $direccione->parroquias_id, ['class' => 'form-control' . ($errors->has('parroquias_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciones La Parroquia']) }}
            {!! $errors->first('parroquias_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>