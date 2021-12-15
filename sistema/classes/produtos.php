<?php 

class produtos{
	public function registroProduto($dados){
		$c = new conectar();
		$conexao=$c->conexao();

		$data = date('Y-m-d');

		$sql = "INSERT into produtos (nome, preco, qtde) VALUES ('$dados[0]', '$dados[1]', '$dados[2]')";

		return mysqli_query($conexao, $sql);
	}

    public function obterDados($idpro){

        $c = new conectar();
        $conexao=$c->conexao();

        $sql="SELECT id,
                     nome,
                     preco,
                     qtde
                from produtos 
                where id='$idpro'";
        $result=mysqli_query($conexao,$sql);

        $mostrar=mysqli_fetch_row($result);

        

        $dados=array(
                    'id' => $mostrar[0],
                    'nome' => $mostrar[1],
                    'preco' => $mostrar[2],
                    'qtde' => $mostrar[3]
                    );

        return $dados;
    }

    public function atualizar($dados){
        $c = new conectar();
        $conexao=$c->conexao();

        $sql="UPDATE produtos set nome='$dados[1]',
                                preco='$dados[2]',
                                qtde='$dados[3]'
                    where id='$dados[0]'";

                

        return mysqli_query($conexao,$sql);	
    }

    public function excluir($idpro){
        $c = new conectar();
        $conexao=$c->conexao();

        $sql="DELETE from produtos 
                where id='$idpro'";
        return mysqli_query($conexao,$sql);
    }

}
 ?>