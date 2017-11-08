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
        