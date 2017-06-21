@extends ('layouts.admin')
@section('contenido')



<h1 style="text-align: center;"><b>Bienvenido</b></h1> 
<b><h2 style="color: blue; text-align: center;">{{$usuarioactual->name}}</b></h2>


		<div class="col-sm-6 col-md-4 col-md-offset-4">
            <figure>
					<img src="{{asset('imagenes/alumnos/logo.png')}}">
            </figure>
        </div>


@endsection