<?php
    include 'librerias.php';
    session_start();  
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <script src="<?=URL?>/js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form id="frmusuario" action="<?=URL?>/controlador/ValidaUsuario.php" method="post">
            <div><label>Usuario:</label><input id="nomusuario" type="text" name="nomusuario" ></div>
            <div><label>Clave:</label><input id="clave" type="password" name="clave" ></div>
            <input id="enviar" type="button" onclick="" value="Enviar"> 
            <div id="mensaje"></div>
        </form>
        <div id="infoSession"></div>
    </body>
    <script>
    $(document).ready(function(){
            $("#enviar").click(function(){
                /*$("form").hide();
                alert("Ocultaste el formulario ;-) "+ $("#nomusuario").val());*/
        
                if ($("#nomusuario").val()!="" && $("#clave").val()!=""){
                    ///*$("#frmusuario").submit();
                        $.ajax({url:"<?=URL?>/controlador/ValidaUsuario.php"
                            ,type:'post'
                            ,data:{'nomusuario':$("#nomusuario").val(),
                                'clave':$("#clave").val()
                                }
                            ,success:function(resultado){
                                if(resultado == "Todo bien"){
                                    $("#frmusuario").hide();
                                    $("#mensaje").hide();
                                    $("#infoSession").show();
                                    $("#infoSession").html("El usuario <?php $oUsu=new Usuario(); 
                                            $oUsu = $_SESSION["usuarioSession"];
                                            echo $oUsu->nombre?>esta logeado"); 
                                            
                                }
                                $("#mensaje").html(resultado);
                            }
                        });
                    }//Cierre IF Valida blancos
                else
                    alert("Debe Agregar el usuario y clave");
            });//Click Boton enviar
     });//Function Ready de la página
     </script>
</html>
