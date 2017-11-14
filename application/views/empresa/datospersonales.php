
<style>
    #rt{
        width: 75%
    }
    #dvrt{
        width:10%
    }
    #subdatos{
        padding: 10px;
        width: 50%;
        font-size: 16px;
    }
</style>
<script>

    $.fn.continuar = function() {
        $("#reload_id2").css('display', 'none');
    };


    function iguales(p1, p2) {
        if ($('#passwordUser2').val() !== '') {
            if (p1 !== p2) {
                $("#reload_id2").css('display', 'block');
                var texto_ = '<h1 style="margin-bottom:40px;">Lo sentimos</h1>\n\
                            <br>\n\
                            <h3 style="color:#888;margin-bottom:40px;">Las passwords deben de coincidir</h3>';
                var boton = '<input type="button" id="continuar" value="Continuar" onclick="$(&apos;#continuar&apos;).continuar();"/>';
                $("#cantidad2").html('' + texto_ + boton + '');
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
</script>
<?php
$rutUser = array(
    'name' => 'rutUser',
    'value' => $rutuser,
    'id' => 'rt'
);
$rutdvUser = array(
    'name' => 'rutdvUser',
    'value' => $dvrutuser,
    'id' => 'dvrt'
);

$nombreUser = array(
    'name' => 'nombreUser',
    'id' => 'nombreUser',
    'value' => $nombreuser,
    'id' => 'boxinputperfil'
);

$apellidopaternoUser = array(
    'name' => 'apellidopaternoUser',
    'value' => $apellidopaternouser,
    'id' => 'boxinputperfil'
);
$apellidomaternoUser = array(
    'name' => 'apellidomaternoUser',
    'value' => $apellidomaternouser,
    'id' => 'boxinputperfil'
);
$emailUser = array(
    'name' => 'emailUser',
    'type' => 'email',
    'value' => $emailuser,
    'id' => 'boxinputperfil'
);
$passwordUser = array(
    'name' => 'passwordUser',
    'id' => 'passwordUser',
    'id' => 'boxinputperfil'
);
$passwordUser2 = array(
    'name' => 'passwordUser2',
    'id' => 'boxinputperfil',
    'onblur' => "iguales(this.form.passwordUser.value,this.form.passwordUser2.value)"
);
?>
<?php echo form_open('ctl_login/actualizarDP', 'style="margin-top:120px" name="form"'); ?>

<table>
    <?php if(isset($actdatos) && $actdatos=='1'){ ?>
    <tr>
        <td colspan="2" style="color:red"><h3> Datos actualizados con éxito!</h3></td>
    </tr>  
    <?php } ?>
    <tr>
        <td colspan="2"><h3> Datos personales</h3></td>
    </tr>  

    <tr>
        <td><?php echo form_label('Rut', 'rutUser') ?></td>  
        <td><?php echo form_input($rutUser, '', 'disabled') ?><strong>-</strong><?php echo form_input($rutdvUser, '', 'disabled') ?></td> 


    </tr>
    <tr>
        <td><?php echo form_label('Nombres', 'nombreUser') ?></td>        
        <td><?php echo form_input($nombreUser) ?></td>

    </tr>
    <tr>
        <td><?php echo form_label('Apellido Paterno', 'apellidopaternoUser') ?></td>        
        <td><?php echo form_input($apellidopaternoUser) ?></td>
    </tr>
    <tr>
        <td><?php echo form_label('Apellido Materno', 'apellidomaternoUser') ?></td>        
        <td><?php echo form_input($apellidomaternoUser) ?></td>
    </tr>
    <tr>
        <td><?php echo form_label('Correo Electrónico', 'emailUser') ?></td>
        <td><?php echo form_input($emailUser, '', 'disabled') ?></td>
    </tr> 
    <tr>
        <td><?php echo form_label('Password', 'passwordUser') ?></td>
        <td><?php echo form_password($passwordUser) ?></td>
    </tr> 
    <tr>
        <td><?php echo form_label('Repita Password', 'passwordUser2') ?></td>
        <td><?php echo form_password($passwordUser2) ?></td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center;">
            <input type="submit" id="subdatos" value="Guardar Cambios"/>
        </td>
    </tr>
</table>
<?php echo form_close(); ?>
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