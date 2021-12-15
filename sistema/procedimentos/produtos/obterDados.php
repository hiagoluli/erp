<?php 
	
	require_once "../../classes/conexao.php";
	require_once "../../classes/produtos.php";

	$obj= new produtos();

	$idpro=$_POST['idproduto'];

	echo json_encode($obj->obterDados($idpro));

	?>