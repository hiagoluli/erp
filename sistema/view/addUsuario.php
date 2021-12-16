<?php require_once "dependencias.php" ?>
<?php require_once "menu.php" ?>

<!DOCTYPE html>
<html>
	<head>
		<title>usuarios</title>
	  
	</head>
    
    <link rel="stylesheet" type="text/css" href="/css/login.css">
    <body style="background-color: gray">
        <div class="login-page">
            <div style="background-color: rgba(0, 0, 0, 0.6);" class="form">
				<h3>Cadastro de Usuarios</h3>
                <form id="frmRegistro">
                    <!--<input type="text" hidden="" id="idUsuario" name="idUsuario"/>-->
                    <input type="text" id="nome" name="nome" placeholder="Nome"/>
                    <input type="text" id="usuario" name="usuario" placeholder="Usuario"/>  
					<input type="text" id="email" name="email" placeholder="Email"/>             
                    <input type="password" id="senha" name="senha" placeholder="Senha"/>
                    <br>
                    <br>
                    <button type="button" id="registro">SALVAR</button>
                    <p class="message"></p>
                </form>            
            </div>
        </div>
    </body>
</html>

<script type="text/javascript">
		$(document).ready(function(){
			$('#tabelaUsuariosLoad').load('usuarios/tbl_usuarios.php');

			$('#registro').click(function(){

				datos=$('#frmRegistro').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procedimentos/login/registrarUsuario.php",
					success:function(r){
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