$(function () {
    

        $('[name=formEliminarUsu]').on("click", "#quitarUsu", comprobarBorradoUsuario);
        
    
});



function comprobarBorradoUsuario(){
	$("#comprobarIdEliUsu").hide();

    var ident = $("[name=ElimiUsu]").val();
    
    if(ident.length <= 0){
        $("#comprobarIdEliUsu").show();
    }else{

        $('[name=formEliminarUsu]').submit();
        
    }
}
