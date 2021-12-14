<?php require_once "dependencias.php" ?>
<!DOCTYPE html>
<html>
	<head>
		<title>usuarios</title>
	  
	</head>
    
    <link rel="stylesheet" type="text/css" href="/css/login.css">
    <body style="background-color: gray">

        <div class="login-page">
            <div class="form">
                <form id="frmRegistro">
                    <input type="text" hidden="" id="idUsuario" name="idUsuario"/>
                    <input type="text" id="nomeU" name="nomeU" placeholder="Nome"/>
                    <input type="text" id="email" name="email" placeholder="Usuario"/>               
                    <input type="password" id="senha" name="senha" placeholder="Senha"/>
                    <br>
                    <br>
                    <button type="button" id="registro">LOGIN</button>
                    <p class="message"></p>
                </form>

                <form class="login-form">
                    <button type="button" onclick="eliminarUsuario('<?php echo $mostrar[0]; ?>')">CADASTRE-SE</button>
                </form>
            </div>
        </div>
    </body>
</html>

<script type="text/javascript">
		$(document).ready(function(){
            alert("ok1");
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