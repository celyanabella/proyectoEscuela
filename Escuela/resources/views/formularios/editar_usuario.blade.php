@extends ('layouts.admin')
@section('contenido')


<div class="row">  

  <div class="col-md-6">

        
                        
                        <div class="box-header">
                          <h3 class="box-title">Editar información del Usuario</h3>
                        </div><!-- /.box-header -->

       



       <form action="{{ url('editar_usuario')}}/{{$usuario->id}}" method="post">
     {{ csrf_field() }}{{ method_field('PUT') }}
                   
          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
          
          <input type="hidden" name="id_usuario" value="<?= $usuario->id; ?>">              


        <div class="box-body ">
        <div class="form-group col-xs-6">
                      <label for="name">Nombre*</label>
                      <input type="text" class="form-control" id="name" name="name" value="<?= $usuario->name; ?>" placeholder="Nombres" >
        </div>
        
       <!-- <div class="form-group col-xs-12">
                              <label for="ocupacion">Ocupacion</label>
                              <input type="text" class="form-control" id="ocupacion" name="ocupacion" value="<?= $usuario->ocupacion; ?>" >
        </div>-->
     
<div class="form-group col-xs-4">
                      <label for="tipoUsuario">Tipo Usuario</label>
                      <select id="tipoUsuario"  name="tipoUsuario" class="form-control" >
                      <?php  for($i=0;$i<=count($tiposusuario)-1;$i++){   ?>
                      <option value="<?= $tiposusuario[$i]->id  ?>" ><?= $tiposusuario[$i]->nombre ?></option>
                      <?php  } ?>
                      </select>
                   
</div>
<div class="form-group col-xs-6">
                      <label for="email">Email*</label>
                      <input type="text" class="form-control" id="email" name="email" value="<?= $usuario->email; ?>" placeholder="email" >
</div>

<div class="form-group col-xs-6">
                      <label for="email">password*</label>
                      <input type="text" class="form-control" id="password" value="<?= $usuario->password; ?>" name="password" p required >
</div>


        </div>



        <div class="box-footer">
             <button type="submit" class="btn btn-primary">Actualizar Datos</button>
        </div>
        </form>
       

  </div> <!-- end col mod 6 -->






</div>  


@endsection