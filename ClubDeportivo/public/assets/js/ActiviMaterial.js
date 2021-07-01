$(function () {
    $('#formApuntarseActividad').on("click", "#ApuntarseActividad", validarcampoActv);
    $('#formReservaActPist').on("click", "#ReservaMatPist", validarcampoActv2);
});


function validarcampoActv() {
    $("#comprobarIdEliActApunt").hide();

    var idActv = $("[name=idActividad]").val();

    if(idActv == 0){
        $("#comprobarIdEliActApunt").show();
    }else{
        $('#formApuntarseActividad').submit(); 
    }
}


function validarcampoActv2() {
    $("#comprobarIdEliActApunt2").hide();
    $("#comprobarIdEliActApunt3").hide();
    var cont = 0;
    var idmatr = $("[name=idMaterialPista]").val();
    var cant = $("[name=Cantidad]").val();

    if(idmatr == 0){
        cont++;
        $("#comprobarIdEliActApunt2").show();
    }
    if(cant == 0){
        cont++;
        
        $("#comprobarIdEliActApunt3").show();
    }

    if(cont === 0){
        $('#formReservaActPist').submit();
    }
}