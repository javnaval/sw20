
function eliminarCancion(id){
    if (document.getElementById){
        var s = document.getElementById(id);
        return fetch('includes/EliminarCancion.php', {
            method: 'POST',
            headers: {'Content-Type':'application/x-www-form-urlencoded'},
            body: 'id='+id
            })
            .catch(function(err) {
                document.write('Fetch Error :', err);
            });
    }
}

function eliminaCancion(id){
    eliminarCancion(id);
	location.href="vistaInicio.php";
}