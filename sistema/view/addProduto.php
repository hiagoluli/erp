<?php require_once "dependencias.php" ?>
<?php require_once "menu.php" ?>


<!DOCTYPE html>
<html>
	<head>
		<title>usuarios</title>
		<link rel="stylesheet" href="css/addProduto.css">
	</head>
    
    <link rel="stylesheet" type="text/css" href="/css/login.css">
	
    <body style="background-color: gray">

        <div class="login-page">			
            <div style="background-color: rgba(0, 0, 0, 0.6);" class="form">
				<h3>Cadastro de Produtos</h3>
                <form id="frmRegistro">
                    <input type="text" id="nome" name="nome" placeholder="Descrição"/>
                    <input type="text" id="preco" name="preco" placeholder="Preço"/>  
					<input type="text" id="qtde" name="qtde" placeholder="Quantidade"/>             
                    <br>
                    <br>
                    <button type="button" id="registro">SALVAR</button>
                    <p class="message"></p>
                </form>            
            </div>
        </div>
    </body>
	


</html>

<script type="text/javascript">
		$(document).ready(function(){
			$('#tabelaProdutosLoad').load('usuarios/tbl_produtos.php');

			$('#registro').click(function(){

				datos=$('#frmRegistro').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procedimentos/produtos/inserirProdutos.php",
					success:function(r){
						if(r==1){
							$('#frmRegistro')[0].reset();
							$('#tabelaprodutosLoad').load('usuarios/tbl_produtos.php');
							alertify.success("Adicionado com sucesso");
						}else{
							alertify.error("Falha ao adicionar :(");
						}
					}
				});
			});
		});
	</script>