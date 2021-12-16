<?php require_once "dependencias.php" ?>
<?php require_once "menu.php" ?>

<?php $id = $_POST['id']; 
    echo $id;
?>

<!DOCTYPE html>
<html>
	<head>
		<title>usuarios</title>
	  
	</head>  
    <link rel="stylesheet" type="text/css" href="/css/login.css">
    <body style="background-color: gray">

        <div class="login-page">
            <div style="background-color: rgba(0, 0, 0, 0.6);" class="form">
                <h3>Alterar Usuario</h3>
                <form id="frmRegistro">
                    <input type="text" hidden="" id="idUsuario" name="idUsuario"/>
                    <input type="text" id="nome" name="nome" placeholder="Nome"/>
                    <input type="text" id="usuario" name="usuario" placeholder="Usuario"/>  
					<input type="text" id="email" name="email" placeholder="Email"/>             
                    <input type="password" id="senha" name="senha" placeholder="Senha"/>
                    <br>
                    <br>
                    <button type="button" id="alterar">SALVAR</button>
                    <p class="message"></p>
                </form>            
            </div>
        </div>
    </body>
</html>

<script type="text/javascript">
    var id = <?php echo $id; ?>;  
    $.ajax({
        type:"POST",
        data:"idusuario=" + id,
        url:"../procedimentos/usuarios/obterDados.php",
        success:function(r){
            dado=jQuery.parseJSON(r);

            $('#idUsuario').val(dado['id']);
            $('#nome').val(dado['nome']);
            $('#usuario').val(dado['user']);
            $('#email').val(dado['email']);
        }     
    });    
		
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#alterar').click(function(){

            datos=$('#frmRegistro').serialize();
            $.ajax({
                type:"POST",
                data:datos,
                url:"../procedimentos/usuarios/atualizarUsuario.php",
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