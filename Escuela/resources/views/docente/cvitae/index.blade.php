@extends ('layouts.admin')
@section ('contenido')
<div class="section">

    <a href="cvitae/create"><button class="btn btn-success"><i class="fa fa-fw -square -circle fa-plus-square"></i> Nuevo Docente</button></a>
    <br><br>

    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            @if (Session::has('message'))
            <div class="alert alert-success">
                 {{ Session::get('message')}}
            </div>
             @endif
            @include('docente.cvitae.search')
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-striped">
        <thead>
            <th></th>
            <th>Nombre</th>
            <th>Fotografía</th>
            <th>Estudios</th>
            <th>Capacitac.</th>
            <th>Trabajos</th>
            <th>Opciones</th>
        </thead>
            <tbody>
            @foreach ($hojas as $ho)
                <tr>
                    <td>
                        <a href="#"><i class="fa fa-chevron-right  fa-3x fa-fw"></i></a>
                    </td>
                    <td>
                        <h4>
                            <b>{{ $ho->apellido }}</b>
                        </h4>
                        <p>{{ $ho->cargo }}</p>
                    </td>
                    <td>
                        <img src="{{asset('imagenes/maestros/fotos/'.$ho->fotografia)}}" alt="{{ $ho->fotografia}}" class="img-circle" width="60">
                    </td>
                    <td>
                        <a href="{{URL::action('MaestroEstudiosController@edit',$ho->id_hoja)}}"><button class="btn btn-success"><i class="fa fa-fw -square -circle fa-plus-square"></i> </button></a>
                    </td>
                    <td>
                        <a href="{{URL::action('MaestroCapacitacionController@edit',$ho->id_hoja)}}"><button class="btn btn-success"><i class="fa fa-fw -square -circle fa-plus-square"></i></button></a>
                    </td>
                    <td>
                        <a href="{{URL::action('MaestroTrabajoController@edit',$ho->id_hoja)}}"><button class="btn btn-success"><i class="fa fa-fw -square -circle fa-plus-square "></i></button></a>
                    </td>
                    <td>
                        <a href="{{URL::action('HojaVidaController@edit',$ho->id_hoja)}}"><button class="btn btn-info">Editar</button></a>
                        <a href="{{URL::action('HojaVidaController@show',$ho->id_hoja)}}"><button class="btn btn-warning">Ver</button></a>
                         <a href="" data-target="#modal-delete-{{$ho->id_hoja}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                    </td>
                </tr>
            </tbody>
            @include('docente.cvitae.modal')
            @endforeach
        </table>
    </div>
    {{$hojas->render()}}
</div>


@endsection


