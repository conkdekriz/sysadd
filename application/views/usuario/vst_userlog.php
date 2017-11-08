<!DOCTYPE html>
<html lang="es"><head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>sysADD</title>
        <meta name="keywords" content="">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <script src="/sysadd/JS/googleapis/ajax/jquery1.7.1/jquery.min.js" language="javascript"></script>
        <link href="/sysadd/CSS/keycloudingNewvitrina.css" rel="stylesheet" type="text/css">
        <link href="/sysadd/CSS/icomoon.css" rel="stylesheet" type="text/css"> 
        <link href="/sysadd/CSS/popup.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="/sysadd/JS/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
        <script type="text/javascript" src="/sysadd/JS/source/jquery.fancybox.pack.js?v=2.1.5"></script>
        <link rel="stylesheet" type="text/css" href="/sysadd/CSS/normalize.css" />
        <link rel="stylesheet" type="text/css" href="/sysadd/CSS/demo.css" />
        <link rel="stylesheet" type="text/css" href="/sysadd/CSS/component.css" />
        
        <link rel="icon" type="image/png" href="/sysadd/images/logo_ico.png" />
        <style>
            .botones_estandar input[type="button"],input[type="submit"] {
                background-color: #314C5B;
                color: #fff;
                cursor: pointer;
                border: 1px solid #DADADA;
                margin-right: 6px;
                outline: 0 none;
                padding: 10px;
                width: 90%;
                font-family: 'Raleway-Medium', Arial, Helvetica, sans-serif;
                font-size: 16px;
                margin-top: 5px;
                margin-bottom: 0px;
                text-transform: capitalize;
            }

            .botones_estandar input[type="button"]:hover,input[type="submit"]:hover {
                background-color: #8CB00E;
            }


            .inputfile {
                width: 0.1px;
                height: 0.1px;
                opacity: 0;
                overflow: hidden;
                position: absolute;
                z-index: -1;
            }
            .div_presentacion{
                margin-top:90px; 
                width: 200px;
                height: auto;
                word-wrap: break-word; 
                float:left; 
                position: relative;
                text-align: center;
                margin-left: 20px;
                background-color: black;
                opacity: 0.8;
                -webkit-border-radius: 3px 5px 1px 4px; /* recuerda la primera frase */
                -moz-border-radius: 4px; /* si quieres todas las esquinas iguales */
                border-radius: 6px;
            }
        </style>
        <script type="text/javascript">
            $(document).ready(function() {

                $(".fancybox").fancybox({
                    openEffect: 'elastic',
                    closeEffect: 'elastic',
                    fitToView:true,
                    
                    iframe: {
                        preload: false
                    
    }
                });
                
                var inputs = document.querySelectorAll('.inputfile');
                Array.prototype.forEach.call(inputs, function(input)
                {
                    var label = input.nextElementSibling,
                            labelVal = label.innerHTML;

                    input.addEventListener('change', function(e)
                    {
                        var fileName = '';
                        if (this.files && this.files.length > 1)
                            fileName = (this.getAttribute('data-multiple-caption') || '').replace('{count}', this.files.length);
                        else
                            fileName = e.target.value.split('\\').pop();

                        if (fileName)
                            label.querySelector('span').innerHTML = fileName;
                        else
                            label.innerHTML = labelVal;
                    });
                });

            });
            
            function comprobar(){
            valor = $('#file-1').val();
		if(valor===""){
			alert("Debe ingresar al menos un archivo");
		}
	        }
        </script> 

    </head>
    <body style="background-image: url(/sysadd/images/fondo.jpg);" data-pinterest-extension-installed="cr1.35">

        <header id="site-header">
            <div class="container">

                <a href="/sysadd/index.php/ctl_login/" class="site-logo">
                    <img src="/sysadd/images/logo-header.png" alt="SysADD" style="width: 203px;height: 73px">			
                </a>
                <nav>

                    <!--inicio-->
                    <ul id="site-nav">
                        <li  id='margin-home'><?php echo anchor('ctl_login', '<span class="icomoon-home-5"></span> Inicio'); ?></li>
                    </ul>
                    <!--Menú-->
                    <ul id="site-nav">
                        <li><a href="#"><span class="icomoon-menu-7"></span> Tu Cuenta</a>
                            <ul><li><?php echo anchor('ctl_login/datospersonales', '<span class="icomoon-user-7"></span> Mi Perfil') ?></li>
                                <li><?php echo anchor('ctl_login/misDocs', '<span class="icomoon-user-7"></span> Mis Docs') ?></li>
                                <li><?php echo anchor('ctl_login/logout', '<span class="icomoon-cancel-circle-2"></span> Cerrar Sesión') ?></li>

                            </ul>
                        </li>
                    </ul>


                    <ul id="site-nav">
                        <li  id='margin-home'></li> 
                    </ul>


                    <ul id="site-nav">
                        <li  id='margin2'>

                        </li>
                    </ul>


                    <table style='float: right;margin-right: 20px;'>
                        <tr height="20">
                            <td colspan="3">

                                <a style="font-size: 14px;color:#fff">
                                    <span class="icomoon-user-7"></span>
                                    <?php
                                    echo 'Hola ';
                                    echo $nombreuser;
                                    ?></a>

                            </td>
                        </tr>
                        <tr>
                            <td>

                            </td>

                            <td>
                                <ul id="site-nav6" style="margin-top: 9px;">
                                    <li  id='margin2'>
                                        <?php
                                        echo '<span class="icomoon-info" style="font-size: 16px;"> ';
                                        echo $emailuser;
                                        ?>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    </table>
                </nav>
            </div>
        </header>
        <table style="text-align:center;margin-top: 120px;width: 100%">
            <tr style="text-align:center;">
                <td>
                    <h1>Sube tus archivos</h1>
                </td>
            </tr>
            <tr style="text-align:center;">
                <td> <p><?php echo $this->session->flashdata('statusMsg'); ?></p>
                    <div class="box" style="" >
                <form name="form" enctype="multipart/form-data" action="/sysadd/index.php/ctl_login/upload_files" method="post">
                    <div>
                        <input type="file" name="userFiles[]" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} Archivos Seleccionados" multiple name="archivo"/>
                        <label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Selecciona tus archivos&hellip;</span></label>
                    </div> 
                    <div class="form-group">
                        <input class="form-control" type="submit" name="fileSubmit" value="UPLOAD" onclick="comprobar();" style="width:50%;margin-left: 0px;"/>
                    </div>
                </form>
            </div>
</td>
            </tr>
            <tr>
                <td>
                    <h1>Archivos subidos</h1>
                </td>
            </tr>
            <tr>
                <td><?php if (!empty($files)): foreach ($files as $file): ?>

                        <div class="div_presentacion">
                            <a class="fancybox" thumbnail="http://fancyapps.com/fancybox/demo/2_s.jpg" data-fancybox-type="iframe" style="text-decoration:none;color:#8CB00E" href="<?php echo base_url('upload/files/' . $file['file_name']); ?>">
                                <?php if (strpos($file['file_name'], 'pdf')) { ?>
                                    <img style="max-width: 80%;height: auto;width: auto/9;" src="/sysadd/images/logo_pdf.png" alt="" >
                                <?php } else { ?>
                                    <img style="max-width: 80%;height: auto;width: auto/9;" src="<?php echo base_url('upload/files/' . $file['file_name']); ?>" alt="" >
                                <?php } ?>
                                    <p><?php echo $file['file_name']; ?></p>
                                    <p>Subida el <?php echo date("d M Y", strtotime($file['created'])); ?></p>
                            </a>
                        </div>
                        <?php
                    endforeach;
                else:
                    ?>
                    <p>No hay archivos subidos</p>
                <?php endif; ?></td>
            </tr>
        </table>
                
           
