<?php 

require_once "../../classes/conexao.php";
require_once "../dependencias.php";
	$c= new conectar();
	$conexao=$c->conexao();
?>

<?php 
    
	$c= new conectar();
	$conexao=$c->conexao();

	$sql="SELECT ds_produto,
				 vl_tot_item,
                 qt_item
			from it_notas";
	$resultado=mysqli_query($conexao, $sql);

 ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendas</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-color: gray;
            /*background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));*/
        }
        #venda {
            color: white;
            position: absolute;
            top: 30%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 15px;
            border-radius: 15px;
            width: 40%;
        }

        #itens {
            color: white;
            position: absolute;
            top: 80%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 15px;
            border-radius: 15px;
            width: 70%;
        }
        
        fieldset{
            border: 3px solid dodgerblue;
        }
        legend{
            border: 1px solid dodgerblue;
            padding: 10px;
            text-align: center;
            background-color: dodgerblue;
            border-radius: 8px;
        }
        .inputBox{
            position: relative;
        }
        .inputUser{
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
        .labelInput{
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }
        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput{
            top: -20px;
            font-size: 12px;
            color: dodgerblue;
        }
        #data_nascimento{
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }
        #submit{
            background-image: linear-gradient(to right,rgb(0, 92, 197), rgb(90, 20, 220));
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #submit:hover{
            background-image: linear-gradient(to right,rgb(0, 80, 172), rgb(80, 19, 195));
        }

        #bt {
            width: 89%;
            background-color: #4CAF50; /* Green */
            border: none;
            border-radius: 10px;
            color: white;
            padding: 12px 32px;
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

    </style>
</head>
<body>
    <div id="venda" class="box">
        <form action="">
            <fieldset>
                <form id="frmVenda">
                <legend><b>Venda</b></legend>
                <br>
                <label for="clientes" class="custom-select">Cliente:</label>
                <select name="clientes" id="clientes">
                    <option value="A">Selecionar</option>
                    <?php
                    $sql="SELECT cd_cliente,nm_nome,nr_documneto
                    from clientes";
                    $result=mysqli_query($conexao,$sql);
                    while ($clientes=mysqli_fetch_row($result)):
                        ?>
                        <option value="<?php echo $clientes[0] ?>"><?php echo $clientes[1]." - CPF:".$clientes[2] ?></option>
                    <?php endwhile; ?>
                </select>
                <br>           
                <br>
                <label for="produtos" class="custom-select">Produto:</label>
                <select name="produtos" id="produtos" onChange="update()">
                    <option value="A">Selecionar</option>
                    <?php
                    $sql="SELECT id,nome,preco,qtde 
                    from produtos";
                    $result=mysqli_query($conexao,$sql);
                    while ($produto=mysqli_fetch_row($result)):
                        ?>
                        <option value="<?php echo $produto[0] ?>"><?php echo $produto[1] ?></option>
                    <?php endwhile; ?>
                </select>
                <br><br><br>
                <div class="inputBox">
                    <input type="text" name="qtde" id="qtde" class="inputUser" value="" onchange="calculaPreco(value)" required>
                    <label for="" class="labelInput">Quantidade</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="preco" id="preco" class="inputUser" required>
                    <label value="<?php echo $produto[1];?>" for="" class="labelInput">Valor Unitario</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="total" id="total" class="inputUser" required>
                    <label for="" class="labelInput">Total </label>
                </div>              
                <br><br>
                <a id="bt" href="#" type="button">Adicionar</a>
                </form>
            </fieldset>
        </form>
    </div>
    <br><br><br><br><br><br><br><br>
    <div id="itens" class="box">
            <fieldset>
                <legend><b>Itens</b></legend>
                <br>
                <table id="tabela" style="text-align: center; border: 1px solid black; width: 100%;">
                <br>
                <br>
                <tr>
                    <td style="font-weight: bold;">Produto</td>
                    <td style="font-weight: bold;">Preço</td>
                    <td style="font-weight: bold;">Qtde</td>
                    <td style="font-weight: bold;">Editar</td>
                    <td style="font-weight: bold;">Excluir</td>
                </tr>
                
                <?php while($mostrar = mysqli_fetch_row($resultado)): ?>

                <tr>
                    <td><?php echo $mostrar[0]; ?></td>
                    <td><?php echo $mostrar[1]; ?></td>
                    <td><?php echo $mostrar[2]; ?></td>
                    <td>
                        <form method="post" action="alterarProduto.php">
                            <input type="hidden" name="id">
                            <button style="margin-top:12px; font-size:17px; border:none; background-color: transparent" type="submit"><i style="color: orange; size:9x" class="fas fa-edit"></i></button>
                        </form>  		
                    </td>
                    <td>
                        <a onclick="eliminarProduto('<?php echo $mostrar[0]; ?>')"><i style="color: red; size: 9x" class="fas fa-trash-alt"></i></a>			
                    </td>
                </tr>

                <?php endwhile; ?>
            </fieldset>
    </div>
</body>
</html>

<script>
    var limite;
    var precounit;

    function calculaPreco(qtde) { 
        if(qtde > limite){
            alert("Quantidade não disponivel em estoque");
        }else{
            document.getElementById('total').value = qtde * precounit;
        }
    }                      

    function update() {
        
        var select = document.getElementById('produtos');
        var value = select.options[select.selectedIndex].value;

        $.ajax({
            type:"POST",
            data:"idproduto=" + value,
            url:"../procedimentos/produtos/obterDados.php",
            success:function(r){
                dado=jQuery.parseJSON(r);

                $('#preco').val(dado['preco']);

                limite = dado['qtde'];
                precounit = dado['preco'];
            }     
        });    
    }

</script> 

<script type="text/javascript">
	$(document).ready(function(){
        $('#bt').click(function(){

            var dados=$('#frmVenda').serialize();

            var select = document.getElementById('clientes');
            var cd_cliente = select.options[select.selectedIndex].value;

            var select = document.getElementById('produtos');
            var ds_produto = select.options[select.selectedIndex].value;

            $.ajax({
            type:"POST",
			data:dados,
            /*"cd_cliente=" + cd_cliente  "vl_tot_nota=" + $('#total').val() "ds_produto=" + ds_produto "qt_item=" + $('#qtde').val() "vl_unit=" + $('#preco').val() "vl_tot_item=" + $('#total').val(),*/
			url:"../procedimentos/vendas/criarVenda.php",
			success:function(r){
				
				if(r > 0){
					/*$('#tabelaVendasTempLoad').load("vendas/tabelaVendasTemp.php");
					$('#frmVendasProdutos')[0].reset();*/
					alertify.alert("Venda Criada com Sucesso!");
				}else if(r==0){
					alertify.alert("Não possui lista de Vendas");
				}else{
					alertify.error("Venda não efetuada");
				}
			}
        });
		});
    });
</script>


<script type="text/javascript">
	$(document).ready(function(){

		$('#tabelaVendasTempLoad').load("vendas/tabelaVendasTemp.php");

		$('#produtoVenda').change(function(){

			$.ajax({
				type:"POST",
				data:"idproduto=" + $('#produtoVenda').val(),
				url:"../procedimentos/vendas/obterDadosProdutos.php",
				success:function(r){
					dado=jQuery.parseJSON(r);

					$('#descricaoV').val(dado['descricao']);

					$('#quantidadeV').val(dado['quantidade']);
					$('#precoV').val(dado['preco']);
					
					$('#imgProduto').prepend('<img class="img-thumbnail" id="imgp" src="' + dado['url'] + '" />');
					
				}
			});
		});

		$('#btnAddVenda').click(function(){
			vazios=validarFormVazio('frmVendasProdutos');

			quant = 0;
			quantidade = 0;

			quant = $('#quantV').val();
			quantidade = $('#quantidadeV').val();



			if(quant > quantidade){
				alertify.alert("Quantidade inexistente em estoque!!");
				quant = $('#quantV').val("");
				return false;
			}else{
				quantidade = $('#quantidadeV').val();
			}

			if(vazios > 0){
				alertify.alert("Preencha os Campos!!");
				return false;
			}

			dados=$('#frmVendasProdutos').serialize();
			$.ajax({
				type:"POST",
				data:dados,
				url:"../procedimentos/vendas/adicionarProdutoTemp.php",
				success:function(r){
					$('#tabelaVendasTempLoad').load("vendas/tabelaVendasTemp.php");
				}
			});
		});

		$('#btnLimparVendas').click(function(){

		$.ajax({
			url:"../procedimentos/vendas/limparTemp.php",
			success:function(r){
				$('#tabelaVendasTempLoad').load("vendas/tabelaVendasTemp.php");
			}
		});
	});

	});
</script>

<script type="text/javascript">

	function editarP(dados){
		
		$.ajax({
			type:"POST",
			data:"dados=" + dados,
			url:"../procedimentos/vendas/editarEstoque.php",
			success:function(r){
				
				$('#tabelaVendasTempLoad').load("vendas/tabelaVendasTemp.php");
				alertify.success("Estoque Atualizado com Sucesso!!");
			}
		});
	}


	function fecharP(index){
		$.ajax({
			type:"POST",
			data:"ind=" + index,
			url:"../procedimentos/vendas/fecharProduto.php",
			success:function(r){
				$('#tabelaVendasTempLoad').load("vendas/tabelaVendasTemp.php");
				alertify.success("Produto Removido com Sucesso!!");
			}
		});
	}

	function criarVenda(){
		$.ajax({
			url:"../procedimentos/vendas/criarVenda.php",
			success:function(r){
				
				if(r > 0){
					$('#tabelaVendasTempLoad').load("vendas/tabelaVendasTemp.php");
					$('#frmVendasProdutos')[0].reset();
					alertify.alert("Venda Criada com Sucesso!");
				}else if(r==0){
					alertify.alert("Não possui lista de Vendas");
				}else{
					alertify.error("Venda não efetuada");
				}
			}
		});
	}
</script>