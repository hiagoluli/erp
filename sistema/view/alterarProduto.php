<?php require_once "dependencias.php" ?>

<?php $id = $_POST['id']; 
    echo $id;
?>

<!DOCTYPE html>
<html>
	<head>
		<title>usuarios</title>
	  
	</head>  
    <link rel="stylesheet" type="text/css" href="/css/login.css">
    <body style="background-color: gray">

        <div class="login-page">
            <div class="form">
                <form id="frmRegistro">
                    <input type="text" hidden="" id="idProduto" name="idProduto"/>
                    <input type="text" id="nome" name="nome" placeholder="Nome"/>
                    <input type="text" id="preco" name="preco" placeholder="preco"/>  
					<input type="text" id="qtde" name="qtde" placeholder="qtde"/>
                    <br>
                    <br>
                    <button type="button" id="alterar">SALVAR</button>
                    <p class="message"></p>
                </form>            
            </div>
        </div>
    </body>
</html>

<script type="text/javascript">
    var id = <?php echo $id; ?>;  
    $.ajax({
        type:"POST",
        data:"idproduto=" + id,
        url:"../procedimentos/produtos/obterDados.php",
        success:function(r){
            dado=jQuery.parseJSON(r);

            $('#idProduto').val(dado['id']);
            $('#nome').val(dado['nome']);
            $('#preco').val(dado['preco']);
            $('#qtde').val(dado['qtde']);
        }     
    });    
		
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#alterar').click(function(){

            datos=$('#frmRegistro').serialize();
            $.ajax({
                type:"POST",
                data:datos,
                url:"../procedimentos/produtos/atualizarProduto.php",
                success:function(r){

                    if(r==1){
                        $('#tabelaProdutosLoad').load('produtos/tbl_produtos.php');
                        alertify.success("Editado com sucesso :D");
                    }else{
                        alertify.error("Não foi possível editar :(");
                    }
                }
            });
        });
    });
</script>