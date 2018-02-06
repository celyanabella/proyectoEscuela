@extends ('layouts.maestro')
@section ('contenido')

<div class="row">
        <div class="col-lg-12">
         <h3 style="color: #00695c;"><b>Grado: </b> {{$nGrado->nombre}} <b>Sección: </b>" {{$nSeccion->nombre}}" <b>Turno: </b> {{$nTurno->nombre}}</h3>
         <p>(Selecciona el Estudiante)</p>  
        </div>
    </div> 

<div class="section">

    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
          @if (Session::has('message'))
            <p class="alert alert-danger">{{ Session::get('message')}}</p>
          @endif
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-striped">
        <thead>
            <th></th>
            <th>Nombre</th>
            <th>1er Trimestre</th>
            <th>2do Trimestre</th>
            <th>3er Trimestre</th>
            <th>Prom 1</th>
            <th>Prom 2</th>
            <th>Prom 3</th>
            <th>Prom Final</th>
            <th>Opciones</th>
        </thead>
            <tbody>
            @foreach ($est as $es)
                <tr>
                    <td>
                        <a href="#"><i class="fa fa-chevron-right  fa-3x fa-fw"></i></a>
                    </td>
                    <td>
                        <h4>
                            <b>{{ $es->apellido }}</b>
                        </h4>
                        <b><p>{{ $es->nombre }}</p></b>
                    </td>
                    <td>
                        <a href="{{ url('userDocente/trim/notas', ['a1' => $nGrado->idgrado, 'a2' => $nSeccion->idseccion, 'a3' => $nTurno->idturno ]) }}"><button class="btn btn-success"><i class="fa fa-fw -square -circle fa-plus-square"></i> </button></a>
                    </td>
                    <td>
                        <a href="{{ url('userDocente/trim/notas', ['a1' => $nGrado->idgrado, 'a2' => $nSeccion->idseccion, 'a3' => $nTurno->idturno ]) }}"><button class="btn btn-success"><i class="fa fa-fw -square -circle fa-plus-square"></i></button></a>
                    </td>
                    <td>
                        <a href="{{ url('userDocente/trim/notas', ['a1' => $nGrado->idgrado, 'a2' => $nSeccion->idseccion, 'a3' => $nTurno->idturno ]) }}"><button class="btn btn-success"><i class="fa fa-fw -square -circle fa-plus-square "></i></button></a>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <a href="#"><button class="btn btn-warning">Ver Detalle</button></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $date }} <a href="{{URL::action('MaestroUserController@index')}}" class="btn btn-danger col-md-offset-8">Regresar</a>
    </div>
</div> 

@endsection


