@extends ('layouts.admin')
@section('contenido')



{!!Form::open(array('url'=>'asignacion_cupos','method'=>'POST','autocomplete'=>'off', 'files'=>'true'))!!}
            {{Form::token()}}

<fieldset class="well the-fieldset">
<div class="col-md-12 col-md-offset-0">
  <legend class="the-legend"><h1 style="text-align: center;">Asignación de Cupos</h1></legend>
</div>
  <div class="row">

    <div class="col-md-12">
      <div class="form-group col-md-3">
        <div class="form-group">
        <label>Grado</label>
        {{ Form::select('idgrado', $grado->pluck('nombre','idgrado'), null, ['class'=>'form-control']) }}
        </div>
      </div>
      <div class="form-group col-md-3">
          <div class="form-group">
          <label>Seccion</label>
          {{ Form::select('idseccion', $seccion->pluck('nombre','idseccion'), null, ['class'=>'form-control']) }}
          </div>
      </div>
      <div class="form-group col-md-3">
          <div class="form-group">
          <label>Turno</label>
          {{ Form::select('idturno', $turno->pluck('nombre','idturno'), null, ['class'=>'form-control']) }}
          </div>
      </div>
    </div>
    <div class="col-md-12">
    <div class="form-group col-md-3">
        <div class="form-group">
          <label>Cupos</label>
          {!! Form::number('cupo', null, ['class' => 'form-control' , 'placeholder'=>'Introduza la cantidad de cupos', 'autofocus'=>'on','max'=>99]) !!}
        </div>
      </div>
      </div>
    </div>



  <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" id="guardar">
      <div class="form-group">
      <input name="_token" value="{{csrf_token()}}" type="hidden"></input>
              <button class="btn btn-primary col-md-0 col-md-offset-0" type="submit">Guardar</button>
              <a href="{{URL::action('CupoController@index')}}" class="btn btn-danger col-md-0 col-md-offset-1">Cancelar</a>
            </div>
    </div>
{!!Form::close()!!}







@endsection
