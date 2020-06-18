
function muestra(id,required = null){
    if (document.getElementById){
        var el = document.getElementById(id);
        el.style.display = 'block';
        if (required !== null) {
            document.getElementById(required).required = true;
            document.getElementById(required).setAttribute("name", "tituloAlbum")
        }
    }
}

function oculta(id, required = null){
    if (document.getElementById){
        var el = document.getElementById(id);
        el.style.display = 'none';
        if (required !== null) {
            document.getElementById(required).required = false;
            document.getElementById(required).setAttribute("name", "tituloAlbumIgnore")
        }
    }
}