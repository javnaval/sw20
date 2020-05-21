
function solicitar(id){
    if (document.getElementById){
        var s = document.getElementById(id);
        if (s.innerText === 'Solicitar Verificacion') {
            return fetch('includes/Solicitar.php', {
                method: 'POST',
                headers: {'Content-Type':'application/x-www-form-urlencoded'},
                body: 'solicitar=true&id='+id
                })
                .then(function() {
                    s.innerText = 'Solicitado';
                    s.style.color = "#FF307B";
                    s.style.backgroundColor = "floralwhite";
                })
                .catch(function(err) {
                    document.write('Fetch Error :', err);
                });
        }
        else {
            return fetch('includes/Solicitar.php', {
                method: 'POST',
                headers: {'Content-Type':'application/x-www-form-urlencoded'},
                body: 'solicitar=false&id='+id
            })
                .then(function() {
                    s.innerText = 'Solicitar Verificacion';
                    s.style.color = "floralwhite";
                    s.style.backgroundColor = "#FF307B";
                })
                .catch(function(err) {
                    document.write('Fetch Error :', err);
                });
        }
    }
}

function gestionaSolicitud(id){
    solicitar(id);
}