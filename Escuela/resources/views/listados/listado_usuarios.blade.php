
@extends ('layouts.admin')
@section('contenido')



<div class="box-header">
 
      
        

                 
</div>

<div class="box-body">              
<?php 

if( count($usuarios) >0){
?>

<div class="table-responsive">
    <table id="tabla_pacientes" class="display table table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
             
                <th>Nombre</th>
                <th>Email</th>
                <th>Tipo</th>
                <th>Fecha de Registro</th>
                <th>Acción</th>
            </tr>
        </thead>
 
        
       
        <tbody>


        <?php 

        foreach($usuarios as $usuario){  
        ?>

            <tr role="row" class="odd">
                <td class="mailbox-messages mailbox-name" ><a   style="display:block"><i class="fa fa-user"></i>&nbsp;&nbsp;<?= $usuario->name ?></a></td>
                <td><?= $usuario->email;  ?></td>
                <td><span class="label label-primary "><?= $usuario->tipo($usuario->tipoUsuario);   ?></span></td>
                <td><?= $usuario->created_at;  ?></td>
                 <td>
                 <a  href="form_editar_usuario/{{$usuario->id}}" class="btn btn-primary"><i class="fa fa-edit"> Editar </i></a></td>
                 <td><form action="{{ url('eliminar')}}/{{$usuario->id}}" method="post">
                 {{ csrf_field() }}{{ method_field('DELETE') }}
                 <button type="submit" action="" class="btn btn-primary label-danger"><i class="fa fa-trash"> Eliminar</i></button></form></td>            
            </tr>
        </tbody>
<?php        
}
?>

    </table>
</div>

    <?php


echo str_replace('/?', '?', $usuarios->render() )  ;

}
else
{

?>


<br/><div class='rechazado'><label style='color:#FA206A'>...No se ha encontrado ningun usuario...</label>  </div> 

<?php
}

?>
</div>



@endsection

