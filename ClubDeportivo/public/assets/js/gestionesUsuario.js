$(function () {
   
    $('#formEliminarActApunt').on("click", "#quitarActApunt", validarEliminarActividad);
    $('#formEliminarMaterialApunt').on("click", "#quitarMatApunt", validarEliminarMaterial);
    
    
});


function validarEliminarActividad(){
    $("#comprobarIdEliActApunt").hide();

    var ident = $("[name=ElimiActApunt]").val();
    if(ident.length == 0){
        $("#comprobarIdEliActApunt").show();
    }else{
        $('#formEliminarActApunt').submit();
    }
}


function validarEliminarMaterial(){
    $("#comprobarIdEliMatApunt").hide();

    var ident = $("[name=ElimiMatApunt]").val();
    if(ident.length == 0){
        $("#comprobarIdEliMatApunt").show();
    }else{
        $('#formEliminarMaterialApunt').submit();
    }
}

    

    
