function validacionInicioSesionYusuario(){
    var user = document.getElementById("userForm").value;
    var pass = document.getElementById("passForm").value;
    if(user =="" || pass== ""){
        alert("Debe completar ambos campos.");
        return false;
    }
    else{
        return true;
    }
}
function validacionNoticia(){
    var titulo = document.getElementById("titulo").value;
    var descripcion = document.getElementById("descripcion").value;
    var cuerpo = document.getElementById("cuerpo").value;
    var imagen = document.getElementById("foto").value;
    if(titulo==""){
        alert("Debe completar el campo titulo.");
        return false;
    }
    if(descripcion==""){
        alert("Debe completar el campo descripcion.");
        return false;
    }
    if(cuerpo==""){
        alert("Debe completar el campo cuerpo.");
        return false;
    }
    if(imagen==""){
        alert("Debe completar el campo imagen.");
        return false;
    }
    else{
        return true;
    }
}
function validacionEditNoticia(){
    var titulo = document.getElementById("titulo").value;
    var descripcion = document.getElementById("descripcion").value;
    var cuerpo = document.getElementById("cuerpo").value;
    var imagen = document.getElementById("fotosubida").value;
    if(titulo==""){
        alert("Debe completar el campo titulo.");
        return false;
    }
    if(descripcion==""){
        alert("Debe completar el campo descripcion.");
        return false;
    }
    if(cuerpo==""){
        alert("Debe completar el campo cuerpo.");
        return false;
    }
    if(imagen==""){
        alert("Debe completar el campo imagen.");
        return false;
    }
    else{
        return true;
    }
}


