$(function() {
  $("a#edit-product-link").click(function(evento) {
    evento.preventDefault();
    var $columnaId = $("td.columna-checkbox:has(:checked)").first().siblings("td.columna-id").first();
    if($columnaId.text()){
      var url = $(this).attr("href") + "?id=" + $columnaId.text();
      window.location.replace(url);
    } else {
      alert("Debe seleccionar algo");
    }
  });
  
  $("a#delete-product-link").click(function(evento) {
    evento.preventDefault();
    var $ids = $("td.columna-checkbox:has(:checked)").siblings("td.columna-id");
    var url = $(this).attr("href") + '?'
    if($ids.text()){
      $ids.each(function() {
        url += "id=" + $(this).text();
      });
      window.location.replace(url);
    } else {
      alert("Debe seleccionar algo");
    }
  });
});

