$(function () {
   
    $('#formRegistro').on("click", "#registrarse", validarCamposRegistro);
    $('#formLogin').on("click", "#loginButton", validarCamposLogin);
});


function validarCamposRegistro() {

    $("#comp1").hide();
    $("#comp2").hide();
    $("#comp3").hide();
    $("#comp4").hide();
    $("#comp5").hide();
    $("#comp6").hide();

    
    var cont = 0;
    var email = $("[name=Email]").val();
    var user = $("[name=username]").val();
    var dni = $("[name=DNI]").val();
    var password = $("[name=password]").val();
    var confirm_password = $("[name=confirm_password]").val();

    
    if (email.length < 10 || email.length > 50) {
        cont++;
        $("#comp1").show();
        $("#errores").show();
        $("#comp1").text("El campo email debe estar entre 10 y 50 caracteres");
    }
    if (user.length < 5 || user.length > 25) {
        cont++;
        $("#comp2").show();
        $("#errores").show();
        $("#comp2").text("El campo Usuario debe estar entre 5 y 25 caracteres");

    }

    //if (password.length < 7 || password.length > 50) {
    //    cont++;
    //    $("#comp3").show();
    //    $("#errores").show();
    //    $("#comp3").text("El campo Contraseña debe estar entre 7 y 50 caracteres");
    //}

    if (!validarPassword(password)) {
        cont++;
        $("#comp3").show();
        $("#errores").show();
        $("#comp3").text("La contraseña debe tener 8 caracteres, mayusculas, minusculas, numeros y caracteres especiales");
    }

    if (password != confirm_password) {
        cont++;
        $("#comp4").show();
        $("#errores").show();
        $("#comp4").text("Las contraseñas no coinciden");
    }

    if(!$("#cbox1").prop("checked")){
        cont++;
        $("#comp5").show();
        $("#errores").show();
        $("#comp5").text("Debes aceptar los términos y condiciones de uso");
    }

    if(dni.length != 9){
        cont++;
        $("#comp6").show();
        $("#errores").show();
        $("#comp6").text("El DNI debe de contener 9 caracteres");
    }else{
        if(validateDNI(dni) == false){
            cont++;
            $("#comp6").show();
            $("#errores").show();
            $("#comp6").text("El dni es incorrecto");
        }
    }


    if(cont === 0){
        $('#formRegistro').submit();
    }
    
}


function validateDNI(dni) {
    var numero, letr, letra;
    //Empieza o no por xyz (extranjeros) seguido de 5 a 8 digitos y una letra de A a la Z
    var expresion_regular_dni = /^\d{5,8}[A-Z]$/;

    dni = dni.toUpperCase();

    if(expresion_regular_dni.test(dni) === true){//se comprueba que cumpla
        numero = dni.substr(0,dni.length-1);//Se coge la subcadena del numero
        letr = dni.substr(dni.length-1, 1);//Se coge la letra
        numero = numero % 23;//Se hace modulo 23 para calcular la letra
        letra = 'TRWAGMYFPDXBNJZSQVHLCKET';//Se tienen las laetras posibles que se calculan en este orden
        letra = letra.substring(numero, numero+1);//Se coge la subcadena del resto
        if (letra != letr.toUpperCase()) {
            //Letra no corresponde
            return false;
        }else{
            //Correcto
            return true;
        }
    }else{
        //Formato no válido;
        return false;
    }
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

function validarCamposLogin() {
    var cont = 0;
    var email = $("[name=Email]").val();
    var password = $("[name=password]").val();

    if (email.length < 10 || email.length > 50) {
        cont++;
        $("#comp1").show();
        $("#errores").show();
        $("#comp1").text("El campo email debe estar entre 10 y 50 caracteres");
    }

    if (password.length < 8 || password.length > 50) {
        cont++;
        $("#comp3").show();
        $("#errores").show();
        $("#comp3").text("El campo Contraseña debe estar entre 8 y 50 caracteres");
    }

    if(cont === 0){
        $("#formLogin").submit();
    }

}

    

