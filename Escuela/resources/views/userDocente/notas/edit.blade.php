@extends ('layouts.maestro')
@section ('contenido')
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
                        <th style="color: red;" class="text-center">Promedio</th>
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
                        {!! Form::text('p1', null, ['class' => 'form-control' ,'disabled'=>'true']) !!}
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
                        <th style="color: red;" class="text-center">Promedio</th>
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
                        <th class="text-center">Eval. 3 (%)</th>                        
                        <th style="color: red;" class="text-center">Promedio</th>
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
    
    <a href="#" class="btn btn-primary  col-md-offset-2">Guardar</a>
@endsection


