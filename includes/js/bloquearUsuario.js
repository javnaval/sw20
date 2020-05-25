
function bloquearUsuario(id){
    if (document.getElementById){
        var s = document.getElementById("bloqueado");
        if (s.innerText === 'Bloquear usuario') {
            return fetch('includes/BloquearUsuario.php', {
                method: 'POST',
                headers: {'Content-Type':'application/x-www-form-urlencoded'},
                body: 'bloquearUsuario=true&id='+id
                })
                .then(function() {
                    s.innerText = 'Bloqueado';
                    s.style.color = "#FF307B";
                    s.style.backgroundColor = "floralwhite";
                })
                .catch(function(err) {
                    document.write('Fetch Error :', err);
                });
        }
        else {
            return fetch('includes/BloquearUsuario.php', {
                method: 'POST',
                headers: {'Content-Type':'application/x-www-form-urlencoded'},
                body: 'bloquearUsuario=false&id='+id
            })
                .then(function() {
                    s.innerText = 'Bloquear usuario';
                    s.style.color = "floralwhite";
                    s.style.backgroundColor = "#FF307B";
                })
                .catch(function(err) {
                    document.write('Fetch Error :', err);
                });
        }
    }
}

function gestionaBloquearUsuario(id){
    bloquearUsuario(id);
}