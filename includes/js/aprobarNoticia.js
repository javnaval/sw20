
function aprobarNoticia(id){
        return fetch('includes/AprobarNoticia.php', {
            method: 'POST',
            headers: {'Content-Type':'application/x-www-form-urlencoded'},
            body: 'id='+id
            })
            .catch(function(err) {
                document.write('Fetch Error :', err);
            });
}

function apruebaNoticia(id){
    aprobarNoticia(id);
	openPage("vistaNoticias.php");
}