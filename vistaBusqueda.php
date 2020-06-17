<?php
require_once 'includes/config.php';
require_once("includes/handlers/includedFiles.php");
use es\ucm\fdi\aw\classes\classes\user as user;

if (!es\ucm\fdi\aw\Application::getSingleton()->usuarioLogueado()) {
    header("Location: index.php");
}
?>
    <section id="contents" class="contents">
        <header>
            <form>
                <input id = "input-busqueda" placeholder = "Buscar artistas, canciones o álbumes" >
                <label onclick="buscar()" >Buscar</label>
            </form>
        </header>
        <p id='contBusqueda'>Estas en la pagina de busqueda. Haz click en buscar para encontrar canciones, artistas y albumes.</p>
    </section>

<script type="application/javascript">
    window.onpopstate = function(event) {
        document.getElementById('input-busqueda').value = event.state.busqueda;
        buscar();
    };
</script>

