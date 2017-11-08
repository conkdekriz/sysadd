$(document).ready(function(){
 
     $(document).mousemove(function(e){
                        $('#popup').css('top',e.pageY+3);
                        $('#popup').css('left',e.pageX+3);
	});
    $.fn.over = function(pregunta,test){
        $('#popup').fadeIn('slow');
        $('.popup-overlay').fadeIn('slow');
        $('.popup-overlay').height($(window).height());
        
          var array_datos=[pregunta,test];
          $.post("/apptest/index.php/controladorcloudtest/preguntaFrecuente", {
                    datos:array_datos
                }, function(data) {
                    $('#preguntaPrueba').html(data);
                });
        
        return true;
    };
    $.fn.act_saldo_1=function(){
   //hacer visible boton
    
    var saldo=$("#act_saldo_consulta_1").text();
    
//    $("#act_saldo_consulta_1").html(parseInt(saldo)-1);
window.parent.act_saldo_consulta_1.innerHTML = '<h1>'+ (parseInt(saldo)-1) +'</h1>';
};
    $.fn.noover=function(){
       
        $('#popup').fadeOut('slow');
        $('.popup-overlay').fadeOut('slow');
        return true;
    };
 $(document).mousemove(function(e){
                        $('#popupInfo').css('top',e.pageY+5);
                        $('#popupInfo').css('left',e.pageX+3);
	});
    $.fn.info= function(test){
        $('#popupInfo').fadeIn();
        $('.popup-overlayInfo').fadeIn();
        $('.popup-overlayInfo').height($(window).height());
        
          var array_datos=[test];
          $.post("/apptest/index.php/controladorcloud/infoTest", {
                    datos:array_datos
                }, function(data) {
                    $('#InfoTest').html(data);
                });
        
        return true;
    };
    $.fn.nooverinfo=function(){
       
        $('#popupInfo').fadeOut();
        $('.popup-overlayInfo').fadeOut();
        return true;
    };
    $.fn.over2 = function(rendicion_test,test,postulante){
        
//        var posicion=$('#'+rendicion_test).position();
//       $('#popup2').css('top',(posicion.top-200));
        $('#popup2').fadeIn('slow');
        $('.popup-overlay2').fadeIn('slow');
        $('.popup-overlay2').height($(window).height());
       
          var array_datos=[rendicion_test,test,postulante];
          $.post("/apptest/index.php/controladorcloudtest/visibleoculto", {
                    datos:array_datos
                }, function(data) {
                    $('#bajarsubir').html(data);
                });
        
        return true;
    };
       

    $.fn.noover2=function(){
       
        $('#popup2').fadeOut('slow');
        $('.popup-overlay2').fadeOut('slow');
        
        return true;
    };
    $.fn.noover2refresh=function(){
       
        $('#popup2').fadeOut('slow');
        $('.popup-overlay2').fadeOut('slow');
        location.reload();
        return true;
        
    };
     $.fn.noover2prueba=function(test){
       
        $('#popup2').fadeOut('slow');
        $('.popup-overlay2').fadeOut('slow');
        location.reload();
        mostrar(test);
        return true;
        
    };
    
    $.fn.over10 = function(rendicion_test,test,postulante){    	
    	$('#popup10').fadeIn('slow');
        $('.popup-overlay10').fadeIn('slow');
        $('.popup-overlay10').height($(window).height());
       
          var array_datos=[rendicion_test,test,postulante];
          $.post("/apptest/index.php/controladorcloudadministrador/visibleoculto", {
                    datos:array_datos
                }, function(data) {
                	$('#bajarsubir').html(data);
                });        
        return true;
    };

    $.fn.noover10=function(){
    	 $('#popup10').fadeOut('slow');
         $('.popup-overlay10').fadeOut('slow');
          
        
        return true;
    };
    $.fn.noover10refresh=function(){
    	  $('#popup10').fadeOut('slow');
          $('.popup-overlay10').fadeOut('slow');       
        location.reload();
        return true;
        
    };
     $.fn.noover10prueba=function(test){
             
    	 $('#popup10').fadeOut('slow');
         $('.popup-overlay10').fadeOut('slow');
         location.reload();
         mostrar(test);
         return true;
    };
    
    $.fn.over4 = function(rendicion_test,test,postulante){
        
//        var posicion=$('#'+rendicion_test).position();
//       $('#popup2').css('top',(posicion.top-200));
      
        $('#popup4').fadeIn('slow');
        $('.popup-overlay4').fadeIn('slow');
        $('.popup-overlay4').height($(window).height());
       
          var array_datos=[rendicion_test,test,postulante];
          $.post("/apptest/index.php/controladorcloudtest/visibleoculto", {
                    datos:array_datos
                }, function(data) {
                    $('#bajarsubir2').html(data);
                });
        
        return true;
    };
    
    $.fn.noover4=function(){
       
        $('#popup4').fadeOut('slow');
        $('.popup-overlay4').fadeOut('slow');
        
        return true;
    };
    $.fn.noover4refresh=function(){
       
        $('#popup4').fadeOut('slow');
        $('.popup-overlay4').fadeOut('slow');
        location.reload();
        return true;
        
    };
     $.fn.noover4prueba=function(test){
       
        $('#popup4').fadeOut('slow');
        $('.popup-overlay4').fadeOut('slow');
        location.reload();
        mostrar(test);
        return true;
        
    };

    
   
    $.fn.aceptar=function(rendicion,postulante,test){
        $('#b_public_prog_canc').css('display','none');
        $('#b_public_prog_acep').css('display','none');
        
        
        var opcion=$('input[name=public_proteg]:checked').val();
        
        var array_datos=[rendicion,test,postulante,opcion];
          $.post("/apptest/index.php/controladorcloudtest/visible", {
                    datos:array_datos
                }, function(data) {
                    $('#popuppr').html(data);
                });
    };
    
     $.fn.over3 = function(){

        $('#popup2').fadeIn('slow');
        $('.popup-overlay2').fadeIn('slow');
        $('.popup-overlay2').height($(window).height());
       
    
          $.post("/apptest/index.php/controladorcloud/DatosPersonales", {
                 
                }, function(data) {
                    $('#DatosPersonales').html(data);
                });
        
        return true;
    };
    $.fn.noover3=function(){
        $('#popup2').fadeOut('slow');
        $('.popup-overlay2').fadeOut('slow');
        
        $('html,body').animate({
            scrollTop: $("#div_mostrar").offset().top
        }, 2000);
        
       
        
        return true;
    };
    $.fn.overIC = function(){

        $('#popupIC').fadeIn('slow');
        $('.popup-overlayIC').fadeIn('slow');
        $('.popup-overlayIC').height($(window).height());
       
    
          $.post("/apptest/index.php/controladorcloud/InformacionContacto", {
                 
                }, function(data) {
                    $('#InformacionContacto').html(data);
                });
        
        return true;
    };
     $.fn.nooverIC=function(){
       
        $('#popupIC').fadeOut('slow');
        $('.popup-overlayIC').fadeOut('slow');
        
        return true;
    };
     $.fn.overIR = function(){

        $('#popupIR').fadeIn('slow');
        $('.popup-overlayIR').fadeIn('slow');
        $('.popup-overlayIR').height($(window).height());
       
    
          $.post("/apptest/index.php/controladorcloud/InformacionRelevante", {
                 
                }, function(data) {
                    $('#InformacionRelevante').html(data);
                });
        
        return true;
    };
    $.fn.nooverIR=function(){
       
        $('#popupIR').fadeOut('slow');
        $('.popup-overlayIR').fadeOut('slow');
        
        return true;
    };
     $.fn.overPU = function(){

        $('#popupPU').fadeIn('slow');
        $('.popup-overlayPU').fadeIn('slow');
        $('.popup-overlayPU').height($(window).height());
       
    
          $.post("/apptest/index.php/controladorcloud/PreguntaUsuario", {
                 
                }, function(data) {
                    $('#PreguntaUsuario').html(data);
                });
        
        return true;
    };
    $.fn.nooverPU=function(){
       
        $('#popupPU').fadeOut('slow');
        $('.popup-overlayPU').fadeOut('slow');
        
        return true;
    };
$.fn.verMotivo=function(id_denuncia){
         $('#popup2').fadeIn('slow');
        $('.popup-overlay2').fadeIn('slow');
        $('.popup-overlay2').height($(window).height());
            var denuncia=id_denuncia;
            $.post("/apptest/index.php/controladorcloudadministrador/act_lectura", {
                datos:denuncia
                  }, function(data) {
                      $("#div_motivo").css('display','block');
                       $("#div_motivo").html(data);
                });
        };
$.fn.solucion_denuncia=function(id_denuncia){
    
        $('#popupSD').fadeIn('slow');
        $('.popup-overlaySD').fadeIn('slow');
        $('.popup-overlaySD').height($(window).height());
            var denuncia=id_denuncia;
            $.post("/apptest/index.php/controladorcloudadministrador/solucion_denun", {
                datos:denuncia
                  }, function(data) {
                     $("#div_motivo").css('display','none');
                     $("#actualizar_solucion").html(data);
                });
        };
        $.fn.ok_solucion=function(text,id_denuncia){
    
        $('#popupS').fadeIn('slow');
        $('.popup-overlayS').fadeIn('slow');
        $('.popup-overlayS').height($(window).height());
            var denuncia=id_denuncia;
            var texto=text;
            var arr=[denuncia,texto];
            $.post("/apptest/index.php/controladorcloudadministrador/act_solucion", {
                datos:arr
                  }, function(data) {
                     $("#actualizar_solucion").css('display','none');
                     $("#div_act_solucion").html(data);
                });
        };
        $.fn.nooverSREFRESH=function(){
       
        $('#popupS').fadeOut('slow');
        $('.popup-overlayS').fadeOut('slow');
        location.reload();
        return true;
    };
     $.fn.nooverSDREFRESH=function(){
       
        $('#popupSD').fadeOut('slow');
        $('.popup-overlaySD').fadeOut('slow');
         location.reload();
        
        return true;
    };
     $.fn.verDetalle=function(id_denuncia){
    
        $('#popupVD').fadeIn('slow');
        $('.popup-overlayVD').fadeIn('slow');
        $('.popup-overlayVD').height($(window).height());
            var denuncia=id_denuncia;
          
            $.post("/apptest/index.php/controladorcloudadministrador/detalleAntigua", {
                datos:denuncia
                  }, function(data) {
                     $("#div_detalle").html(data);
                });
        };
        $.fn.nooverVDREFRESH=function(){
       
        $('#popupVD').fadeOut('slow');
        $('.popup-overlayVD').fadeOut('slow');
        location.reload();
        return true;
    };
    $.fn.nooverVD=function(){
       
        $('#popupVD').fadeOut('slow');
        $('.popup-overlayVD').fadeOut('slow');
        
        return true;
    };
     $.fn.verDetalle_empresa=function(id_denuncia){
    
        $('#popupVDE').fadeIn('slow');
        $('.popup-overlayVDE').fadeIn('slow');
        $('.popup-overlayVDE').height($(window).height());
            var denuncia=id_denuncia;
          
            $.post("/apptest/index.php/controladorcloudempresas/detalleAntigua", {
                datos:denuncia
                  }, function(data) {
                     $("#div_detalleempresa").html(data);
                });
        };
        $.fn.nooverVDEREFRESH=function(){
       
        $('#popupVDE').fadeOut('slow');
        $('.popup-overlayVDE').fadeOut('slow');
        location.reload();
        return true;
    };
    $.fn.nooverVDE=function(){
       
        $('#popupVDE').fadeOut('slow');
        $('.popup-overlayVDE').fadeOut('slow');
        return true;
    };
     $.fn.overIR2 = function(){

        $('#popupIR2').fadeIn('slow');
        $('.popup-overlayIR2').fadeIn('slow');
        $('.popup-overlayIR2').height($(window).height());
       
    
          $.post("/apptest/index.php/controladorcloudtest/InformacionRelevante", {
                 
                }, function(data) {
                    $('#InformacionRelevante2').html(data);
                });
        
        return true;
    };
    $.fn.nooverIR2=function(){
       
        $('#popupIR2').fadeOut('slow');
        $('.popup-overlayIR2').fadeOut('slow');
        
        return true;
    };
     $.fn.overDP_empresas = function(){

        $('#popupDP_empresas').fadeIn('slow');
        $('.popup-overlayDP_empresas').fadeIn('slow');
        $('.popup-overlayDP_empresas').height($(window).height());
       
    
          $.post("/apptest/index.php/controladorcloudempresas/DatosPersonales", {
                 
                }, function(data) {
                    $('#DatosPersonales_empresas').html(data);
                });
        
        return true;
    };
     $.fn.nooverDP_empresas = function(){
       
        $('#popupDP_empresas').fadeOut('slow');
        $('.popup-overlayDP_empresas').fadeOut('slow');
        
        return true;
    };
    $.fn.overIC_empresas = function(){

        $('#popupIC_empresas').fadeIn('slow');
        $('.popup-overlayIC_empresas').fadeIn('slow');
        $('.popup-overlayIC_empresas').height($(window).height());
       
    
          $.post("/apptest/index.php/controladorcloudempresas/InformacionContacto", {
                 
                }, function(data) {
                    $('#InformacionContacto_empresas').html(data);
                });
        
        return true;
    };
     $.fn.nooverIC_empresas = function(){
       
        $('#popupIC_empresas').fadeOut('slow');
        $('.popup-overlayIC_empresas').fadeOut('slow');
        
        return true;
    };
    $.fn.overIR_empresas = function(){

        $('#popupIR_empresas').fadeIn('slow');
        $('.popup-overlayIR_empresas').fadeIn('slow');
        $('.popup-overlayIR_empresas').height($(window).height());
       
    
          $.post("/apptest/index.php/controladorcloudempresas/InformacionRelevante", {
                 
                }, function(data) {
                    $('#InformacionRelevante_empresas').html(data);
                });
        
        return true;
    };
     $.fn.nooverIR_empresas = function(){
       
        $('#popupIR_empresas').fadeOut('slow');
        $('.popup-overlayIR_empresas').fadeOut('slow');
        
        return true;
    };
    $.fn.overIA_empresas = function(){

        $('#popupIA_empresas').fadeIn('slow');
        $('.popup-overlayIA_empresas').fadeIn('slow');
        $('.popup-overlayIA_empresas').height($(window).height());
       
    
          $.post("/apptest/index.php/controladorcloudempresas/InformacionAdicional", {
                 
                }, function(data) {
                    $('#InformacionAdicional_empresas').html(data);
                });
        
        return true;
    };

    $.fn.overIA_asignacion = function(){
        $('#popupIA_asignacion').fadeIn('slow');
        $('.popup-overlayIA_empresas').fadeIn('slow');
        $('.popup-overlayIA_empresas').height($(window).height());
       
    
          $.post("/apptest/index.php/controladorcloudempresas/InformacionAsignacion", {
                 
                }, function(data) {
                    $('#InformacionAsignacion_empresas').html(data);
                });
        
        return true;
    };

     $.fn.nooverIA_empresas = function(){
       
        $('#popupIA_empresas').fadeOut('slow');
        $('.popup-overlayIA_empresas').fadeOut('slow');
        
        return true;
    };

     $.fn.nooverIA_asignacion = function(){
       
        $('#popupIA_asignacion').fadeOut('slow');
        $('.popup-overlayIA_asignacion').fadeOut('slow');
        
        return true;
    };
    
    $.fn.overpublicar = function(rendicion,user){
        $('#popuppublicar').fadeIn('slow');
        $('.popup-overlaypublicar').fadeIn('slow');
        $('.popup-overlaypublicar').height($(window).height());
        
          var array_datos=[rendicion,user];
          $.post("/apptest/index.php/controladorcloudwonderlic/publicar", {
                    datos:array_datos
                }, function(data) {
                    $('#publicar').html(data);
                });
        
        return true;
    };
    $.fn.nooverpublicar=function(){
       
        $('#popuppublicar').fadeOut('slow');
        $('.popup-overlaypublicar').fadeOut('slow');
        return true;
    };
    
    
    
    
    
    
$(document).mousemove(function(e){
                        $('#popupSR').css('top',e.pageY+3);
                        $('#popupSR').css('left',e.pageX+3);
	});
$.fn.SR = function(){
        $('#popupSR').fadeIn('slow');
        $('.popup-overlaySR').fadeIn('slow');
        $('.popup-overlaySR').height($(window).height());
        $('#datosSR').html('Solo con Rut. Las empresas podrán visualizar estos resultados solo con tu Rut');
       
        return true;
};
$.fn.noSR=function(){
       
        $('#popupSR').fadeOut('slow');
        $('.popup-overlaySR').fadeOut('slow');
        return true;
    };



$(document).mousemove(function(e){
                        $('#popupRC').css('top',e.pageY+3);
                        $('#popupRC').css('left',e.pageX+3);
	});

$.fn.RC = function(){
        $('#popupRC').fadeIn('slow');
        $('.popup-overlayRC').fadeIn('slow');
        $('.popup-overlayRC').height($(window).height());
        $('#datosRC').html('Requiere rut y clave. Las empresas podrán visualizar estos resultados con tu Rut y código');
        return true;
};
$.fn.noRC=function(){
       
        $('#popupRC').fadeOut('slow');
        $('.popup-overlayRC').fadeOut('slow');
        return true;
    };





$(document).mousemove(function(e){
                        $('#popupCG').css('top',e.pageY+3);
                        $('#popupCG').css('left',e.pageX+3);
	});

$.fn.CG = function(){
        $('#popupCG').fadeIn('slow');
        $('.popup-overlayCG').fadeIn('slow');
        $('.popup-overlayCG').height($(window).height());
        $('#datosCG').html('Consulta General. "El visualizar este resultado, tiene costo"');
        
        
        return true;
};
$.fn.noCG=function(){
       
        $('#popupCG').fadeOut('slow');
        $('.popup-overlayCG').fadeOut('slow');
        return true;
    };


$(document).mousemove(function(e){
                        $('#popupTS').css('top',e.pageY+3);
                        $('#popupTS').css('left',e.pageX+3);
	});

$.fn.TS = function(){
        $('#popupTS').fadeIn('slow');
        $('.popup-overlayTS').fadeIn('slow');
        $('.popup-overlayTS').height($(window).height());
        $('#datosTS').html('Test Solicitado. "La visualización de este resultado no tiene costo adicional. Corresponde a un test solicitado por la empresa"');
          
        
        return true;
};
$.fn.noTS=function(){
       
        $('#popupTS').fadeOut('slow');
        $('.popup-overlayTS').fadeOut('slow');
        return true;
    };
    
    
    $(document).mousemove(function(e){
                        $('#popupLA').css('top',e.pageY+3);
                        $('#popupLA').css('left',e.pageX+3);
	});

$.fn.LA = function(){
        $('#popupLA').fadeIn('slow');
        $('.popup-overlayLA').fadeIn('slow');
        $('.popup-overlayLA').height($(window).height());
        $('#datosLA').html('Libre Acceso. "Visualización liberada ya que corresponde a un test solicitado por tu empresa"');
          
        
        return true;
};
$.fn.noLA=function(){
       
        $('#popupLA').fadeOut('slow');
        $('.popup-overlayLA').fadeOut('slow');
        return true;
    };


    $(document).mousemove(function(e){
                        $('#popupOD').css('top',e.pageY+3);
                        $('#popupOD').css('left',e.pageX+3);
	});

$.fn.OD = function(){
        $('#popupOD').fadeIn('slow');
        $('.popup-overlayOD').fadeIn('slow');
        $('.popup-overlayOD').height($(window).height());
        $('#datosOD').html('On-Demand, A la espera de que una empresa solicite tus resultados');
          
        
        return true;
};
$.fn.noOD=function(){
       
        $('#popupOD').fadeOut('slow');
        $('.popup-overlayOD').fadeOut('slow');
        return true;
    };
     $.fn.mostrar = function(rut,test){
         $("#avisos_avisos").hide();
              if(rut===''){
                  $("#reload_id2").css('display', 'block');
                    var texto_ = '<h1 style="margin-bottom:40px;">Lo sentimos</h1>\n\
                                  <h3 style="color:#888;margin-bottom:40px;">Debes ingresar un rut válido.</h3>';
                    var boton  = '<input type="button" id="continuar" value="Continuar" onclick="$(&apos;#continuar&apos;).continuar();"/>';
                    $("#cantidad2").html(''+texto_+boton+'');
              }else{
            var value = new Array();
            value.push("'"+rut+"'",test);
            
            
       $('#reload_id_consulta').css('display','block');
        $.post ("/apptest/index.php/controladorcloudadministrador/listaTest",{
          valor:value
           }, function(data) {
               $('#reload_id_consulta').css('display','none');
               $("#div_mostrar").css('display','block');
               $("#div_mostrar").html(data);
           });
              }
       };
             
});



 