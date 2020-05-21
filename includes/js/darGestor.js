
function darGestor(id){
    if (document.getElementById){
        var s = document.getElementById(id);
        if (s.innerText === 'Elegir como gestor') {
            return fetch('includes/DarGestor.php', {
                method: 'POST',
                headers: {'Content-Type':'application/x-www-form-urlencoded'},
                body: 'darGestor=true&id='+id
                })
                .then(function() {
                    s.innerText = 'Es gestor';
                    s.style.color = "#FF307B";
                    s.style.backgroundColor = "floralwhite";
                })
                .catch(function(err) {
                    document.write('Fetch Error :', err);
                });
        }
        else {
            return fetch('includes/DarGestor.php', {
                method: 'POST',
                headers: {'Content-Type':'application/x-www-form-urlencoded'},
                body: 'darGestor=false&id='+id
            })
                .then(function() {
                    s.innerText = 'Elegir como gestor';
                    s.style.color = "floralwhite";
                    s.style.backgroundColor = "#FF307B";
                })
                .catch(function(err) {
                    document.write('Fetch Error :', err);
                });
        }
    }
}

function gestionaDarGestor(id){
    darGestor(id);
}