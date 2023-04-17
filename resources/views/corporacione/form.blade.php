<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="row">

            <div class="col-md-12">
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $corporacione->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

        <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('rif') }}
            {{ Form::text('rif', $corporacione->rif, ['class' => 'form-control' . ($errors->has('rif') ? ' is-invalid' : ''), 'placeholder' => 'Rif']) }}
            {!! $errors->first('rif', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

        

        <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('telefono') }}
            {{ Form::text('telefono', $corporacione->telefono, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
            {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

        <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('responsable') }}
            {{ Form::text('responsable', $corporacione->responsable, ['class' => 'form-control' . ($errors->has('responsable') ? ' is-invalid' : ''), 'placeholder' => 'Responsable']) }}
            {!! $errors->first('responsable', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

        <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('correo') }}
            {{ Form::text('correo', $corporacione->correo, ['class' => 'form-control' . ($errors->has('correo') ? ' is-invalid' : ''), 'placeholder' => 'Correo']) }}
            {!! $errors->first('correo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

        <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('gabinete') }}
            {{ Form::select('gabinete_id', $gabinetes, $corporacione->gabinete_id, ['class' => 'form-control' . ($errors->has('gabinete_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione uno']) }}
            {!! $errors->first('gabinete_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

        <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('direccion') }}
            {{ Form::select('direcion_id', $direcciones, $corporacione->direcion_id, ['class' => 'form-control' . ($errors->has('direcion_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione uno']) }}
            {!! $errors->first('direcion_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {{ Form::label('imagen') }}
            {{ Form::file('imagen', ['class' => 'form-control' . ($errors->has('imagen') ? ' is-invalid' : ''), 'placeholder' => 'Imagen']) }}
            {!! $errors->first('imagen', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>


    </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-outline-primary submit-prevent-button">{{ __('Enviar') }}</button>
    </div>
</div>