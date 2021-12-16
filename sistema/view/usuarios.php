<?php 
	session_start();
	if(isset($_SESSION['usuario'])){
?>

<style>
	body {
        background-color: gray;
    }
</style>

<!DOCTYPE html>
<html>
	<head>
		<title>usuarios</title>
		<?php require_once "menu.php"; ?>
	</head>
	<body>            
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="container">
			<div id="tabelaUsuariosLoad"></div>
		</div>

	</body>
</html>
  
<script type="text/javascript">
	$(document).ready(function(){
		$('#tabelaUsuariosLoad').load('usuarios/tbl_usuarios.php');

		$('#registro').click(function(){
			vazios=validarFormVazio('frmRegistro');

			if(vazios > 0){
				alertify.alert("Preencha os campos!!");
				return false;
			}

			datos=$('#frmRegistro').serialize();
			$.ajax({
				type:"POST",
				data:datos,
				url:"../procedimentos/login/registrarUsuario.php",
				success:function(r){
					//alert(r);

					if(r==1){
						$('#frmRegistro')[0].reset();
						$('#tabelaUsuariosLoad').load('usuarios/tbl_usuarios.php');
						alertify.success("Adicionado com sucesso");
					}else{
						alertify.error("Falha ao adicionar :(");
					}
				}
			});
		});
	});
</script>

<?php
}else{
	header("location:../index.php");
}
?>