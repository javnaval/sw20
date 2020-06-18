
function verificaArtista(id){
        return fetch('includes/Verificar.php', {
            method: 'POST',
            headers: {'Content-Type':'application/x-www-form-urlencoded'},
            body: 'id='+id
            })
            .catch(function(err) {
                document.write('Fetch Error :', err);
            });
}

function verificarArtista(id){
    verificaArtista(id);
	openPage("vistaVerificarArtistas.php");
}