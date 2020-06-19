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

$Editar = "";

function muestraInteraccion($id,$form){
    $html = '';
    if ($id != $_SESSION['idUser']) {
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
		if(!user::esArtista($id))
		{
			if (user::haSolicitado($id)) $html .= '<a class="activado" id="' . $id . '" onclick="gestionaSolicitud(\'' . $id . '\')" placeholder="Solicitar">Solicitado</a>';
			else $html .= '<a class="activar" id="' . $id . '" onclick="gestionaSolicitud(\'' . $id . '\')" placeholder="Solicitar">Solicitar Verificacion</a>';
		}
	}
	$html .= $form;
	return $html;
}
$Editar .= "<p onclick='AbrirCerrar()'>Editar</p>";
?>

    <section id="contents" class="contentsUsuario">
        <?php
        if (isset($_GET['id'])) {
            include 'includes/Usuario.php';
			echo muestraInteraccion(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT), $htmlform);
			if($_GET['id'] === $_SESSION['idUser']){
				echo $Editar;
			}
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
	 if(!document.getElementById('form-editar').style.display.localeCompare('flex')){
		document.getElementById('form-editar').style.display = 'none';
		document.getElementById('infor').style.display = 'block';
    	}
	 else{
		document.getElementById('form-editar').style.display = 'flex';
		document.getElementById('infor').style.display = 'none';

	 }
	}
	</script>
