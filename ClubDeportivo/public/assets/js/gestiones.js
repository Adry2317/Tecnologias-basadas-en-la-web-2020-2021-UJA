
$(function () {
   
    $('#formInsertarMaterial').on("click", "#ConfiGestion", validarInsertar);
    $('#formInsertarPista').on("click", "#ConfiGestion2", validarInsertar2);
    $('#formUpdate').on("click", "#ir", validarId);
    $('#formEliminarMaterial').on("click", "#quitar", validarId2);
    $('#formEliminarPistas').on("click", "#quitar", validarId3);
    $('#formUpdatePistas').on("click", "#ir", validarId4);
    
});


function validarId(){
    $("#comprobarId").hide();

    var ident = $("[name=actual]").val();
    if(ident.length == 0){
        $("#comprobarId").show();
    }else{
        $('#formUpdate').submit();
    }
}


function validarId2(){
    $("#comprobarIdEli").hide();

    var ident = $("[name=Elimi]").val();
    if(ident.length == 0){
        $("#comprobarIdEli").show();
    }else{
        $('#formEliminarMaterial').submit();
    }
}
function validarId3(){
    $("#comprobarIdEliPista").hide();

    var ident = $("[name=Elimi2]").val();
    if(ident.length == 0){
        $("#comprobarIdEliPista").show();
    }else{
        $('#formEliminarPistas').submit();
    }
}
function validarId4(){
    $("#comprobarIdPistas").hide();

    var ident = $("[name=actual2]").val();
    if(ident.length == 0){
        $("#comprobarIdPistas").show();
    }else{
        $('#formUpdatePistas').submit();
    }
}

function validarInsertar(){
    $("#c1").hide();
    $("#c2").hide();
    $("#c3").hide();
    $("#c4").hide();

    var cont = 0;

    var nombre = $("[name=imputNombreInsert]").val();
    var deporte = $("[name=gridRadiosInsert]:checked").val();
    var fecha = $("[name=startInsert]").val();
    var Cantidad = $("[name=Cantidad]").val();
    var Precio = $("[name=precio]").val();

    if (nombre.length < 1) {
        cont++;
        
        $("#c1").show();
        $("#error").show();
        $("#c1").text("El campo Nombre no puede estar vacio");
    }
    if (deporte != "option1" && deporte != "option2" && deporte != "option3") {
        cont++;
       
        $("#c2").show();
        $("#error").show();
        $("#c2").text("Se debe marcar un deporte");

    }
    if (fecha.length < 9) {
        
        cont++;
        $("#c3").show();
        $("#error").show();
        $("#c3").text("La fecha debe estar rellena");
    }
    if(Cantidad<1){
        cont++;
        $("#c3").show();
        $("#error").show();
        $("#c3").text("Debe de asignar una cantidad");
    }
    if(Precio<1){
        cont++;
        $("#c4").show();
        $("#error").show();
        $("#c4").text("Debe de asignar un precio");
    }

    if(cont === 0){
        $('#formInsertarMaterial').submit();
    }
    

    
}


function validarInsertar2(){
    $("#c12").hide();
    $("#c22").hide();
    $("#c32").hide();
    $("#c42").hide();

    var cont = 0;

    var nombre = $("[name=imputNombreInsert2]").val();
    var deporte = $("[name=gridRadiosInsert2]:checked").val();
    var fecha = $("[name=startInsert2]").val();
    var Cantidad = $("[name=Cantidad2]").val();
    var Precio = $("[name=precio2]").val();

    if (nombre.length < 1) {
        cont++;
        
        $("#c12").show();
        $("#error2").show();
        $("#c12").text("El campo Nombre no puede estar vacio");
    }
    if (deporte != "option1" && deporte != "option2" && deporte != "option3") {
        cont++;
       
        $("#c22").show();
        $("#error2").show();
        $("#c22").text("Se debe marcar un deporte");

    }
    if (fecha.length < 9) {
        
        cont++;
        $("#c32").show();
        $("#error2").show();
        $("#c32").text("La fecha debe estar rellena");
    }
    if(Cantidad<1){
        cont++;
        $("#c32").show();
        $("#error2").show();
        $("#c32").text("Debe de asignar una cantidad");
    }
    if(Precio<1){
        cont++;
        $("#c42").show();
        $("#error2").show();
        $("#c42").text("Debe de asignar un precio");
    }

    if(cont === 0){
        $('#formInsertarPista').submit();
    }
    

    
}