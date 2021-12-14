<?php 
session_start();
if(isset($_SESSION['usuario'])){

	?>

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
		function adicionarDados(idusuario){
			$.ajax({
				type:"POST",
				data:"idusuario=" + idusuario,
				url:"../procedimentos/usuarios/obterDados.php",
				success:function(r){
					dado=jQuery.parseJSON(r);

					$('#idUsuario').val(dado['id_usuario']);
					$('#nomeU').val(dado['nome']);
					$('#usuarioU').val(dado['usuario']);
					$('#emailU').val(dado['email']);
				}
			});
		}

		function eliminarUsuario(idusuario){
			alertify.confirm('Deseja excluir este usuario?', function(){ 
				$.ajax({
					type:"POST",
					data:"idusuario=" + idusuario,
					url:"../procedimentos/usuarios/eliminarUsuario.php",
					success:function(r){
						if(r==1){
							$('#tabelaUsuariosLoad').load('usuarios/tbl_usuarios.php');
							alertify.success("Excluido com sucesso!!");
						}else{
							alertify.error("Não excluido :(");
						}
					}
				});
			}, function(){ 
				alertify.error('Cancelado !')
			});
		}


	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#btnAtualizaUsuario').click(function(){

				datos=$('#frmRegistroU').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procecimentos/usuarios/atualizarUsuario.php",
					success:function(r){

						if(r==1){
							$('#tabelaUsuariosLoad').load('usuarios/tbl_usuarios.php');
							alertify.success("Editado com sucesso :D");
						}else{
							alertify.error("Não foi possível editar :(");
						}
					}
				});
			});
		});
	</script>

  
	<script type="text/javascript">
		$(document).ready(function(){
            //alert("ok1");
			$('#tabelaUsuariosLoad').load('usuarios/tbl_usuarios.php');

			$('#registro').click(function(){
alert("ok");
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