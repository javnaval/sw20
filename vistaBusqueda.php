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
                <label onclick="state();buscar()" >Buscar</label>
            </form>
        </header>
        <p id='contBusqueda'>Estas en la pagina de busqueda. Haz click en buscar para encontrar canciones, artistas y albumes.</p>
    </section>

<script type="application/javascript">
    window.addEventListener('popstate', e=> {
        if (e.state !== null) {
            buscar(e.state.bus);
        }
        else{
            var encodedUrl = encodeURI('vistaBusqueda.php');
            $("#mainContent").load(encodedUrl);
        }
    });
</script>

