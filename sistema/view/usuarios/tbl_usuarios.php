<?php 
	
	require_once "../../classes/conexao.php";
    require_once "../dependencias.php";
	$c= new conectar();
	$conexao=$c->conexao();

	$sql="SELECT id,
				 nome,
				 user,
				 email
			from usuarios";
	$result=mysqli_query($conexao, $sql);

 ?>


<style>
    table, th, td {
        border: 1px solid black;
        text-align: center;
        padding:5px;
        border-collapse: collapse;
    }

    table {
        background-color: #f2f2f2;
    }

    #bt {
        width: 12%;
        background-color: #4CAF50; /* Green */
        border: none;
        border-radius: 10px;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 20px;
    }

    #bt {
    transition-duration: 0.4s;
    }

    #bt:hover {
    background-color: lightgreen; /* Green */
    color: white;
    }

    i:hover {
        font-size: 18px;
    } 

</style>
<div style="background-color:rgba(0, 0, 0, 0.6); border-radius:10px; padding:40px; margin-left: 200px; margin-right: 100px;">
    <a id="bt" href="#" type="button"  onclick="window.location.href='addUsuario.php'">Adicionar</a>

    <table id="tabela" style="text-align: center; border: 1px solid black; width: 100%;">
        <br>
        <br>
        <tr>
            <td style="font-weight: bold;">Nome</td>
            <td style="font-weight: bold;">Usuário</td>
            <td style="font-weight: bold;">Email</td>
            <td style="font-weight: bold;">Editar</td>
            <td style="font-weight: bold;">Excluir</td>
        </tr>

        <?php while($mostrar = mysqli_fetch_row($result)): ?>

        <tr>
            <td><?php echo $mostrar[1]; ?></td>
            <td><?php echo $mostrar[2]; ?></td>
            <td><?php echo $mostrar[3]; ?></td>
            <td>
                <form method="post" action="alterarUsuario.php">
                    <input type="hidden" name="id" value="<?php echo $mostrar[0]; ?>">
                    <button style="margin-top:12px; font-size:17px; border:none; background-color: transparent" type="submit"><i style="color: orange; size:9x" class="fas fa-edit"></i></button>
                </form>  		
            </td>
            <td>
                <a onclick="eliminarUsuario('<?php echo $mostrar[0]; ?>')"><i style="color: red; size: 9x" class="fas fa-trash-alt"></i></a>			
            </td>
        </tr>

    <?php endwhile; ?>
    </table>
</div>

<script type="text/javascript">
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

