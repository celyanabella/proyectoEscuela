
<br/><div class='rechazado'><label style='color:#FA206A'><?php  echo $msj; ?></label>  

<?php if( isset($errors) ){ ?>
<ul>
     
      <?php foreach($errors->all() as $error){ ?>
              <li style="color:#FA206A;" ><?= $error  ?></li>
      <?php }  ?>

</ul>

<?php }  ?>


</div> 