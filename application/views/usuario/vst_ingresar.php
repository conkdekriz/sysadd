        <script src="/sysadd/JS/jquery.validate.js"></script>
        <script src="/sysadd/JS/jquery.Rut.js" language="javascript"></script>
        <script src="/sysadd/JS/jquery.Rut.min.js" language="javascript"></script>
        <link href="/sysadd/CSS/keycloudingNew.css" rel="stylesheet" type="text/css" />
        <link href="/sysadd/CSS/icomoon.css" rel="stylesheet" type="text/css" />
        
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $("#rut").Rut({
                    on_error: function() {
                        $("#reload_id2").css('display', 'block');
                    var texto_ = '<h1 style="margin-bottom:40px;">Lo sentimos</h1>\n\
                                  <h3 style="color:#888;margin-bottom:40px;">El rut ingresado no es correcto</h3>';
                    var boton  = '<input type="button" id="continuar" value="Continuar" onclick="$(&apos;#continuar&apos;).continuar();"/>';
                    $("#cantidad2").html(''+texto_+boton+'');
               
                
                        $("#rut").val("");
                        $("#rut").focus();
                    }
                });
                $("#rutt").Rut({
                    on_error: function() {
                         $("#reload_id2").css('display', 'block');
                    var texto_ = '<h1 style="margin-bottom:40px;">Lo sentimos</h1>\n\
                                  <br>\n\
                                  <h3 style="color:#888;margin-bottom:40px;">El rut ingresado no es correcto</h3>';
                    var boton  = '<input type="button" id="continuar" value="Continuar" onclick="$(&apos;#continuar&apos;).continuar();"/>';
                    $("#cantidad2").html(''+texto_+boton+'');
                        $("#rutt").val("");
                        $("#rutt").focus();
                    }
                });

            });
            $.fn.continuar=function(){
                $("#reload_id2").css('display', 'none');
            };
          
           
            
            $(document).ready(function() {
                
                $("#form_ingresar").submit(function() {
                   
                    if ($('#rut').val() == '' && $('#dni').val()=='') {
                        $("#reload_id2").css('display', 'block');
                        var texto_ = '<h1 style="margin-bottom:40px;">Lo sentimos</h1>\n\
                                  <br>\n\
                                  <h3 style="color:#888;margin-bottom:40px;">Para ingresar al sistema, ambos campos son requeridos</h3>';
                        var boton  = '<input type="button" id="continuar" value="Continuar" onclick="$(&apos;#continuar&apos;).continuar();"/>';
                        $("#cantidad2").html(''+texto_+boton+'');
                     
                        
                        return false;
                    } else if ($('#pass').val() == '') {
                         $("#reload_id2").css('display', 'block');
                    var texto_ = '<h1 style="margin-bottom:40px;">Lo sentimos</h1>\n\
                                  <br>\n\
                                  <h3 style="color:#888;margin-bottom:40px;">Para ingresar al sistema, ambos campos son requeridos</h3>';
                    var boton  = '<input type="button" id="continuar" value="Continuar" onclick="$(&apos;#continuar&apos;).continuar();"/>';
                    $("#cantidad2").html(''+texto_+boton+'');
                       
                        return false;
                    } else{
                        return true;
                    }

                });
                $("#Form-SignUp").submit(function() {
            
                    if ($('#nombreUser').val() == '') {
                        alert('Todos los campos son obligatorios');
                        return false;
                    } else if ($('#apellidopaternoUser').val() == '') {
                        alert('Todos los campos son obligatorios');
                        return false;
                    } else if ($('#rutt').val() == '') {
                        alert('Todos los campos son obligatorios');
                        return false;
                    } else if ($('#emailUser').val() == '') {
                        alert('Todos los campos son obligatorios');
                        return false;
                    } else if ($('#passwordUser').val() == '') {
                        alert('Todos los campos son obligatorios');
                        return false;
                    } else if ($('#passwordUser2').val() == '') {
                        alert('Todos los campos son obligatorios');
                        return false;
                    } else if ($('#passwordUser2').val() == '#passwordUser'.val()) {
                        alert('Las passwords deben de coincidir');
                        return false;
                    } else {

                        return true;
                    }

            });
            });



            function valida(tx)
            {
                var nMay = 0, nMin = 0, nNum = 0;
                var t1 = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                var t2 = "abcdefghijklmnopqrstuvwxyz";
                var t3 = "0123456789";
                if (tx.length === 0) {
                    return true;
                } else if (tx.length !== 6) {
                    alert("Su password, debe tener 6 caracteres alfanumericos");
                    form.passwordUser.value = '';

                } else {
                    //Aqui continua si la variable ya tiene mas de 5 letras
                    for (i = 0; i < tx.length; i++) {
                        if (t1.indexOf(tx.charAt(i)) !== -1) {
                            nMay++
                        }
                        if (t2.indexOf(tx.charAt(i)) !== -1) {
                            nMin++
                        }
                        if (t3.indexOf(tx.charAt(i)) !== -1) {
                            nNum++
                        }
                    }
                    if (nMay >= 1 || nMin >= 1 && nNum >= 0) {
                        return true;
                    }
                    else
                    {
                        alert("Su password, debe tener 6 caracteres alfanumericos");
                        form.passwordUser.value = '';
                        return false;
                    }
                }
            }
            function iguales(p1, p2) {
                if (p1 !== p2) {
                    alert("Las passwords deben de coincidir");
                    form.passwordUser.value = '';
                    form.passwordUser2.value = '';
                    return false;
                } else {
                    return true;
                }
            }

            function email_validar(email) {
               if(email.val()== ''){
                if (email.indexOf('@', 0) === -1 || email.indexOf('.', 0) === -1) {
                    alert('El correo electrónico introducido no es correcto.');
                    form.emailUser.value = '';
                    return false;
                }
            }
            }
            
            function rutdni(){
                var dnirut=$('#TipoUser option:selected').val();
             
                if(dnirut == '2'){
                    
                 $("#dniUser").css('display','table');
                 $("#rutUser").css('display','none');
                }else if(dnirut==='1'){
                   
                 $("#dniUser").css('display','none');
                 $("#rutUser").css('display','table'); 
                }
            }
        </script>
    <body>
        
<section class="ingreso1" >
        <div style="width: 40%;float: left;height: 500px; margin-top: 120px;text-align: center; margin-right: 60px; margin-left: 80px;">
                <h1 style="color: #000; margin-top: 0px; width: 600px; padding: 10px; text-align: center; text-height:max-size;"> 
                    <b>SysADD&reg;</b> Es una solución que coolabora con el planeta, disminuye la cantidad de impresiones y entrega una forma segura de adminitrar los archivos de los trabajadores. 
                </h1> 
                <br><img src="/sysadd/images/logo_ppal.png" style="width:65%;"><br>
                <h1 style="color: #000; text-align: center; font-weight:400; font-size:30px">¡ATREVETE A SER PARTE!<br>Agrega los link de tus documentos a tu CV</h1>
                <br>
            </div>
     <?php echo form_open('ctl_login/ingresarusuario',"class='key-cloud' id='form_ingresar' name='form_ingresar' style='width:40%; float:left;'"); ?>
    
   
    <table style="text-align: center;width: 100%; float: left; height: 500px; margin-top: 10px;">
        <tbody>
        <tr style='color:red;'>
            <td>
            <?php echo form_error('rut'); ?><br>
            <?php echo $noexiste; ?><br>
            <?php echo form_error('password'); ?><br>
            <?php echo validation_errors(); ?><br>
            </td>
        </tr>
        
        <tr> 
                <td>
                    <input type="text" name="rutUser" value="" id="rut" size="50" placeholder="Ingresa tu RUT"></td> 
        </tr>
        
        
        <tr>
            
            <td style="text-align: right;margin-right: 40px;font-size: 16px;"><a href="recuperardatos" style="margin-right:20px;">¿Olvidaste tu Password?</a></td>
              
        </tr>
        <tr>
            
            <td><input type="password" name="passwordUser" value="" id="pass" placeholder="Ingresa tu password"></td>
          
        </tr>
       <tr>
            
            <td> <input type="submit" name="boton" value="Aceptar" id="boton"></td>
       </tr>
         <tr>
            <td>
                <h1 style="font-size: 20px;margin-top: 40px;">¿No tienes una cuenta?</h1><a href="registrousuario">
                    <input type="button" name="boton2" value="Registrate Aquí" id="boton2" >
                </a>
                
                  
                <p></p>                <h3 style="font-size: 16px">Te tomará 5 minutos y tendrás acceso a todo el <a href="registrousuario">sistema.</a></h3> 
            </td>
        </tr>
        
        <tr>
        	<td>
        		<div style="font-size:18px;margin-top:20px;color:#fff;background-color: rgba(103, 142, 175, 0.8); padding: 10px; text-align:center">
					Para el correcto funcionamiento se requiere el uso de navegador Chrome  ,  Safari  o Internet Explorer 11 o superior
				</div>
        	</td>
        </tr>

    </tbody>
    </table>
    <?php echo form_close(); ?>
</section>
    </body>
        
        <div class="div_reload" id="reload_id2">
            <section>
                    <div id="confirmacion" style="margin:auto;margin-top:90px;background-color: #fff;width: 30%;border-radius: 15px;height: 230px">
                        <div id="cantidad2">
                        </div>
                       <div style="margin:auto;background-color: #fff;margin-top:40px;">
                       </div>
                       <div id="general">
                        &nbsp;
                       </div>
                       <div id="loading">
                       </div> 
                        &nbsp;
                    </div>
            </section>
        </div> 
                
        ?>
       
