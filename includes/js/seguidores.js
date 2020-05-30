
function seguir(id,idSeguidor){
    if (document.getElementById){
        var s = document.getElementById(idSeguidor);
        if (s.innerText === 'Seguir') {
            return fetch('includes/Seguir.php', {
                method: 'POST',
                headers: {'Content-Type':'application/x-www-form-urlencoded'},
                body: 'seguir=true&id='+id+'&idSeguir='+idSeguidor
                })
                .then(function() {
                    s.innerText = 'Siguiendo';
                    s.style.color = "#FF307B";
                    s.style.backgroundColor = "floralwhite";
                })
                .catch(function(err) {
                    document.write('Fetch Error :', err);
                });
        }
        else {
            return fetch('includes/Seguir.php', {
                method: 'POST',
                headers: {'Content-Type':'application/x-www-form-urlencoded'},
                body: 'seguir=false&id='+id+'&idSeguir='+idSeguidor
            })
                .then(function() {
                    s.innerText = 'Seguir';
                    s.style.color = "floralwhite";
                    s.style.backgroundColor = "#FF307B";
                })
                .catch(function(err) {
                    document.write('Fetch Error :', err);
                });
        }
    }
}

function actualizarSeguidores(id){
    if (document.getElementById) {
        var seg = document.getElementById('seguidores');
        fetch('includes/Seguir.php', {
            method: 'POST',
            headers: {'Content-Type':'application/x-www-form-urlencoded'},
            body: 'actualizar='+id
        })
            .then(function(response) {
                response.text().then(function(text){
                    if (text === '0') seg.innerText = "Seguidores: " + text;
                    else {
                        seg.innerHTML = "<a href='vistaSeguidores.php?id=" + id + "&seg=true'>Seguidores</a>: " + text;
                    }
                });
            })
            .catch(function(err) {
                document.write('Fetch Error :', err);
            });
    }
}

function gestiona (id,idSeguidor){
    seguir(id,idSeguidor).then(function() {
        actualizarSeguidores(idSeguidor);
    });
}