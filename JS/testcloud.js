
$(document).ready(function() {
   
    
    $("#region").change(function() {
        $("#region option:selected").each(function() {
            region = $('#region').val();
            $.post("/apptest/index.php/controladorcloud/llenaprovincias", {
                region: region
            }, function(data) {
                $("#provincia").html(data);
            });
        });
    });
    $("#provincia").change(function() {
        $("#provincia option:selected").each(function() {
            provincia = $('#provincia').val();
            $.post("/apptest/index.php/controladorcloud/llenacomunas", {
                provincia: provincia
            }, function(data) {
                $("#comuna").html(data);
            });
        });
    });
    $("input[name='radio']").change(function() {
        if ($("input[name='radio']:checked").val() === "chileno") {
            $("#dniUser").css("display", "none");
            $("#rutUser").css("display", "block");
        }
        if ($("input[name='radio']:checked").val() === "extranjero") {
            $("#dniUser").css("display", "block");
            $("#rutUser").css("display", "none");
        }

    });
    $('#sig1').click(function() {
        $("#informacioncontacto").css("display", "block");
        $("#datospersonales").css("display", "none");
    
    });
    $('#sig2').click(function() {
        $("#informacioncontacto").css("display", "none");
        $("#informacionrelevante").css("display", "block");
  
    });
    $('#sig3').click(function() {
        $("#preguntasrecuperacion").css("display", "block");
        $("#informacionrelevante").css("display", "none");

    });
    $('#sig4').click(function() {
        $("#final").css("display", "block");
        $("#preguntasrecuperacion").css("display", "none");

    });
    $('#ant2').click(function() {
        $("#informacioncontacto").css("display", "none");
        $("#datospersonales").css("display", "block");
     
    });
    $('#ant3').click(function() {
        $("#informacioncontacto").css("display", "block");
        $("#informacionrelevante").css("display", "none");
       
    });
    $('#ant4').click(function() {
        $("#preguntasrecuperacion").css("display", "none");
        $("#informacionrelevante").css("display", "block");
       
    });
    $('#ant5').click(function() {
        $("#preguntasrecuperacion").css("display", "block");
        $("#final").css("display", "none");
       

    });
 
    $('#btn1').click(function() {
        $("#informacioncontacto1").css("display", "block");
        $("#datospersonales1").css("display", "none");
    });
    $('#btn2').click(function() {
        $("#informacionrelevante1").css("display", "block");
        $("#informacioncontacto1").css("display", "none");
    });
    $('#btn3').click(function() {
        $("#preguntasrecuperacion1").css("display", "block");
        $("#informacionrelevante1").css("display", "none");
    });
    $('#btn4').click(function() {
        $("#final1").css("display", "block");
        $("#preguntasrecuperacion1").css("display", "none");
    });
    $('#tan2').click(function() {
        $("#datospersonales1").css("display", "block");
        $("#informacioncontacto1").css("display", "none");
    });
    $('#tan3').click(function() {
        $("#informacioncontacto1").css("display", "block");
        $("#informacionrelevante1").css("display", "none");
    });
    $('#tan4').click(function() {
        $("#informacionrelevante1").css("display", "block");
        $("#preguntasrecuperacion1").css("display", "none");
    });
    $('#tan5').click(function() {
        $("#preguntasrecuperacion1").css("display", "block");
        $("#final1").css("display", "none");
    });
    $('#cv').click(function() {
        $("#cuerpo").css("display", "none");
        $("#actualizar").css("display", "block");
 
    });
    $('#act').click(function() {
        $("#actualizar").css("display", "none");
        $("#cuerpo").css("display", "block");
     
    });
    $('#pais').change(function() {
        if ($(this).val() !== 'Chile') {
            
            $('#extranjero').css("display", "block");
            $('#nacional').css("display", "none");

        }
    });
    $('#pais').change(function() {
        if ($(this).val() === 'Chile') {
           
            $('#extranjero').css("display", "none");
            $('#nacional').css("display", "block");

        }
    });
    $("#valor").change(function() {
        $("#valor option:selected").each(function() {
            valor = $('#valor').val();
            $.post("/apptest/index.php/controladorcloudadministrador/listarTest", {
                valor: valor
            }, function(data) {


                $("#div_test").html(data);
            });

        });

    });
    $('#BotonRespuetas').click(function() {
        if ($('#Pregunta_test').val()) {
            $("#ingresarOpciones").css("display", "block");
            $("#BotonRespuetas").css("display", "none");
        } else {
            alert('Debe ingresar la pregunta');
        }

    });
    $("select[name='NumeroOpciones']").change(function() {
        valor = $("#hola option:selected").val();
        for (i = 1; i <= valor; i++) {
            $("#" + i + "").css('display', 'block');
        }
        $("#ingresarOpciones").css('display', 'none');
        $("#butones").css('display', 'block');


    });
    $("select[name='num_preguntas']").change(function() {
        valor = $("#num_preguntas option:selected").val();
        for (i = 1; i <= valor; i++) {
            $("#" + i + "").css('display', 'block');
        }

    });
    $.fn.nombre = function(valor) {

     B1 = $("#" + valor).attr('id');
     para_for=B1.substring(0,1);
    
     var suma=0;
     for(var x=1;x<10;x++){
         valor = $("#"+ para_for + x).val();
         
         suma  = parseInt(suma);
         valor = parseInt(valor);  
         
         if(isNaN(valor)){
             valor=0;
         }
         
         $("#valor"+para_for).val('10');
         restante=$("#valor"+para_for).val();
         restante=parseInt(restante);
         suma = suma + valor;
         
         if(restante-suma<0){
             alert('Solo puede repartir 10 puntos');
             cam=$("#"+para_for+x).val();
             
             $("#"+para_for+x).val('');
             cam=parseInt(cam);
                suma=suma-cam;
         }
         
         
     }     
     $("#valor"+para_for).val(restante-suma);
    
     var sum = 0;
     $('.subtotal').each(function(){
         sum += parseFloat(this.value);
     });
     var total=parseFloat($('#cantidad_preguntas').val());
     total=total*10;
     var porcentaje=0;
     if(sum>0)porcentaje=parseInt((100*(total-sum))/total);
     
     if((total-sum)==total) porcentaje=100;
     $("#barra").progressbar({value:  porcentaje}); //actualizar la barra.
     $("#titulo_barra").html(porcentaje+"% Preguntas Respondidas"); //actualizar etiqueta.
     
    };
    
    
    $.fn.email = function(valor) {
   
        B1 = $(valor).val();
        i=$(valor).attr("name");
        $(valor).each(function() {
                rut=B1;              
                $.post("/apptest/index.php/controladorcloudempresas/consultarID", {
                    rut: rut
                }, function(data) {
                    $("#email_asig"+i).val(data);
                });

            });
        
    };
      $("#preguntas").change(function() {
        $("#preguntas option:selected").each(function() {
            preguntas = $('#preguntas').val();
            $.post("/apptest/index.php/controladorcloudadministrador/cantidadPreguntas", {
                preguntas: preguntas
            }, function(data) {
                $("#cant_preguntas").html(data);
            });
        });
      });
          $("#cant_preguntas").change(function() {
        $("#cant_preguntas option:selected").each(function() {
            cant_preguntas = $('#cant_preguntas').val();
            test=$('#preguntas').val();
            testCantPreguntas=[cant_preguntas,test];
            $.post("/apptest/index.php/controladorcloudadministrador/seleccionPreguntas", {
                arr_test: testCantPreguntas
            }, function(data) {
                $("#seleccion_preguntas").html(data);
            });
        });
    });
  
        $("#standar").click(function() {
            var nombre='Estandar';
            var tipo='1';
            datos=[nombre,tipo];
            $.post("/apptest/index.php/controladorcloud/Planes", {
            datos:datos
            }, function(data) {
                $("#planes").css('display','block');
                $("#planes").css('width','1000px');
                $("#planes").html(data);
            });
        });
        
        $("#medio").click(function() {
            var nombre='Medio';
            var tipo='1';
            datos=[nombre,tipo];
            $.post("/apptest/index.php/controladorcloud/Planes", {
            datos:datos
            }, function(data) {
                $("#planes").css('display','block');
                $("#planes").css('width','1000px');
                $("#planes").html(data);
                
            });
        });
        
        $("#full").click(function() {
            var nombre='Full';
            var tipo='1';
            datos=[nombre,tipo];
            $.post("/apptest/index.php/controladorcloud/Planes", {
            datos:datos
            }, function(data) {
                $("#planes").css('display','block');
                $("#planes").css('width','1000px');
                $("#planes").html(data);
            });
        });
                $("#mostrar").click(function() {
                $("#errores").css("display", "block");
                });
        

      
        $.fn.estadovisible=function(usuario,test,rendicion){
           
            
            datos=[usuario,test,rendicion];
            $.post("/apptest/index.php/controladorcloudempresas/ConsultarEstadoTest", {
                datos:datos
            }, function(data) {
                 window.open(data, "_blank", "toolbar=no, scrollbars=no, resizable=yes, top=250, left=500, width=400, height=200");
        });
        };
        
         $.fn.consultando=function(){
            $.post("/apptest/index.php/controladorcloudempresas/act_saldo_consultas", {
            },function(data){
                $("#contador").html(data);
            });            
      };
      
        $("#exportacion_masiva").click(function(){
        var checkboxValues = new Array();
var nombre='a';
//recorremos todos los checkbox seleccionados con .each
          $('input[name="favoritos"]:checked').each(function() {
	//$(this).val() es el valor del checkbox correspondiente
	checkboxValues.push($(this).attr('id'));

	switch($( "input:checked" ).val()) {
        case '4':
        nombre='ARP';
        break;
	case '7':
	nombre = 'CIE';
	break;
	case '3':
	nombre = 'DCT';
	break;
	case '11':
	nombre = 'ECT';
	break;
	case '13':
	nombre = 'CET';
	break;
	case '2':
	nombre = 'PDV';
	break;
	case '5':
	nombre = 'PDR';
	break;
	case '10':
	nombre = 'EEL';
	break;
	case '1':
	nombre = 'TDL';
	break;
   }
          
});
  
if(checkboxValues==''){
    alert('Debe seleccionar al menos un postulante');
}else{

	var testframe = document.createElement("iframe");
		testframe.id = "Map";
		testframe.name = "Map";
		testframe.src = "";
		testframe.style.display="none";

		document.body.appendChild(testframe);

	var mapForm = document.createElement("form");
		mapForm.target = "Map";
		mapForm.method = "POST"; 
		mapForm.action = "/apptest/index.php/controladorcloudempresas/consulta_mas";

		var mapInput = document.createElement("input");
		mapInput.type = "text";
		mapInput.name = "datos";
		mapInput.value = checkboxValues;
		mapInput.style.display="none";

		mapForm.appendChild(mapInput);

		document.body.appendChild(mapForm);

		mapForm.submit();

} 
 });   
        
 $(".cerr").click(function(){
         $.ajax({
        type: "POST",
        url: "/apptest/index.php/controladorcloudempresas/noempresanueva",
        success: function(data){        
           $("#reload_id2").css('display','none');
    }
  });
});        
        
        $.fn.eliminarAsignacion=function(empresa,postulante,test){
             datos=[empresa,postulante,test];
            $.post("/apptest/index.php/controladorcloudadministrador/eliminarasignacion", {
                datos:datos
            }, function(data) {
                location.reload();
        });
        };
        $.fn.editarAsignacion=function(empresa,postulante,test,nombre,apellido,email){
             datos=[empresa,postulante,test];
             
            $.post("/apptest/index.php/controladorcloudadministrador/editarasignacion", {
                datos:datos
            }, function(data) {
                //se puede editar?
                if(data!==''){
                    
                    $("#reload_id2").css('display','block');
                    $("#id_postulante").html('<input type="hidden" id="id_postu" name="id_postulante" value="'+data+'"/>');
                    $("#test").html('<input type="hidden" name="test" value="'+test+'"/>');
                    $("#empresa").html('<input type="hidden" name="empresa" value="'+empresa+'"/>');
                    $("#nombre_postulante").attr('value',nombre);
                    $("#apellido_postulante").attr('value',apellido);
                    $("#email_postulante").attr('value',email);
                    
                }else{
                    alert('No se puede editar, ya que el postulante se registró de forma independiente en la plataforma, o ya tiene un test rendido.');
                }
        });
        };
        $.fn.detalleTest=function(test,postulante,rendicion){
            alert(test);
            alert(rendicion);
            alert(postulante);
        };
            $.fn.desactivarAdmin=function(id_admin){
                $.post("/apptest/index.php/controladorcloudadministrador/desactivarAdmin", {
                id_admin:id_admin
            }, function(data) {
                //se puede editar?
                alert('Usuario desactivado');
                location.reload();
        });
            };
            $.fn.reactivarAdmin=function(id_admin){
                $.post("/apptest/index.php/controladorcloudadministrador/reactivarAdmin", {
                id_admin:id_admin
            }, function(data) {
                //se puede editar?
                alert('Usuario reactivado');
                location.reload();
        });
            };
             $.fn.filtrarOrdenes = function(estado,tipo,page) {       
            $('#reload_id_consulta').css('display','block');
            window.location.href ="/apptest/index.php/controladorcloudadministrador/facturacion/"+estado+"/"+tipo+"/1";
            
            //$.post("/apptest/index.php/controladorcloudadministrador/facturacion/"+estado);
            
            }; 

    $.fn.grabar = function(totalRegistros)
    {
        
        var datos = new Array();
            k=0;
            for(x=0;x<totalRegistros;x++)
            {
                orden_compra = $('#orden_compra'+x).val();
                tipo_documento = $('#id_tipo_documento'+x).val();
                folio = $('#folio'+x).val();
                fecha_documento = $('#fecha_documento'+x).val();
                var arregloFecha = new Array();
                arregloFecha = fecha_documento.split('-');
                dia = arregloFecha[0];
                mes = arregloFecha[1];
                ano = arregloFecha[2];
                total = $('#total'+x).val();
                total = total.replace(",",".");
                
                if(orden_compra!=='' && tipo_documento!=='' && folio!=='' && dia!=='' && mes!=='' && ano!=='' && total!=='')
                {
                 
                    datos[k]=[orden_compra,tipo_documento,folio,dia,mes,ano,total];
                    k++;
 
                }
               
               
            };
            
             if(k>0){
                
                 $('#reload_id_consulta1').css('display','block');
                 
//                 window.location.href ="/apptest/index.php/controladorcloudadministrador/facturacion/1";
                 
                 $.post("/apptest/index.php/controladorcloudadministrador/grabarFacturacion/1/1",
                        {dato:datos} , function(data){ $('#result_bol').html(data);
                        setTimeout('location.reload()',0);
                            
                        }).fail( function(xhr, textStatus, errorThrown) {
        
    }); 
                    
             }
             else
             {
                alert('No se han podido actualizar los datos'); 
             }
    
    };  
            
        
}); 

