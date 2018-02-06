
<!-- Se extiende el Index de acuerdo al usuario que ingreso -->

<!-- Administrador -->
@if($usuarioactual->tipoUsuario==1) 
	@include('inicio.index_admin')
@endif

<!-- Maestro -->
@if($usuarioactual->tipoUsuario==2) 
	@include('inicio.index_maestro')
@endif



