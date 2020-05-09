
function seguir(id,idSeguidor){
    if (document.getElementById){
        var s = document.getElementById(idSeguidor);
        if (s.innerText === 'Seguir') {
            fetch('includes/Seguir.php?id='+id+'&idSeguir='+idSeguidor)
                .catch(function(err) {
                    console.log('Fetch Error :', err);
                });
            s.innerText = 'Siguiendo';
            s.style.color = "#FF307B";
            s.style.backgroundColor = "floralwhite";
        }
        else {
            s.innerText = 'Seguir';
            s.style.color = "floralwhite";
            s.style.backgroundColor = "#FF307B";
        }
    }
}