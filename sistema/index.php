<?php
	require_once "classes/conexao.php";
	$obj = new conectar();
	$conexao = $obj->conexao();

	$sql = "SELECT * from usuarios where email='admin'";
	$result = mysqli_query($conexao, $sql);

	$validar = 0;
	if(mysqli_num_rows($result) > 0){
		$validar = 1;
	}

?>



<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="/css/login.css">
	<script src="lib/jquery-3.2.1.min.js"></script>
	<script src="js/funcoes.js"></script>
</head>
<body style="background-color: gray">

    <div class="login-page">
		<div class="form">
			<form id="frmLogin">
				<input type="text" id="email" name="email" placeholder="usuario"/>
				<input type="password" id="senha" name="senha" placeholder="senha"/>
				<br>
				<br>
				<button type="button" id="entrarSistema">LOGIN</button>
				<p class="message"></p>
			</form>

			<form class="login-form">
				<button type="button" onclick="window.location.href='registrar.php'">CADASTRE-SE</button>
			</form>
    	</div>
	</div>
</body>
</html>



<script type="text/javascript">
	$(document).ready(function(){
		$('#entrarSistema').click(function(){
		vazios=validarFormVazio('frmLogin');

			if(vazios > 0){
				alert("Preencha os campos!!");
				return false;
			}

		dados=$('#frmLogin').serialize();
		$.ajax({
			type:"POST",
			data:dados,
			url:"procedimentos/login/login.php",
			success:function(r){
				//alert(r);
				if(r==1){
					window.location="view/inicio.php";
				}else{
					alert("Acesso Negado!!");
				}
			}
		});
	});
	});
</script>