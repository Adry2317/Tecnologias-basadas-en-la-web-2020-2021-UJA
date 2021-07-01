$(function () {
    $("#profileConfig").on("click", "#actualiza", validarCampo);
    
});


function validarCampo() {
    
    $("#c13").hide();
    $("#c23").hide();
    $("#c33").hide();
    $("#c43").hide();
    $("#c53").hide();
    $("#c63").hide();


    var cont = 0;
    
    var apellidos = $("[name=Apellidos]").val();
    var telefono = $("[name=Telefono]").val();
    var metodoPago = $("[name=MetodoPago]").val();
    var nombre = $("[name=Nombre]").val();
    var NewPasswordConfirm = $("[name=NewPasswordConfirm]").val();
    var NewPassword = $("[name=NewPassword]").val();


    if(nombre.length<4 || nombre.length>30) {
        cont++;
        $("#c13").show();
        $("#errorPerfil").show();
        $("#c13").text("El campo nombre debe estar entre 4 y 30 caracteres");
    }

    if(apellidos.length<4 || apellidos.length>30) {
        cont++;
        $("#c23").show();
        $("#errorPerfil").show();
        $("#c23").text("El campo Apellido debe estar entre 4 y 30 caracteres");
    }

    if(!validarSoloNumerosTel(telefono)) {
        cont++;
        $("#c33").show();
        $("#errorPerfil").show();
        $("#c33").text("El campo teléfono debe contener 9 digitos numéricos");
    }

    if(!validarSoloNumerosPago(metodoPago)) {
        cont++;
        $("#c43").show();
        $("#errorPerfil").show();
        $("#c43").text("El campo Metodo Pago debe contener 16 digitos numéricos");
    }

    if(!validarPassword(NewPassword)) {
        cont++;
        $("#c53").show();
        $("#errorPerfil").show();
        $("#c53").text("La contraseña debe tener 8 caracteres, mayusculas, minusculas, numeros y caracteres especiales");
    }

    if(NewPassword != NewPasswordConfirm) {
        cont++;
        $("#c63").show();
        $("#errorPerfil").show();
        $("#c63").text("Las contraseñas no coinciden");
    }

    if(cont === 0){
        $("#profileConfig").submit();
    }
}

function validarSoloNumerosTel(telefono){
    if(telefono.length == 9){
        
        var numero = false;
        var cont = 0;
        for(var i = 0; i < telefono.length; i++){
            

            if(telefono.charCodeAt(i) >= 48 && telefono.charCodeAt(i) <= 57){
                numero = true;
                cont ++;
            }
        }

        if(cont == 9){
            return true;
        }else{
            return false;
        }
    }

    return false;
}

function validarSoloNumerosPago(metodoPago){
    if(metodoPago.length == 16){
        
        var numero = false;
        var cont = 0;
        for(var i = 0; i < metodoPago.length; i++){
            

            if(metodoPago.charCodeAt(i) >= 48 && metodoPago.charCodeAt(i) <= 57){
                numero = true;
                cont ++;
            }
        }

        if(cont == 16){
            return true;
        }else{
            return false;
        }
    }

    return false;
}

function validarPassword(password){
    if(password.length >= 8){
        var mayuscula = false;
        var minuscula = false;
        var numero = false;
        var caracter = false;

        for(var i = 0; i < password.length; i++){
            if(password.charCodeAt(i) >= 65 && password.charCodeAt(i) <= 90){
                mayuscula = true;

            }

            if(password.charCodeAt(i) >= 97 && password.charCodeAt(i) <= 122){
                minuscula = true;

            }

            if(password.charCodeAt(i) >= 48 && password.charCodeAt(i) <= 57){
                numero = true;

            }

            if((password.charCodeAt(i) >= 33 && password.charCodeAt(i) <= 47) || (password.charCodeAt(i) >= 58 && password.charCodeAt(i) <= 64)){
                caracter = true;
            }
        }

        if((mayuscula == true) && (minuscula == true) && (numero == true) && (caracter == true)){
            return true;
        }else{
            return false;
        }
    }

    return false;


}