@extends ('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Listado de Docentes <a href="cvitae/create"><button class="btn btn-success">Nuevo</button></a></h3>
        @if (Session::has('message'))
            <p class="alert alert-danger">{{ Session::get('message')}}</p>
        @endif
    </div>
</div>



@endsection