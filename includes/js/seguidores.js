
function seguir(id,idSeguidor){
    if (document.getElementById){
        var s = document.getElementById(idSeguidor);
        if (s.innerText === 'Seguir') {
            fetch('includes/Seguir.php', {
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
            fetch('includes/Seguir.php', {
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