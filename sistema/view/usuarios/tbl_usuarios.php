<?php 
	
	require_once "../../classes/conexao.php";
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

    #bt {
        width: 15%;
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
        font-size: 15px;
    }

</style>
<div style="margin-left: 200px; margin-right: 100px;">

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
                <a onclick="adicionarDados('<?php echo $mostrar[0]; ?>')"><i style="color: orange; size: 9x" class="fas fa-edit"></i></a>			
            </td>
            <td>
                <a onclick="eliminarUsuario('<?php echo $mostrar[0]; ?>')"><i style="color: red; size: 9x" class="fas fa-trash-alt"></i></a>			
            </td>
        </tr>

    <?php endwhile; ?>
    </table>
</div>