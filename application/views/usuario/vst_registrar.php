<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>SysADD</title>
        <meta name="keywords" content="">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <script src="/sysadd/JS/googleapis/ajax/jquery1.7.1/jquery.min.js" language="javascript"></script>  
        <script src="/sysadd/JS/testcloud.js" language="javascript"></script>
        <link href="/sysadd/CSS/keycloudingNew.css" rel="stylesheet" type="text/css" />
        <link href="/sysadd/CSS/icomoon.css" rel="stylesheet" type="text/css" />
        <link rel="icon" type="image/png" href="/sysadd/images/logo_ico.png" />
       
        <!-- Prueba  -->
        <script src="/sysadd/JS/jquery.validate.js"></script>
        <script src="/sysadd/JS/jquery.Rut.js" language="javascript"></script>
        <script src="/sysadd/JS/jquery.Rut.min.js" language="javascript"></script>
        <style>
            .btn_text_prueb {display: inline-block;width: auto;padding: 0px 5px 0px 5px;vertical-align: 4px;}
            .btn_ico_prueb {display: inline-block;padding: 0px;margin: 0px 0px 0px 0px;}
        </style>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $("#rut").Rut({
                    on_error: function() {
                        $("#reload_id2").css('display', 'block');
                        $("#reload_id2").css('display', 'block');
                        var texto_ = '<h1 style="margin-bottom:40px;">Lo sentimos</h1>\n\
                            <br>\n\
                            <h3 style="color:#888;margin-bottom:40px;">El rut ingresado no es valido</h3>';
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
                            <h3 style="color:#888;margin-bottom:40px;">El rut ingresado no es valido</h3>';
                        var boton  = '<input type="button" id="continuar" value="Continuar" onclick="$(&apos;#continuar&apos;).continuar();"/>';
                        $("#cantidad2").html(''+texto_+boton+'');
                        $("#rutt").val("");
                        $("#rutt").focus();
                    }
                });
            });
            $.fn.continuar = function() {
                $("#reload_id2").css('display', 'none');
            };
            $(document).ready(function() {
                $('#registro').click(function() {
                   $('#oculto').click();
                });
                $('#reload_capcha').click(function(){
                    location.reload(); 
                });

                $('#registro').click(function(){
                    ga('send', 'event', 'KPI', 'realizartest', 'clic',1);                
                });

                $("#form_ingresar").submit(function() {
                    if ($('#rut').val() == '') {
                        $("#reload_id2").css('display', 'block');
                        var texto_ = '<h1 style="margin-bottom:40px;">Lo sentimos</h1>\n\
                            <br>\n\
                            <h3 style="color:#888;margin-bottom:40px;">El rut ingresado no es valido</h3>';
                        var boton  = '<input type="button" id="continuar" value="Continuar" onclick="$(&apos;#continuar&apos;).continuar();"/>';
                        $("#cantidad2").html(''+texto_+boton+'');
                        return false;
                    } else if ($('#pass').val() == '') {
                        alert('Para ingresar al sistema, ambos campos son requeridos');
                        return false;
                    } else {
                        return true;
                    }
                });
                $("#Form-SignUp").submit(function() {
                    if ($('#nombreUser').val() == '') {
                        $("#reload_id2").css('display', 'block');
                        var texto_ = '<h1 style="margin-bottom:50px;">Lo sentimos</h1>\n\
                            <br>\n\
                            <h3 style="color:#888;margin-bottom:40px;">Todos los campos son obligatorios</h3>';
                        var boton  = '<input type="button" id="continuar" value="Continuar" onclick="$(&apos;#continuar&apos;).continuar();"/>';
                        $("#cantidad2").html(''+texto_+boton+'');
                        return false;
                    } else if ($('#apellidopaternoUser').val() == '') {
                        $("#reload_id2").css('display', 'block');
                        var texto_ = '<h1 style="margin-bottom:40px;">Lo sentimos</h1>\n\
                            <br>\n\
                            <h3 style="color:#888;margin-bottom:40px;">Todos los campos son obligatorios</h3>';
                        var boton  = '<input type="button" id="continuar" value="Continuar" onclick="$(&apos;#continuar&apos;).continuar();"/>';
                        $("#cantidad2").html(''+texto_+boton+'');
                        return false;
                    }else if ($('#apellidomaternooUser').val() == '') {
                        $("#reload_id2").css('display', 'block');
                        var texto_ = '<h1 style="margin-bottom:40px;">Lo sentimos</h1>\n\
                            <br>\n\
                            <h3 style="color:#888;margin-bottom:40px;">Todos los campos son obligatorios</h3>';
                        var boton  = '<input type="button" id="continuar" value="Continuar" onclick="$(&apos;#continuar&apos;).continuar();"/>';
                        $("#cantidad2").html(''+texto_+boton+'');
                        return false;
                    } else if ($('#rutt').val() == '' && $('#dni').val()=='') {
                        $("#reload_id2").css('display', 'block');
                        var texto_ = '<h1 style="margin-bottom:40px;">Lo sentimos</h1>\n\
                            <br>\n\
                            <h3 style="color:#888;margin-bottom:40px;">Todos los campos son obligatorios</h3>';
                        var boton  = '<input type="button" id="continuar" value="Continuar" onclick="$(&apos;#continuar&apos;).continuar();"/>';
                        $("#cantidad2").html(''+texto_+boton+'');;
                        return false;
                    } else if ($('#emailUser').val() == '') {
                        $("#reload_id2").css('display', 'block');
                        var texto_ = '<h1 style="margin-bottom:40px;">Lo sentimos</h1>\n\
                            <br>\n\
                            <h3 style="color:#888;margin-bottom:40px;">Todos los campos son obligatorios</h3>';
                        var boton  = '<input type="button" id="continuar" value="Continuar" onclick="$(&apos;#continuar&apos;).continuar();"/>';
                        $("#cantidad2").html(''+texto_+boton+'');
                        return false;
                    } else if ($('#passwordUser').val() == '') {
                        $("#reload_id2").css('display', 'block');
                        var texto_ = '<h1 style="margin-bottom:40px;">Lo sentimos</h1>\n\
                            <br>\n\
                            <h3 style="color:#888;margin-bottom:40px;">Todos los campos son obligatorios</h3>';
                        var boton  = '<input type="button" id="continuar" value="Continuar" onclick="$(&apos;#continuar&apos;).continuar();"/>';
                        $("#cantidad2").html(''+texto_+boton+'');
                        return false;
                    } else if ($('#passwordUser2').val() == '') {
                        $("#reload_id2").css('display', 'block');
                        var texto_ = '<h1 style="margin-bottom:40px;">Lo sentimos</h1>\n\
                            <br>\n\
                            <h3 style="color:#888;margin-bottom:40px;">Todos los campos son obligatorios</h3>';
                        var boton  = '<input type="button" id="continuar" value="Continuar" onclick="$(&apos;#continuar&apos;).continuar();"/>';
                        $("#cantidad2").html(''+texto_+boton+'');
                        return false;
                    } else if ($('#passwordUser2').val() === '#passwordUser'.val()) {
                        $("#reload_id2").css('display', 'block');
                        var texto_ = '<h1 style="margin-bottom:40px;">Lo sentimos</h1>\n\
                            <br>\n\
                            <h3 style="color:#888;margin-bottom:40px;">Todos los campos son obligatorios</h3>';
                        var boton  = '<input type="button" id="continuar" value="Continuar" onclick="$(&apos;#continuar&apos;).continuar();"/>';
                        $("#cantidad2").html(''+texto_+boton+'');
                        return false;
                    } else if ($('#captchaUser').val() === '') {
                        $("#reload_id2").css('display', 'block');
                        var texto_ = '<h1 style="margin-bottom:50px;">Lo sentimos</h1>\n\
                            <br>\n\
                            <h3 style="color:#888;margin-bottom:40px;">Todos los campos son obligatorios</h3>';
                        var boton  = '<input type="button" id="continuar" value="Continuar" onclick="$(&apos;#continuar&apos;).continuar();"/>';
                        $("#cantidad2").html(''+texto_+boton+'');
                        return false;
                    } else {
                        return true;
                    }
                });
            });

            function valida(tx) {
                var nMay = 0, nMin = 0, nNum = 0;
                var t1 = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                var t2 = "abcdefghijklmnopqrstuvwxyz";
                var t3 = "0123456789";
                if (tx.length === 0) {
                    return true;
                } else if (tx.length >= 10) {
                    $("#reload_id2").css('display', 'block');
                    var texto_ = '<h1 style="margin-bottom:40px;">Lo sentimos</h1>\n\
                        <br>\n\
                        <h3 style="color:#888;margin-bottom:40px;">Su password, debe tener 6 caracteres alfanumericos</h3>';
                    var boton  = '<input type="button" id="continuar" value="Continuar" onclick="$(&apos;#continuar&apos;).continuar();"/>';
                    $("#cantidad2").html(''+texto_+boton+'');

                    form.passwordUser.value = '';
                    $('#passwordUser').focus();
                } else {
                    // Aqui continua si la variable ya tiene mas de 5 letras
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
                    } else {
                        return true;
                    }
                }
            }

            function iguales(p1, p2) {
                if ($('#passwordUser2').val()!=='') {
                    if (p1 !== p2) {
                        $("#reload_id2").css('display', 'block');
                        var texto_ = '<h1 style="margin-bottom:40px;">Lo sentimos</h1>\n\
                            <br>\n\
                            <h3 style="color:#888;margin-bottom:40px;">Las passwords deben de coincidir</h3>';
                        var boton  = '<input type="button" id="continuar" value="Continuar" onclick="$(&apos;#continuar&apos;).continuar();"/>';
                        $("#cantidad2").html(''+texto_+boton+'');
                        // form.passwordUser.value = '';
                        form.passwordUser2.value = '';
                        $('#passwordUser').focus();
                        return false;
                    } else {
                        return true;
                    }
                } else {
                    return false;
                }
            }

            function email_validar(email) {
                var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
                if ($('#emailUser').val()=== '') {
                    return false;
                } else {
                    if (!filter.test(email)) {
                        $("#reload_id2").css('display', 'block');
                        var texto_ = '<h1 style="margin-bottom:40px;">Lo sentimos</h1>\n\
                            <br>\n\
                            <h3 style="color:#888;margin-bottom:40px;">El correo electrónico introducido no es correcto</h3>';
                        var boton  = '<input type="button" id="continuar" value="Continuar" onclick="$(&apos;#continuar&apos;).continuar();"/>';
                        $("#cantidad2").html(''+texto_+boton+'');
                        form.emailUser.value = '';
                        return false;
                    }
                }
            }
        </script>
    </head>
    <body>
        <header id="site-header">
            <div class="container">
                <a href="" class="site-logo">
                    <img src="/sysadd/images/logo-header.png" alt="SysAdd"  style="width: 203px;height: 73px">
                </a>
                
            </div>
        </header>
        <section class="ingreso1" style="margin-top: 60px;float: right; margin-left: 100px;">
            <div style="width: 40%; float: left; height: 500px; margin-top: 120px;text-align: center; margin-right: 60px; margin-left: 80px;">
                <h1 style="color: #000; margin-top: 0px; width: 600px; padding: 10px; text-align: center; text-height:max-size;"> 
                    <b>SysADD&reg;</b> Es una solución que coolabora con el planeta, disminuye la cantidad de impresiones y entrega una forma segura de adminitrar los archivos de los trabajadores. 
                </h1> 
                <br><img src="/sysadd/images/logo_ppal.png" style="width:65%;"><br>
                <h1 style="color: #000; text-align: center; font-weight:400; font-size:30px">¡ATREVETE A SER PARTE!<br>Agrega los link de tus documentos a tu CV</h1>
                <br>
                <div style="font-size:18px; color:#fff;background-color: rgba(103, 142, 175, 0.8); padding: 10px; text-align:center">Para el correcto funcionamiento se requiere el uso de navegador Chrome  ,  Safari  o Internet Explorer 11 o superior</div>
            </div>
            <?php
                $rutUser = array(
                'name' => 'rutUser',
                'placeholder' => 'Ingresa tu rut',
                'value' => set_value('rutUser'),
                'size' => '50',
                'id' => 'rutt',
            );
            $dniUser = array(
                'name' => 'dniUser',
                'placeholder' => 'Ingresa tu número de identificación',
                'size' => '50',
                'value' => set_value('dniUser'),
                 'id' => 'dni',
            );
            $nombreUser = array(
                'name' => 'nombreUser',
                'id'=>'nombreUser',
                'placeholder' => 'Ingresa tus nombres',
                'size' => '50',
                'value' => set_value('nombreUser')
            );

            $apellidopaternoUser = array(
                'name' => 'apellidopaternoUser',
                'placeholder' => 'Ingresa tu Apellido Paterno',
                'size' => '50',
                'value' => set_value('apellidopaternoUser'),
                'id' => 'apellidopaternoUser',
            );
            $passwordUser = array(
                'name' => 'passwordUser',
                'id'=>'passUser',
                'placeholder' => 'Ingresa tu Password',
                'size' => '6',
                'id'=>'passwordUser',
                'maxlength'=>'6'
            );
            $passwordUser2 = array(
                'name' => 'passwordUser2',
                'placeholder' => 'Repite tu Password',
                'id'=>'passUser2',
                'size' => '6',
                'maxlength'=>'6'
            );
            $emailUser = array(
                'name' => 'emailUser',
                'placeholder' => 'Ingresa tu email',
                'type' => 'email',
                'size' => '50',
                'value' => set_value('emailUser'),
                'id' => 'emailUser',
            );
            $captchaUser = array(
                'name' => 'captchaUser',
                'placeholder' => 'Ingresa el captcha',
                'size' => '20',
                'id' => 'captchaUser',
            );
            ?>
            
            <?php echo form_open('ctl_login/registrarusuario',"class='key-cloud2' id='Form-SignUp' name='form' style='margin-top:30px;margin-left:40px;width:40%;float:right;'")?>
                <input type="hidden" value="" id="facebookid" name="facebookid"/>          
                <table>
                    <tr  style='color:red;'>
                        <td>
                            &nbsp;<?php echo  form_error('rutpersona'); ?>
                        </td>
                        <td>
                            &nbsp; <?php echo  form_error('emailpersona'); ?>
                        </td>
                        
                    </tr>
                </table>
                <table>
                    <tbody>
                                        <tr id="rutUser">
                                            <td>
                                                <input type="text" name="rutUser" value="" placeholder="Ingresa tu rut" size="50" id="rutt">
                                            </td> 
                                            <td>(*)</td>
                                        </tr>
                                    
                                        <tr>
                                            <td>
                                                <input type="text" name="nombreUser" value="" id="nombreUser" placeholder="Ingresa tus nombres" size="50">
                                            </td>
                                            <td style="color:#000;">(*)</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" name="apellidopaternoUser" value="" placeholder="Ingresa tu Apellido Paterno" size="50" id="apellidopaternoUser">
                                            </td>
                                            <td style="color:#000;">(*)</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" name="apellidomaternoUser" value="" placeholder="Ingresa tu Apellido Materno" size="50" id="apellidomaternoUser">
                                            </td>
                                            <td style="color:#000;">(*)</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="email" name="emailUser" value="" placeholder="Ingresa tu email" size="50" id="emailUser" onblur="email_validar(this.form.emailUser.value);">
                                            </td>
                                            <td style="color:#000;">(*)</td>
                                        </tr>
                                        <tr>
                                            <td style="color:#000;">
                                                <input type="password" name="passwordUser" value="" id="passwordUser" placeholder="Ingresa tu Password" size="10" maxlength="10" onblur="valida(this.form.passwordUser.value);">
                                            </td>
                                            <td style="color:#000;">(*)</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="password" name="passwordUser2" value="" placeholder="Repite tu Password" id="passUser2" size="10" maxlength="10" onblur="iguales(this.form.passwordUser.value,this.form.passwordUser2.value)">
                                            </td>
                                            <td style="color:#000;">(*)</td>
                                        </tr>
                                       
                                        <tr>
                                            <td>

                                                <div style="margin-top: 15px;display: inline-block;position: relative;float: right;background-color: #a3be31;width: auto;bottom: 20px;right: 13px;">
                                                    <a style="font-family: 'Raleway', sans-serif;font-weight: bold;text-transform: uppercase;font-style: italic;font-size: 20px;color: #ffffff;" href="#" id="registro">
                                                        <div style="font-size: 30px;display: inline-block;width: auto;padding: 10px 8px 8px 10px;vertical-align: 4px;">Registrar</div>
                                                    </a> 
                                                </div>
                                                <input type="submit" style="display:none" id="oculto">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" style="color:#000;"><p>(*) Campos Obligatorios</p></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h1 style="font-size: 20px;margin-top: 40px;">¿Ya tienes una cuenta?</h1>
                                    <a href="ingresousuario">
                                        <input type="button" name="boton2" value="Ingresa Aquí" id="boton2" style="font-size: 30px;display: inline-block;width: auto;padding: 10px 8px 8px 10px;vertical-align: 4px;">
                                    </a>
                                <p></p>
                                <h3 style="font-size: 26px">Con tu RUT y Password </h3>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php echo form_close()?>
            </section>    
            <div class="div_reload" id="reload_id2">
            <section>
                <div id="confirmacion" style="margin:auto;margin-top:90px;background-color: #fff;width: 30%;border-radius: 15px;height: 230px">
                    <div id="cantidad2" style="padding-top:10px;"></div>
                    <div style="margin:auto;background-color: #fff;margin-top:40px;"></div>
                    <div id="general">&nbsp;</div>
                    <div id="loading">&nbsp;</div>
                </div>
            </section>
        </div>    
    </body>
</html>
