<?php 

	require_once "../../classes/conexao.php";
	require_once "../../classes/produtos.php";

	$obj= new produtos();

$dados=array(
		$_POST['idProduto'],	   
	    $_POST['nome'],
	    $_POST['preco'],
	    $_POST['qtde'],
			);

    echo $obj->atualizar($dados);

 ?>