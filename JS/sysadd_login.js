$(document).on('ready', function(){

var posicionActual, posicionNueva = 0;

$(window).scroll(function(){
posicionNueva = $(this).scrollTop();

if(posicionNueva>posicionActual){
$('#barra').hide('slow');
} else if(posicionNueva<posicionActual){
$('#barra').show('slow');
}
posicionActual=posicionNueva;
});

})