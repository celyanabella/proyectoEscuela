@extends ('layouts.maestro')
@section ('contenido')

    <div class="row">
        <div class="col-lg-12">
         <h2>Evaluaciones</h2>
         <p>(Selecciona el curso)</p>   
        </div>
    </div>   

      <!-- TURNO MATUTINO  --> 
    <div class="col-md-6">
        <div class="row text-center pad-top">
        <fieldset >     
            <legend>MATUTINO</legend>

       

            @foreach($asig_mat as $asm)

            <a href="{{ url('userDocente/lista1/estudiante', ['a1' => $asm->id_asignacion, 'a2' => $asm->id_asignacion,'nG'=>$asm->nombregrado , 'nS'=>$asm->nombreseccion,'nT'=>$asm->nombreturno, 'nM'=>$asm->nombremateria]) }}" >
              <div class="boot col-lg-4 col-md-4 col-sm-4 col-xs-12">
                  <div class="div-square">
                       <i class="fa fa-book fa-5x"></i>
                @if($asm->nombremateria !="")
                  <h4>{{$asm->nombremateria}}</h4>
                @else
                   <h4>N/A</h4>
                @endif
                  <p4>{{$asm->nombregrado}}</p4>
                  <p4> "{{$asm->nombreseccion}}"</p4>                  
                  </div>     
              </div>
              </a>

              @endforeach

          </fieldset>
        </div>
    </div>   


    <div class="col-md-6">
        <div class="row text-center pad-top">
        <fieldset >     
            <legend>VESPERTINO</legend>

            @foreach($asig_ver as $asv)
 
            <a href="{{ url('userDocente/lista1/estudiante', ['a1' => $asv->id_asignacion, 'a2' => $asv->id_asignacion,'nG'=>$asv->nombregrado , 'nS'=>$asv->nombreseccion,'nT'=>$asv->nombreturno, 'nM'=>$asv->nombremateria]) }}" >
              <div class="boot col-lg-4 col-md-4 col-sm-4 col-xs-12">
                  <div class="div-square">
                       <i class="fa fa-edit fa-5x"></i>
                @if($asv->nombremateria !="")
                  <h4>{{$asv->nombremateria}}</h4>
                @else
                  <h4>N/A</h4>
                @endif
                  <p4>{{$asv->nombregrado}}</p4>
                  <p4> "{{$asv->nombreseccion}}"</p4>
                  </div>     
              </div>
              </a>

              @endforeach

          </fieldset>
        </div>
    </div>

    {{$date}}    

@endsection


