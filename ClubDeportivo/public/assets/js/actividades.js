


$(function () {
    

        $('#formIdact').on("click", "#irActv", validarIdModi);
        $('[name=formAct]').on("click","#Confirmar",validarCamposActividades);
        $('[name=formAct]').on("click","#Cancelar",validarCamposActividades);   
        $('[name=formActinse]').on("click", "#Confi", validarCamposInsercion);
        $('[name=formEliminar]').on("click","#quitar",eliminar);
    
});


function cancel(){
    var pag = "/pages/logAdminActividades";
    location.href = pag;
}

function eliminar(){
    $("#comprobarIdEli").hide();

    var ident = $("[name=Elimi]").val();
    
    if(ident.length <= 0){
        $("#comprobarIdEli").show();
    }else{
        $('[name=formEliminar]').submit();
    }
    
}

function validarIdModi(){
    $("#comprobarId").hide();
    
    var ident = $("[name=actualAct]").val();
    if(ident.length <= 0 ){
        $("#comprobarIdAct").show();
    }else{
        $('#formIdact').submit();
        
        
            
        
    }
}

function validarCamposActividades() {
    
    $("#c1").hide();
    $("#c2").hide();
    $("#c3").hide();
    $("#c4").hide();
    

    
    var cont = 0;
    var id = $("[name=ident]").val();
    
    var nombre = $("[name=imputNombre]").val();
    
    var deporte = $("[name=gridRadios]:checked").val();
    
    var fecha = $("[name=start]").val();
    
    var horaini = $("[name=horaini]").val();
    
    var horafin = $("[name=horafin]").val();
    
    var plazas = $("[name=plazas]").val();
    
    
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

    if (horaini < 5 || horafin < 5) {
        
        cont++;
        $("#c4").show();
        $("#error").show();
        $("#c4").text("Las horas no son correctas");
    }

    if(plazas < 0){
        
        cont++;
        $("#c5").show();
        $("#error").show();
        $("#c5").text("Numero de plazas invalido");
    }


    if(cont === 0){
        
         $('[name=formAct]').submit();

    }
    
}


function validarCamposInsercion() {
    
    $("#c1").hide();
    $("#c2").hide();
    $("#c3").hide();
    $("#c4").hide();
    

    
    var cont = 0;
    var id = $("[name=identInsert]").val();
    
    var nombre = $("[name=imputNombreInsert]").val();
    
    var deporte = $("[name=gridRadiosInsert]:checked").val();
    
    var fecha = $("[name=startInsert]").val();
    
    var horaini = $("[name=horainiInsert]").val();
    
    var horafin = $("[name=horafinInsert]").val();
    
    var plazas = $("[name=plazasInsert]").val();
    
    
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

    if (horaini < 5 || horafin < 5) {
        
        cont++;
        $("#c4").show();
        $("#error").show();
        $("#c4").text("Las horas no son correctas");
    }

    if(plazas < 0){
        
        cont++;
        $("#c5").show();
        $("#error").show();
        $("#c5").text("Numero de plazas invalido");
    }


    if(cont === 0){
        
         $('[name=formActinse]').submit();
         
    }
    
}