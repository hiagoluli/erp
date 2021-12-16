<?php 

class vendas{

    public function criarVenda($dados){
		$c= new conectar();
		$conexao=$c->conexao();

		$data=date('Y-m-d');
	
        $sql="INSERT into notas (cd_cliente,
                                 dt_emissao,
                                 vl_tot_nota)
                        values ('$dados[0]',
                                '$data',
                                '$dados[1]')";

        $nr_numero="SELECT nr_numero from notas order by nr_numero desc";

        $sql="INSERT into it_notas (nr_numero,
                                    ds_produto,
                                    qt_item,
                                    vl_unit,
                                    vl_tot_item)
                                values ('$nr_numero',
                                '$dados[2]',
                                '$dados[3]',
                                '$dados[4]'
                                '$dados[5]')";        

        return mysqli_query($conexao, $sql);
	}	
}
/*
	public function criarVenda(){
		$c= new conectar();
		$conexao=$c->conexao();

		$data=date('Y-m-d');
		$idvenda=self::criarComprovante();
		$dados=$_SESSION['tabelaComprasTemp'];
		$idusuario=$_SESSION['iduser'];
		$r=0;

		for ($i=0; $i < count($dados) ; $i++) { 
			$d=explode("||", $dados[$i]);

			$sql="INSERT into vendas (id_venda,
										id_cliente,
										id_produto,
										id_usuario,
										preco,
										quantidade,
										total_venda,
										dataCompra)
							values ('$idvenda',
									'$d[8]',
									'$d[0]',
									'$idusuario',
									'$d[3]',
									'$d[6]',
									'$d[7]',
									'$data')";

			$r=$r + $result=mysqli_query($conexao,$sql);

		}

		return $r;
	}

	public function criarComprovante(){
		$c= new conectar();
		$conexao=$c->conexao();

		$sql="SELECT id_venda from vendas group by id_venda desc";

		$resul=mysqli_query($conexao,$sql);
		$id=mysqli_fetch_row($resul)[0];

		if($id=="" or $id==null or $id==0){
			return 1;
		}else{
			return $id + 1;
		}
	}
	public function nomeCliente($idCliente){
		$c= new conectar();
		$conexao=$c->conexao();


		 $sql="SELECT sobrenome,nome 
			from clientes 
			where id_cliente='$idCliente'";
		$result=mysqli_query($conexao,$sql);

		$ver=mysqli_fetch_row($result);

		return $ver[1]." ".$ver[0];
	}

	public function obterTotal($idvenda){
		$c= new conectar();
		$conexao=$c->conexao();


		$sql="SELECT total_venda 
				from vendas 
				where id_venda='$idvenda'";
		$result=mysqli_query($conexao,$sql);

		$total=0;

		while($ver=mysqli_fetch_row($result)){
			$total=$total + $ver[0];
		}

		return $total;
	}
}
*/
?>