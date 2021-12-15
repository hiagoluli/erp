<?php 

	require_once "../../classes/conexao.php";
	require_once "../../classes/usuarios.php";

	$obj= new usuarios;

	$dados=array(
			$_POST['idUsuario'],  
		    $_POST['nome'] , 
		    $_POST['usuario'],  
		    $_POST['email']
				);  
	echo $obj->atualizar($dados);


 ?>