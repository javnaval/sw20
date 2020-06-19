
function aprobarNoticia(idNoticia){
    $.post("includes/ajax/AprobarNoticia.php",{ idNoticia: idNoticia },function(data){
        console.log(data);
    });
}

function apruebaNoticia(id){
    aprobarNoticia(id);
	openPage("vistaNoticias.php");
}