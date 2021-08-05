
function pagina(pagina){
    $.ajax({url:"mainContentPager.php?p="+pagina, 
    success: function(result){
        $("#tabla").html(result);//recarga la seccion
    },error: function() {
    console.log("Error paginado");
}})}; 
function busqueda(pagina,busqueda){
    $.ajax({url:"pagerBusqueda.php?p="+pagina+"&busqueda="+busqueda, //Envio &busqueda para mantener los resultados en la paginacion
    success: function(result){
        $("#tabla").html(result);//recarga la seccion
    },error: function() {
    console.log("Error paginado");
}})}; 