@extends ('layouts.admin')
@section('contenido')




<fieldset class="well the-fieldset">





                
<div class="col-md-12 ">
  <legend class="the-legend"><h1 style="text-align: center;">Asignar Usuario</h1></legend>
</div>




<div class="form-group col-md-12 center-block">

<form  id="f_nuevo_usuario"  method="post"  action="agregar_nuevo_usuario" class=" form_entrada" >                
    
<input type="hidden" name="_token">              
  

<div class="form-group col-md-12">
<div class="form-group col-md-4">
                   
                      <label for="name">Nombre de Usuario</label>
                      <input type="text" class="form-control" id="name" name="name"  placeholder="Nombre de Usuario" p required >
                      
</div>
<div class="form-group col-md-3 col-xs-4">
<form  id=""  method="post"  action="agregar_detalle" class=" form_entrada" >                


                      <label for="mdui">Maestros Disponibles</label>
                      <select id="mdui" name="mdui" class="form-control" >
                      <?php  for($i=0;$i<=count($maestro)-1;$i++){   ?>
                      <option value="<?= $maestro[$i]->mdui  ?>" ><?= $maestro[$i]->nombre  ?> <?= $maestro[$i]->apellido  ?></option>
                      <?php  } ?>
                      </select>
                    
       </form>            
</div>

<div class=" form-group col-md-12 ">
<div class="form-group col-md-5">
  <button type="submit" class="btn btn-primary">Asignar</button>
  </div>
</div>
</form>
</div>





</fieldset>




@endsection