@extends ('layouts.admin')
@section ('contenido')
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <h3>Editar Cupo: 
      {{$detalle->grado($detalle->idgrado)}}  {{$detalle->seccion($detalle->idseccion)}} {{$detalle->turno($detalle->idturno)}}</h3>
      @if (count($errors)>0)
      <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
        </ul>
      </div>
      @endif

      {!!Form::model($detalle,['method'=>'PATCH','route'=>['asignacion_cupos.update',$detalle->iddetallegrado]])!!}
            {{Form::token()}}
           <div class="form-group col-md-8">
              <label for="acciones">Cupos</label>
              <div class="input-group">
                {!! Form::number('cupo', null, ['class' => 'form-control' , 'placeholder'=>'Introduza la cantidad de cupos', 'autofocus'=>'on','max'=>99]) !!}<span class="input-group-btn">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <a href="{{URL::action('CupoController@index')}}" class="btn btn-danger">Cancelar</a>
                </span>
              </div>
            </div>

      {!!Form::close()!!}   



            
            
    </div>
  </div>
@endsection