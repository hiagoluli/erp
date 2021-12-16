<?php 
	session_start();
	require_once "../../classes/conexao.php";
	require_once "../../classes/vendas.php";
	$c= new conectar();
	
	$obj= new vendas();

    $dados=array(
        $_POST['nome'],
        $_POST['preco'],
        $_POST['qtde'],
    );

    $result=$obj->criarVenda($dados);

 ?>