<style>
    .tableg td{
        border: black solid 1px;
        background-color: white;
        padding: 5px 5px 5px 5px;
        margin-left: 20px;
    }
    .editarfondo{
        /*Div que ocupa toda la pantalla*/
        position:absolute;
        top: 0px;
        left:0px;
        width:100%;
        height:100%;
        background-color:#000;
        /*IE*/
        filter: alpha(opacity=50);
        /*FireFox Opera*/
        opacity: .5;
        display: none;

    }
    .editar{
        position: absolute;
        /*nos posicionamos en el centro del navegador*/
        top:50%;
        left:50%;
        /*determinamos una anchura*/
        /*indicamos que el margen izquierdo, es la mitad de la anchura*/
        margin-left:-200px;
        /*determinamos una altura*/
        /*indicamos que el margen superior, es la mitad de la altura*/
        margin-top:-300;
        border:1px solid #808080;
        background-color:#fff;
        padding:5px;
        display: none;
    }
</style>


<section style="margin-top:120px;">
<h1>Agregar Cargos Empresa</h1>

<?php echo form_open('ctl_login_empresa/agregarcargonv',"class='key-cloud' id='form_ingresar' name='form_ingresar' style='width:40%; float:left; margin-top:0px'"); ?>
    
<table class="tableg" style="margin-left: 20px;">
    <tr>
        <td>Nombre del cargo</td>
        <td><input type="text" placeholder="Ingrese nombre de cargo" name="nvcargo"></td>
    </tr>
    <tr>
        <td>Documentos Necesarios</td>
        <td style="padding:25px 25px 25px 25px"> 
<?php if (!empty($cargosfiles)): foreach ($cargosfiles as $cargo): ?>
      <input type="checkbox" name="files[]" value="<?php  echo $cargo['idcargosfiles'];  ?>" style="margin: 15px 15px 15px 15px;"><?php  echo '      '.$cargo['descripcioncargosfiles'];  ?><br>
     
 <?php
    endforeach;?>
      </td>
     </tr>
    </table>
    <input type="submit" value="Agregar cargo" style="width:40%">
    </form>
        <?php
else:
    ?>
    
    
<div style="margin-top: 120px">
    <h2>No hay cargos en tu empresa<br>
        ¿Deseas agregar uno? haz click <a href="#">Aquí</a>
    </h2>
    
</div>
<?php endif; ?>
</section>
