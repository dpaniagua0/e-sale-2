var UVAQ = UVAQ || {};
UVAQ.inicializarTablaPedidos = function(){
  $('a#delete-order-link').click(function(){
    var $columnaId = $("td.columna-checkbox:has(:checked)").first().siblings("td.columna-id").first();
    var id = $columnaId.text();
    var data = {
      id_eliminar: id
    };
    if($columnaId.text()){  
      $("#myModal").modal({
        "backdrop"  : "static",
        "keyboard"  : true,
        "show"      : true    
      });
      $("#myModal a#ok").click(function(e) {
        $('div#contenedor-tabla').load('delete.php',data,function(){
          UVAQ.inicializarTablaPedidos();   
        });     	    
        $("#myModal").modal('hide');
      });
      $("#myModal a#cancel").click(function(e){
        $("#myModal").modal('hide');
        $("td.columna-checkbox").attr('checked', false);
      });
    }else {
      $("#error-seleccion").modal({
        "backdrop"  : "static",
        "keyboard"  : true,
        "show"      : true    
      });
      
      $("#error-seleccion a#error").click(function(){
        $("#error-seleccion").modal('hide');
      });
    } 
  });
  $("a#edit-order-link").click(function(evento) {
    evento.preventDefault();
    var $ids = $("td.columna-checkbox:has(:checked)").siblings("td.columna-id");
    var url = $(this).attr("href") + '?'
    if($ids.text()){
      $ids.each(function() {
        url += "id_editar=" + $(this).text();
      });
      window.location.replace(url);
    } else {
      $("#error-seleccion").modal({
        "backdrop"  : "static",
        "keyboard"  : true,
        "show"      : true    
      });
      
      $("#error-seleccion a#error").click(function(){
        $("#error-seleccion").modal('hide');
      });
    }
  });
};

$(function(){
  UVAQ.inicializarTablaPedidos();
});




