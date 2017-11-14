<style>
    .tableg td{
        border: black solid 1px;
        background-color: white;
        padding: 25px 25px 25px 25px;
        font-size: 16px;
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

<?php
$cargoaux = 0;
?>
<section class="key-cloud" style="width:40%">
<h1>Cargos Empresa</h1>
<table class="tableg">
    <tr>
        <td>Nombre del cargo</td>
        <td>Documentos solicitados</td>
    </tr>
    <tr>
<?php if (!empty($cargos) and $cargoaux==0): foreach ($cargos as $cargo): ?>
     <?php if($cargoaux==0){ ?>
     <td><?php  echo $cargo['descripcioncargoempresa'];  ?> </td>
     <td>
     <?php if (!empty($cargos)): foreach ($cargos as $filecargo): ?>
     - <?php echo $filecargo['descripcioncargosfiles']; ?><br>
     <?php
    endforeach;
    endif;
    ?>
    </td>
     <?php } ?>
 <?php
 $cargoaux=1;
    endforeach;
    
else:
    ?>
     </tr>
    </table>
<div style="margin-top: 120px">
    <h2>No hay cargos en tu empresa<br>
        ¿Deseas agregar uno? haz click <a href="#">Aquí</a>
    </h2>
    
</div>
<?php endif; ?>
</section>
