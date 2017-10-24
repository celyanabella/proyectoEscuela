@extends ('layouts.admin')
@section('contenido')




<fieldset class="well the-fieldset">





                
<div class="col-md-12 ">
  <legend class="the-legend"><h1 style="text-align: center;">Nuevo Usuario</h1></legend>
</div>




<div class="form-group col-md-12 center-block">

<form  id="f_nuevo_usuario"  method="post"  action="agregar_nuevo_usuario" class=" form_entrada" >                
    
<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">              
  

<div class="form-group col-md-12">
<div class="form-group col-md-4">
                   
                      <label for="name">Nombre de Usuario</label>
                      <input type="text" class="form-control" id="name" name="name"  placeholder="Nombre de Usuario" p required >
                      
</div>


<div class="form-group col-md-3 col-xs-4">

                      <label for="id_tipo">Tipo Usuario</label>
                      <select id="id_tipo" name="id_tipo" class="form-control" >
                      <?php  for($i=0;$i<=count($tiposusuario)-1;$i++){   ?>
                      <option value="<?= $tiposusuario[$i]->id  ?>" ><?= $tiposusuario[$i]->nombre ?> </option>
                      <?php  } ?>
                      </select>
                    
                   
</div>
<div class="form-group col-md-3 col-xs-4">

                      <label for="maestros">Seleccione un Maestro</label>
                      <select id="maestros" name="maestros" class="form-control" >
                      <?php  for($i=0;$i<=count($maestros)-1;$i++){   ?>
                      <option value="<?= $maestros[$i]->mdui  ?>" ><?= $maestros[$i]->nombre ?> </option>
                      <?php  } ?>
                      </select>
                    
                   
</div>
</div>
<div class="form-group col-md-12">
<div class="form-group col-md-4">

                      <label for="email">Email*</label>
                      <input type="text" class="form-control" id="email" name="email" placeholder="email" p required>
                      </div>

<div class="form-group col-md-3">

                      <label for="email">password*</label>
                      <input type="password" class="form-control" id="password" name="password" p required >
                      </div>



</div>


<div class=" form-group col-md-12 ">
<div class="form-group col-md-5">
  <button type="submit" class="btn btn-primary">Guardar</button>
  </div>
</div>
</form>
</div>





</fieldset>




@endsection