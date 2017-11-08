$(document).ready(function() {
  // diálogo que contiene la barra
  $("#barra").progressbar({
    value : 1
  });

  $("#dialogo_barras").dialog('open');

  $("#dialogo_barras").dialog({
    autoOpen: true,
    modal: true,
    closeOnEscape: false,
    title: "Avance.",
    height: 130,
    open: function(event, ui) {
      // ocultar el botón de cerrar en el diálogo
      $(this).closest('.ui-dialog').find('.ui-dialog-titlebar-close').hide();
    }
  });

  // preparación de la barra de progreso

  // cuando inicia el proceso...
});

var preguntas_total = 0;
$.fn.llenarText = function(val, num_pregunta, num_pregs) {
  value = $("#input" + val).val();
  if (value === '') {
    $('#inp').actualizarBarra2(num_pregunta, num_pregs);
  } else {
    $('#inp').actualizarBarra(num_pregunta, num_pregs);
  }
};

arr_progreso = [];
$.fn.actualizarBarra = function(num_pre, num_pregs) {
  var num_preguntas = num_pregs;
  arr_progreso[num_pre] = '1';

  var largo = 0;
  for (var x = 0;x <= arr_progreso.length; x++) {
    if (arr_progreso[x] === '1') {
      largo++;
    }
  }

  var por = largo * 100 / num_preguntas;

  porcentaje	= parseInt(por),
  etiqueta	= parseInt(por) + "% Preguntas Respondidas";


  $("#barra").progressbar({ value: porcentaje }); // actualizar la barra
  $("#titulo_barra").html(etiqueta); // actualizar etiqueta
  preguntas_total = largo;
};

$.fn.actualizarBarra2 = function(num_pre, num_pregs) {
  var num_preguntas = num_pregs;
  arr_progreso[num_pre] = '0';

  var largo = 0;
  for (var x = 0;x <= arr_progreso.length; x++) {
    if (arr_progreso[x] === '1') {
      largo++;
    }
  }

  var por = largo * 100 / num_preguntas;

  porcentaje	= parseInt(por),
  etiqueta	= parseInt(por) + "% Preguntas Respondidas";

  $("#barra").progressbar({ value: porcentaje }); // actualizar la barra
  $("#titulo_barra").html(etiqueta); // actualizar etiqueta
  preguntas_total = largo;
};

$.fn.actualizarBarra3 = function(num_pre, num_pregs, tipo) {
  if (tipo == 'menos') {
    num_pre = parseInt(num_pre) + 1;
  }
  var num_preguntas = parseInt(num_pregs);
  arr_progreso[num_pre] = '1';

  var largo = 0;
  for (var x = 0;x <= arr_progreso.length; x++) {
    if (arr_progreso[x] === '1') {
      largo++;
    }
  }

  var por = largo * 100 / num_preguntas;

  porcentaje	= parseInt(por),
  etiqueta	= parseInt(por) + "% Preguntas Respondidas";


  $("#barra").progressbar({ value: porcentaje }); // actualizar la barra
  $("#titulo_barra").html(etiqueta); // actualizar etiqueta
  preguntas_total = largo;
};


// leer el archivo de texto que contiene el procentaje y avance del proceso principal
$.fn.contarPreguntas = function(total, aplica) {
  $("#prueba_dialogo_1").dialog();

  if (aplica === 1) {
    if (preguntas_total !== total) {
      var bool = confirm('Actualmente has contestado ' + preguntas_total + ' preguntas de un total de ' + total + ' ¿Deseas terminar de todos modos?');

      if (bool) {
        $("#form").submit();
        ga('send', 'event', 'KPI', 'terminar', 'clic', 1);
      }
    } else {
      $("#form").submit();
      ga('send', 'event', 'KPI', 'terminar', 'clic', 1);
    }
  } else if (aplica == 2) {
    $("#form").submit();
    ga('send', 'event', 'KPI', 'terminar', 'clic',1);
  } else {
    $("#form").submit();
    ga('send', 'event', 'KPI', 'terminar', 'clic',1);
  }
};

$.fn.contarPreguntas_sinterminar = function(total, aplica) {
  if (aplica == 1) {
    if ((preguntas_total) !== total) {
      var bool = confirm('Debes responder la TOTALIDAD de las preguntas\npara terminar el test.\nSi lo terminas en forma incompleta, el test quedará invalidado.\nPara completar el test debes elegir "Cancelar".');

      if (bool) {
        location.href = "/apptest/index.php/controladorcloud/";
      }
    } else {
      $("#form").submit();
      ga('send', 'event', 'KPI', 'terminar', 'clic',1);
    }
  } else if (aplica == 2) {
    $("#form").submit();
    ga('send', 'event', 'KPI', 'terminar', 'clic',1);
  } else {
    $("#form").submit();
    ga('send', 'event', 'KPI', 'terminar', 'clic',1);
  }
};

$.fn.contarPreguntas_sinterminar2 = function(total, aplica) {
  if (aplica == 1) {
    if ((preguntas_total) !== total) {
      var bool = confirm('Debes responder la TOTALIDAD de las preguntas\npara Terminar el test.\nSi lo terminas en forma incompleta, el test quedará invalidado.\nPara completar el test debes elegir "Cancelar".')
      if (bool) {
        location.href = "/apptest/index.php/controladorcloud/";
      }
    } else {
      $("#form").submit();
      ga('send', 'event', 'KPI', 'terminar', 'clic',1);
    }
  } else if( aplica == 2) {
    $("#form").submit();
    ga('send', 'event', 'KPI', 'terminar', 'clic',1);
  } else {
    $("#form").submit();
    ga('send', 'event', 'KPI', 'terminar', 'clic',1);
  }
};

$.fn.contarResultadoCET = function(total, aplica, ptos) {
  var sum = 0;
  $('.subtotal').each(function() {
    sum += parseFloat(this.value);
  });

  var total = parseFloat($('#cantidad_preguntas').val());
  total = total * ptos;
  var porcentaje = 0;
  if (sum > 0) porcentaje = parseInt((100 * (total - sum)) / total);

  if ((total - sum) == total) porcentaje = 100;

  if (aplica == 1) {
    if (porcentaje !== 100) {
      var bool = confirm('Existen preguntas en las que faltan puntos por asignar. Las respuestas deben sumar 10 puntos.\nPara completar el test debes elegir “Cancelar”');

      if (bool) {
        location.href = "/apptest/index.php/controladorcloud/";
      }
    } else {
      $("#form").submit();
      ga('send', 'event', 'KPI', 'terminar', 'clic',1);
    }
  } else if(aplica == 2) {
    $("#form").submit();
    ga('send', 'event', 'KPI', 'terminar', 'clic',1);
  } else {
    $("#form").submit();
    ga('send', 'event', 'KPI', 'terminar', 'clic',1);
  }
};
