<?php
require_once 'includes/config.php';
include("includes/handlers/includedFiles.php");
use es\ucm\fdi\aw\classes\classes\seguidor as seguidor;
use es\ucm\fdi\aw\classes\classes\user as user;

if (!es\ucm\fdi\aw\Application::getSingleton()->usuarioLogueado()) {
    header("Location: index.php");
}

$form = new es\ucm\fdi\aw\FormularioEditarPerfil();
$htmlform = $form->gestiona();


function muestraInteraccion($id,$form){
    $html = '';
    if ($id != $_SESSION['idUser']) {
        $html .= "</div>";
		if(user::esAdmin($_SESSION['idUser']))
		{
			if (user::esGestor($id) && !user::esAdmin($id)) $html .= '<a class="activado" id="' . $id . '" onclick="gestionaDarGestor(\'' . $id . '\')" placeholder="DarGestor">Es gestor</a>';
			else $html .= '<a class="activar" id="' . $id . '" onclick="gestionaDarGestor(\'' . $id . '\')" placeholder="DarGestor">Elegir como gestor</a>';
		}
		if(user::esGestor($_SESSION['idUser']))
		{
			if(!user::esGestor($id))
			{
				if (user::estaBloqueado($id)) $html .= '<a class="activado" id="bloqueado" onclick="gestionaBloquearUsuario(\'' . $id . '\')" placeholder="BloquearUsuario">Bloqueado</a>';
				else $html .= '<a class="activar" id="bloqueado" onclick="gestionaBloquearUsuario(\'' . $id . '\')" placeholder="BloquearUsuario">Bloquear usuario</a>';
			}
		}
		else
		{
			if (seguidor::siguiendo($_SESSION['idUser'], $id)) $html .= '<a class="activado" id="' . $id . '" onclick="gestiona(\'' . $_SESSION['idUser'] . '\',\'' . $id . '\')" placeholder="Seguir">Siguiendo</a>';
			else $html .= '<a class="activar" id="' . $id . '" onclick="gestiona(\'' . $_SESSION['idUser'] . '\',\'' . $id . '\')" placeholder="Seguir">Seguir</a>';
		}
   }
    else {
        if (isset($_GET['editar'])) $html .= $form;
        else $html .= '<h1><a type="button" onclick="openPage(\'vistaUsuario.php?editar=true&id='  .$_SESSION['idUser'] . '\')">Editar</a></h1>';
        $html .= "</div>";
		if(!user::esArtista($id))
		{
			if (user::haSolicitado($id)) $html .= '<a class="activado" id="' . $id . '" onclick="gestionaSolicitud(\'' . $id . '\')" placeholder="Solicitar">Solicitado</a>';
			else $html .= '<a class="activar" id="' . $id . '" onclick="gestionaSolicitud(\'' . $id . '\')" placeholder="Solicitar">Solicitar Verificacion</a>';
		}
    }
    return $html;
}
?>

    <section id="contentsUsuario" class="contentsUsuario">
        <?php
        if (isset($_GET['id'])) {
            include 'includes/Usuario.php';
            echo muestraInteraccion(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT), $htmlform);
        }
        ?>
    </section>

	<script>
	 var id = '<?php echo $_SESSION['idUser'] ?>';
	 $(document).ready(function(){
	  $("#form-editar").bind("submit",function(){
		var btnEnviar = $(document.getElementById("btnEnviar"));
		$.ajax({
			type: $(this).attr("method"),
			url: $(this).attr("action"),
			data:$(this).serialize(),
			beforeSend: function(){
				btnEnviar.val("Actualizando");
				btnEnviar.attr("disabled","disabled");
			},
			complete:function(data){
				btnEnviar.val("Actualizar");
				btnEnviar.removeAttr("disabled");
			},
			success: function(data){
				openPage('vistaUsuario.php?id='+id);
			},
			error: function(data){
				alert("Problemas al tratar de enviar el formulario");
			}
		});
		return false;
	});
});
    function AbrirCerrar(){
	 if(!document.getElementById('form-editar').style.display.localeCompare('block')){
		document.getElementById('form-editar').style.display = 'none';
    	}
	 else{
		document.getElementById('form-editar').style.display = 'block';
	 }
	}
	</script>
