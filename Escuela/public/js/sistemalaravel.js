function irarriba(){
$('html, body').animate({scrollTop:0}, 300);
}

function cargarformulario(arg){
//funcion que carga todos los formularios del sistema
 
		if(arg==1){ var url = "form_nuevo_usuario"; }
    if(arg==2){ var url = "form_cargar_datos_usuarios";  }
    if(arg==3){ var url = "form_enviar_correo";  }

		$("#contenido_principal").html($("#cargador_empresa").html());   
		$.get(url,function(resul){
      $("#contenido_principal").html(resul);
    })
        

}



function cargarlistado(listado){

    //funcion para cargar los diferentes  en general
if(listado==1){ var url = "listado_usuarios"; }
if(listado==2){ var url = "listado_graficas"; }

$("#contenido_principal").html($("#cargador_empresa").html());
$.get(url,function(resul){

  $("#contenido_principal").html(resul); 
})

}




 $(document).on("submit",".form_entrada",function(e){

//funcion para atrapar los formularios y enviar los datos

       e.preventDefault();
        
        $('html, body').animate({scrollTop: '0px'}, 200);
        
        var formu=$(this);
        var quien=$(this).attr("id");
        var rs=false; //leccion 10
        var seccion_sel=  $("#seccion_seleccionada").val();

        
        if(quien=="f_nuevo_usuario"){ var varurl="agregar_nuevo_usuario"; var divresul="notificacion_resul_fanu";  rs=true;}
        if(quien=="f_editar_usuario"){ var varurl="editar_usuario"; var divresul="notificacion_resul_feu"; }
         if(quien=="f_cambiar_password"){ var varurl="cambiar_password"; var divresul="notificacion_resul_fcp"; }
        if(quien=="f_agregar_educacion"){ var varurl="agregar_educacion_usuario"; var divresul="notificacion_resul_faedu";  rs=true; }  //leccion 10
   
   
        $("#"+divresul+"").html($("#cargador_empresa").html());

              $.ajax({

                    type: "POST",
                    url : varurl,
                    datatype:'json',
                    data : formu.serialize(),
                    success : function(resul){
                        $("#"+divresul+"").html(resul);
                        if(rs ){$('#'+quien+'').trigger("reset");}
                        if(quien=="f_agregar_educacion"){ mostrarseccion(seccion_sel);}
                        
                    },
      
                     error: function(data){

                     var lista_errores="";
                     var errors = $.parseJSON(data.responseText);
                     var titulo="<br/><div class='rechazado'><label style='color:#FA206A'>Existen Errores de Validacion</label><ul>";
                      $.each(errors,function(index, value) {
                             lista_errores+='<li style="color:#FA206A;" >'+value+'</li>';
                      })
                     var footer="</ul></div>";
                     var htmlmensaje= titulo+lista_errores+ footer;
                     
                     $("#"+divresul+"").html(htmlmensaje); 
                    
      
                    }




                });
irarriba();

})



  


$(document).on("click",".pagination li a",function(e){
//para que la pagina se cargen los elementos
 e.preventDefault();
 var url =$( this).attr("href");
 $("#contenido_principal").html($("#cargador_empresa").html());
 $.get(url,function(resul){
    $("#contenido_principal").html(resul); 
 })

})


  //leccion 7 
function mostrarficha(id_usuario,tipo) {
  //funcion para mostrar y etditar la informacion del usuario
 
  $("#usuario_seleccionado").val(id_usuario); // leccion10
  $("#capa_modal").show();
  $("#capa_para_edicion").show();
  if(tipo==1){var url = "form_editar_usuario/"+id_usuario+""; }else{ var url = "info_datos_usuario/"+id_usuario+""; }
  $("#contenido_capa_edicion").html($("#cargador_empresa").html());  //leccion 10
  $.get(url,function(resul){
  $("#contenido_capa_edicion").html(resul);  //leccion 10
  })
irarriba();
}


$(document).on("click",".div_modal",function(e){
 //funcion para ocultar las capas modales
 $("#capa_modal").hide();
 $("#capa_para_edicion").hide();
 $("#contenido_capa_edicion").html("");  //leccion 10

})  


  //leccion 8 y 9
$(document).on("submit",".formarchivo",function(e){

    
        e.preventDefault();
        var formu=$(this);
        var nombreform=$(this).attr("id");
        var rs=false; //leccion 10
        var seccion_sel=  $("#seccion_seleccionada").val();
        if(nombreform=="f_subir_imagen" ){ var miurl="subir_imagen_usuario";  var divresul="notificacion_resul_fci";   }
        if(nombreform=="f_cargar_datos_usuarios" ){ var miurl="cargar_datos_usuarios";  var divresul="notificacion_resul_fcdu"; rs=true; }
        if(nombreform=="f_agregar_publicacion" ){ var miurl="agregar_publicacion_usuario";  var divresul="notificacion_resul_fap"; rs=true; }
        if(nombreform=="f_agregar_proyectos" ){ var miurl="agregar_proyectos_usuario";  var divresul="notificacion_resul_fapr"; rs=true; }
         if(nombreform=="f_enviar_correo" ){ var miurl="enviar_correo";  var divresul="contenido_principal";   }

        //información del formulario
        var formData = new FormData($("#"+nombreform+"")[0]);

        //hacemos la petición ajax   
        $.ajax({
            url: miurl,  
            type: 'POST',
     
            // Form data
            //datos del formulario
            data: formData,
            //necesario para subir archivos via ajax
            cache: false,
            contentType: false,
            processData: false,
            //mientras enviamos el archivo
            beforeSend: function(){
              $("#"+divresul+"").html($("#cargador_empresa").html());                
            },
            //una vez finalizado correctamente
            success: function(data){
              $("#"+divresul+"").html(data);
              $("#fotografia_usuario").attr('src', $("#fotografia_usuario").attr('src') + '?' + Math.random() );  

                 if(rs ){
                         $('#'+nombreform+'').trigger("reset");
                         mostrarseccion(seccion_sel);
                        }             
            },
            //si ha ocurrido un error
            error: function(data){
               alert("ha ocurrido un error") ;
                
            }
        });

irarriba();

});

//leccion  10
 
function mostrarseccion(arg){
  var id_usuario=$("#usuario_seleccionado").val(); 
  $("#seccion_seleccionada").val(arg);
  if(arg==1){ var url = "form_editar_usuario/"+id_usuario+""; }
  if(arg==2){ var url = "form_educacion_usuario/"+id_usuario+""; }
  if(arg==3){ var url = "form_publicaciones_usuario/"+id_usuario+""; } //leccion 11
  if(arg==4){ var url = "form_proyectos_usuario/"+id_usuario+""; } //leccion 11
  
  $("#contenido_capa_edicion").html($("#cargador_empresa").html());
  $.get(url,function(resul){
  $("#contenido_capa_edicion").html(resul);
  })

}

//leccion 16
function mostrarseccionSTD(arg){
  var id_usuario=$("#usuario_seleccionado").val(); 
  $("#seccion_seleccionada").val(arg);
  if(arg==1){ var url = "info_datos_usuario/"+id_usuario+""; }
  $("#contenido_capa_edicion").html($("#cargador_empresa").html());
  $.get(url,function(resul){
  $("#contenido_capa_edicion").html(resul);
  })

}


function borrareducacion(arg){
  var url="borrar_educacion/"+arg+"" ;
  var divresul="notificacion_resul_edu";
  $("#"+divresul+"").html($("#cargador_empresa").html());

  $.get(url,function(resul){
    $("#"+divresul+"").html(resul);
    mostrarseccion(2);
  })

}


function mostrardiv_publicaciones(arg){
  $("#info_libro").hide();
  $("#info_revista").hide();
  if(arg==5){ $("#info_libro").show(); $("#info_revista").hide();  } 
  if(arg==4){ $("#info_libro").hide(); $("#info_revista").show();  } 

}

function borrarpublicacion(arg){
  var url="borrar_publicacion/"+arg+"" ;
  var divresul="notificacion_resul_fapu";
  $("#"+divresul+"").html($("#cargador_empresa").html());

  $.get(url,function(resul){
    $("#"+divresul+"").html(resul);
    mostrarseccion(3);
    
  })


}


function borrarproyecto(arg){
  var url="borrar_proyecto/"+arg+"" ;
  var divresul="notificacion_resul_faprd";
  $("#"+divresul+"").html($("#cargador_empresa").html());

  $.get(url,function(resul){
    $("#"+divresul+"").html(resul);
    mostrarseccion(4);
  })

}


function buscarusuario(){

  var pais=$("#select_filtro_pais").val();
  var dato=$("#dato_buscado").val();
      if(dato == "")
    {  
      var url="buscar_usuarios/"+pais+"";
    }
    else
    {
      var url="buscar_usuarios/"+pais+"/"+dato+"";
    }
  
  $("#contenido_principal").html($("#cargador_empresa").html());
 $.get(url,function(resul){
    $("#contenido_principal").html(resul);  
  })

}

//leccion 13

$(document).on("change",".email_archivo",function(e){
   
    var miurl="cargar_archivo_correo";
   // var fileup=$("#file").val();
    var divresul="texto_notificacion";

    var data = new FormData();
    data.append('file', $('#file')[0].files[0] );
 

   
    console.log(data);


  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('#_token').val()
        }
    });


     $.ajax({
            url: miurl,  
            type: 'POST',
     
            // Form data
            //datos del formulario
            data: data,
            //necesario para subir archivos via ajax
            cache: false,
            contentType: false,
            processData: false,
            //mientras enviamos el archivo
            beforeSend: function(){
              $("#"+divresul+"").html($("#cargador_empresa").html());                
            },
            //una vez finalizado correctamente
            success: function(data){
              var codigo='<div class="mailbox-attachment-info"><a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>'+ data +'</a><span class="mailbox-attachment-size"> </span></div>';
              $("#"+divresul+"").html(codigo);
                        
            },
            //si ha ocurrido un error
            error: function(data){
               $("#"+divresul+"").html(data);
                
            }
        });



})






