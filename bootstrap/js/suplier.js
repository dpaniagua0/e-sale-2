var UVAQ = UVAQ || {};
UVAQ.inicializarTablaProveedores = function(){
  $('a#delete-suplier-link').click(function(){
    var $columnaId = $("td.columna-checkbox:has(:checked)").first().siblings("td.columna-id").first();
    var id = $columnaId.text();
    var data = {
      id_eliminar: id
    };
    if($columnaId.text()){
      $('div#contenedor-tabla').load('delete.php',data,function(){
        //        alert('Eliminado');
        UVAQ.inicializarTablaProveedores();   
      });
    }else {
      alert("Debe seleccionar algo");
    } 
  });  
  $("a#edit-suplier-link").click(function(evento) {
    evento.preventDefault();
    var $ids = $("td.columna-checkbox:has(:checked)").siblings("td.columna-id");
    var url = $(this).attr("href") + '?'
    if($ids.text()){
      $ids.each(function() {
        url += "id_editar=" + $(this).text();
      });
      window.location.replace(url);
    } else {
      alert("Debe seleccionar algo");
    }
  });
};

$(function(){
  UVAQ.inicializarTablaProveedores();
});




