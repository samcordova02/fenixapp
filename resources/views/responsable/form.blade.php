
<div class="box box-info padding-1">

    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $responsable->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
           <div class="col-md-6">
         <div class="form-group">
            {{ Form::label('telefono') }}
            {{ Form::text('telefono', $responsable->telefono, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
            {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
        <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('correo') }}
            {{ Form::text('correo', $responsable->correo, ['class' => 'form-control' . ($errors->has('correo') ? ' is-invalid' : ''), 'placeholder' => 'Correo']) }}
            {!! $errors->first('correo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
        <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('cargo') }}
            {{ Form::text('cargo', $responsable->cargo, ['class' => 'form-control' . ($errors->has('cargo') ? ' is-invalid' : ''), 'placeholder' => 'Cargo']) }}
            {!! $errors->first('cargo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
        <div class="col-md-6">
        <div class="form-group">                 
            {{ Form::label('Seleccione una Imagen de Perfil') }}
            {{ Form::file('imagen', ['class' => 'form-control' . ($errors->has('imagen') ? ' is-invalid' : ''), 'placeholder' => 'Imagen']) }}
            {!! $errors->first('imagen', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <br>
        <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('Corporacion o Entes') }}
             {{ Form::select('corporacion_id', $corporaciones, $responsable->corporacion_id, ['class' => 'form-control' . ($errors->has('corporacion_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione uno']) }}
        </div>
    </div>
   </br>
    </div>
</div>
    
        <button type="submit" class="btn btn-primary">{{ __('Registrar') }}</button>
    </div>
</div>

