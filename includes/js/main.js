



function openPage(url) {
	var encodedUrl = encodeURI(url);
	$("#mainContent").load(encodedUrl);
	$("body").scrollTop(0);
	history.pushState(url, null, url);
}



function meGustaComentario(idUser,id){
	$.post("includes/ajax/MeGustaComentarios.php",{ idUser: idUser, id: id }, function() {
    });
}
function anadePlaylist(idPlaylist,idSong,i){
    $.post("includes/ajax/AnadeQuitaAPlaylist.php",{ idSong: idSong, idPlaylist: idPlaylist }, function() {
	});
    document.getElementById('navPlayList' + i).style.display = 'none';
}

function quitaPlaylist(idPlaylist,idSong){
	$.post("includes/ajax/QuitaPlaylist.php",{ idSong: idSong, idPlaylist: idPlaylist }, function() {
	});
	var encodedUrl = encodeURI('vistaPlaylist.php?id=' + idPlaylist);
	$("#mainContent").load(encodedUrl);
}

function refrescar(idCancion,idForos){
	mostrarComentarios(idCancion,idForos);
	mostrarForos(idCancion);

}
function mostrarComentarios(idCancion,idForos){
	$('#recargar').load('includes/Comentarios.php?id='+idCancion+'&idForo='+idForos);
	textComentario(idCancion,0,idForos);
}

function mostrarForos(idCancion){
	$('#foro').load('includes/Foros.php?idCancion='+idCancion);
	$('#textoForo').load('includes/nuevoForo.php?idCancion='+idCancion);
}


function textComentario(idCancion,idComentario,idForo){
	$('#textComentario').load('includes/nuevoComentario.php?idCancion='+idCancion+'&idComentario='+idComentario+'&idForo='+idForo);
}


function anadeComentario(idCancion,idComentario,idForo){
	var texto = document.getElementById("txtArea").value;
	$.post("includes/ajax/AnadeComentario.php",{ texto: texto, idCancion: idCancion, idComentario: idComentario, idForo: idForo }, function() {
		mostrarComentarios(idCancion,idForo);
    });
}



function anadeForo(idCancion){
	var titulo = document.getElementById("txtAreaForo").value;
	$.post("includes/ajax/AnadeForo.php",{ titulo: titulo, idCancion: idCancion}, function() {
		mostrarForos(idCancion);
    });
}


function mostrarPlaylist(numero){
	 var nav = 'navPlayList' + numero;
	 if(!document.getElementById(nav).style.display.localeCompare('block')){
		document.getElementById(nav).style.display = 'none';
    	}
	 else{
		document.getElementById(nav).style.display = 'block';
	 }
}

function eliminarPlaylist (id){
	return fetch('includes/Eliminar.php', {
		method: 'POST',
		headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		body: 'type=1&value=' + id
	})
		.then(function(response) {
			response.text().then(function(text){
				document.getElementById('playlists').innerHTML = text;
			});
		})
		.catch(function (err) {
			document.write('Fetch Error :', err);
		});
}

function eliminarSong (id){
	return fetch('includes/Eliminar.php', {
		method: 'POST',
		headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		body: 'type=0&value=' + id
	})
		.then(function(response) {
			response.text().then(function(text){
				document.getElementById('songs').innerHTML = text;
			});
		})
		.catch(function (err) {
			document.write('Fetch Error :', err);
		});
}

function state() {
	var bus = document.getElementById('input-busqueda').value;
	history.pushState({bus}, null, '#' + bus);
}

function buscar(bus = null) {
	if (bus == null) bus = document.getElementById('input-busqueda').value;
    return fetch('includes/Busqueda.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'busqueda=' + bus
    })
        .then(function(response) {
            response.text().then(function(text){
                var p = document.getElementById('contBusqueda');
                if (text === '') p.innerHTML = 'No hay resultado para su busqueda';
                else {
                    var parent = document.getElementById('contents');
					for(var i=parent.childNodes.length - 1; parent.childNodes[i].nodeName !== 'HEADER' && i > 0; i--) {
						parent.removeChild(parent.childNodes[i]);
					}
					document.getElementById('contents').innerHTML += text;
					document.getElementById('input-busqueda').value = bus;
                }
            });
        })
        .catch(function (err) {
            document.write('Fetch Error :', err);
        });
}

function crearPlaylist(){
	var pl = document.getElementById('tituloPlaylist').value;
	return fetch('includes/CrearPlaylist.php', {
		method: 'POST',
		headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		body: 'tituloPLaylist=' + pl
	})
		.then(function(response) {
			response.text().then(function(text){
				document.getElementById('playlists').innerHTML = text;
				oculta('crearPlaylist'); muestra('pl');
			});
		})
		.catch(function (err) {
			document.write('Fetch Error :', err);
		});
}


