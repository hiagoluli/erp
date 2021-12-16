<?php 

class clientes{
	public function adicionarCliente($dados){
		$c = new conectar();
		$conexao=$c->conexao();

		$sql = "INSERT into clientes ( 	nm_nome, 
										ds_endereco, 
										nr_numero, 
										tp_cliente, 
										nr_documneto, 
										ds_cidade, 
										cd_uf, 
										dt_cadastro, 
										nr_telefone, 
										nr_inscricao) VALUES ('$dados[0]', 
										'$dados[1]', 
										'$dados[2]',
										'$dados[3]',
										'$dados[4]',
										'$dados[5]',
										'$dados[6]',
										'$dados[7]',
										'$dados[8]',
										'$dados[9]')";

		return mysqli_query($conexao, $sql);
	}

	public function obterDadosCliente($idcliente){
		$c = new conectar();
		$conexao=$c->conexao();

		$sql = "SELECT  cd_cliente,
						nm_nome, 
						ds_endereco, 
						nr_numero, 
						tp_cliente, 
						nr_documneto, 
						ds_cidade, 
						cd_uf, 
						dt_cadastro, 
						nr_telefone, 
						nr_inscricao from clientes where cd_cliente='$idcliente' ";

			$result = mysqli_query($conexao, $sql);
			$mostrar = mysqli_fetch_row($result);


			$dados = array(
				'cd_cliente' => $mostrar[0],
				'nm_nome' => $mostrar[1],
				'ds_endereco' => $mostrar[2],
				'nr_numero' => $mostrar[3],
				'tp_cliente' => $mostrar[4],
				'nr_documneto' => $mostrar[5],
				'ds_cidade' => $mostrar[6],
				'cd_uf' => $mostrar[7],
				'dt_cadastro' => $mostrar[8],
				'nr_telefone' => $mostrar[9],
				'nr_inscricao' => $mostrar[10],
			);

			return $dados;

	}


	public function atualizarCliente($dados){
		$c = new conectar();
		$conexao=$c->conexao();

		$sql = "UPDATE clientes SET nm_nome = '$dados[1]', ds_endereco = '$dados[2]',nr_numero = '$dados[3]',tp_cliente = '$dados[4]',nr_documneto = '$dados[5]',ds_cidade = '$dados[6]',cd_uf = '$dados[7]',dt_cadastro = '$dados[8]',nr_telefone = '$dados[9]',nr_inscricao = '$dados[10]' where cd_cliente = '$dados[0]'";


		echo mysqli_query($conexao, $sql);
	}

	public function excluirCliente($id){
		$c = new conectar();
		$conexao=$c->conexao();

		$sql = "DELETE from clientes where cd_cliente = '$id' ";

		return mysqli_query($conexao, $sql);
	}

}

?>