@extends ('layouts.maestro')
@section ('contenido')
    <div class="col-md-12">
    <div class="row">
    	<div class="col-md-12">
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1default" data-toggle="tab">Lenguaje y Literatura</a></li>
                            <li><a href="#tab2default" data-toggle="tab">Matemáticas</a></li>
                            <li><a href="#tab3default" data-toggle="tab">Ciencias Salud y Medio Ambiente</a></li>
                            <li><a href="#tab4default" data-toggle="tab">Estudios Sociales</a></li>
                            <li><a href="#tab5default" data-toggle="tab">Segundo idioma (Inglés)</a></li>
                            <li><a href="#tab6default" data-toggle="tab">Educación Física</a></li>
                            <li><a href="#tab7default" data-toggle="tab">Moral y Cívica</a></li>
                            <li><a href="#tab8default" data-toggle="tab">Informática</a></li>
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1default"> <!-- Inicio del tab1 -->
                            <div class="container">
                                <div class="col-lg-12">
                                    <h3 style="color: #00695c; font-family: all;">Actividad Integradora</h3> 
                                </div>
                            </div> 
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Eval. 1 (%)</th>
                                                <th class="text-center">Eval. 2 (%)</th>
                                                <th class="text-center">Eval. 3 (%)</th>
                                                <th class="text-center">Eval. 4 (%)</th>
                                                <th class="text-center">Eval. 5 (%)</th>
                                                <th class="text-center">Prom.</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                {!! Form::number('n1', null, ['class' => 'form-control' , 'placeholder'=>'...']) !!}
                                                </td>
                                                <td>
                                                {!! Form::number('n2', null, ['class' => 'form-control' , 'placeholder'=>'...']) !!}
                                                </td>
                                                <td>
                                                {!! Form::number('n3', null, ['class' => 'form-control' , 'placeholder'=>'...']) !!}
                                                </td>
                                                <td>
                                                {!! Form::number('n4', null, ['class' => 'form-control' , 'placeholder'=>'...']) !!}
                                                </td>
                                                <td>
                                                {!! Form::number('n5', null, ['class' => 'form-control' , 'placeholder'=>'...']) !!}
                                                </td>
                                                <td>
                                                {!! Form::number('p1', null, ['class' => 'form-control' , 'disabled'=>'true']) !!}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="container">
                                <div class="col-lg-12">
                                    <h3 style="color: #00695c; font-family: all;">Cuaderno</h3> 
                                </div>
                            </div> 
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Eval. 1 (%)</th>
                                                <th class="text-center">Eval. 2 (%)</th>
                                                <th class="text-center">Eval. 3 (%)</th>
                                                <th class="text-center">Eval. 4 (%)</th>
                                                <th class="text-center">Eval. 5 (%)</th>
                                                <th class="text-center">Prom.</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                {!! Form::number('n6', null, ['class' => 'form-control' , 'placeholder'=>'...']) !!}
                                                </td>
                                                <td>
                                                {!! Form::number('n7', null, ['class' => 'form-control' , 'placeholder'=>'...']) !!}
                                                </td>
                                                <td>
                                                {!! Form::number('n8', null, ['class' => 'form-control' , 'placeholder'=>'...']) !!}
                                                </td>
                                                <td>
                                                {!! Form::number('n9', null, ['class' => 'form-control' , 'placeholder'=>'...']) !!}
                                                </td>
                                                <td>
                                                {!! Form::number('n10', null, ['class' => 'form-control' , 'placeholder'=>'...']) !!}
                                                </td>
                                                <td>
                                                {!! Form::number('p2', null, ['class' => 'form-control' , 'disabled'=>'true']) !!}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="container">
                                    <div class="col-md-4">
                                        <h3 style="color: #00695c; font-family: all;">Proyeto</h3> 
                                    </div>
                                </div> 
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Eval. 1 (%)</th>
                                                <th class="text-center">Eval. 2 (%)</th>
                                                <th class="text-center">Eval. 3 (%)</th>                        <th class="text-center">Prom.</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                {!! Form::number('n11', null, ['class' => 'form-control' , 'placeholder'=>'...']) !!}
                                                </td>
                                                <td>
                                                {!! Form::number('n12', null, ['class' => 'form-control' , 'placeholder'=>'...']) !!}
                                                </td>
                                                <td>
                                                {!! Form::number('n13', null, ['class' => 'form-control' , 'placeholder'=>'...']) !!}
                                                </td>
                                                <td>
                                                {!! Form::number('p3', null, ['class' => 'form-control' , 'disabled'=>'true']) !!}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="container">
                                    <div class="col-md-4">
                                    <h3 style="color: #00695c; font-family: all;">Prueba Obj.</h3> 
                                    </div>
                                </div> 
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Eval. (%)</th>  
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                {!! Form::number('n14', null, ['class' => 'form-control' , 'placeholder'=>'...']) !!}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <a href="{{URL::action('MaestroUserController@index')}}" class="btn btn-danger pull-left col-md-offset-2">Cancelar</a>
                            <div class="col-md-2 col-md-offset-2">
                                <div class="input-group">
                                    <input type="number" disabled class="form-control" name="searchText" value="0.0">
                                    <span class="input-group-btn">
                                        <button id='calcular' class="btn btn-info">Calcular</button>
                                    </span>
                                </div>
                            </div>
                            <button  class="btn btn-primary  col-md-offset-2">Guardar</button>
                        </div> <!-- Fin del tab1 -->

                        <div class="tab-pane fade" id="tab2default">Default 2</div>
                        <div class="tab-pane fade" id="tab3default">Default 3</div>
                        <div class="tab-pane fade" id="tab4default">Default 4</div>
                        <div class="tab-pane fade" id="tab5default">Default 5</div>
                        <div class="tab-pane fade" id="tab6default">Default 6</div>
                        <div class="tab-pane fade" id="tab7default">Default 7</div>
                        <div class="tab-pane fade" id="tab8default">Default 8</div>
                    </div>
                </div>
            </div>
        </div>
	</div>
    </div>
@endsection