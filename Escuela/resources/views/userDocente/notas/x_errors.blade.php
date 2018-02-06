@extends ('layouts.maestro')
@section ('contenido')

    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
          @if (Session::has('message'))
            <p class="alert alert-danger">{{ Session::get('message')}}</p>
          @endif
        </div>
    </div>

    <a href="{{URL::action('MaestroUserController@index')}}" class="btn btn-danger col-md-offset-7">Regresar</a>

@endsection


