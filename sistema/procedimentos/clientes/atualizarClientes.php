<?php 


require_once "../../classes/conexao.php";
require_once "../../classes/clientes.php";


$obj = new clientes();


$dados=array(
	$_POST['idCliente'],
	$_POST['nome'],
	$_POST['endereco'],
	$_POST['numero'],
	$_POST['tipo'],
	$_POST['documento'],
	$_POST['cidade'],
	$_POST['uf'],
	$_POST['cadastro'],
	$_POST['telefone'],
	$_POST['inscricao']
);

echo $obj->atualizarCliente($dados);

 ?>