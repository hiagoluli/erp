<?php require_once "dependencias.php" ?>
<?php require_once "menu.php" ?>


<!DOCTYPE html>
<html>
	<head>
		<title>Clientes</title>
	  
	</head>
    
    <link rel="stylesheet" type="text/css" href="/css/login.css">
    <body style="background-color: gray">

        <div class="login-page">
            <div style="background-color: rgba(0, 0, 0, 0.6);" class="form">
                <h3>Cadastro de Clientes</h3>
                <form id="frmRegistro">
                    <input type="text" id="nome" name="nome" placeholder="Nome"/>
                    <input type="text" id="endereco" name="endereco" placeholder="Endereço"/>
                    <input type="text" id="numero" name="numero" placeholder="Nº"/>
                    <input type="text" id="tipo" name="tipo" placeholder="Tipo"/>
                    <input type="text" id="documento" name="documento" placeholder="Nº Documento"/>
                    <input type="text" id="cidade" name="cidade" placeholder="Cidade"/>
                    <input type="text" id="uf" name="uf" placeholder="UF"/>
                    <input type="text" id="cadastro" name="cadastro" placeholder="Nº Cadastro"/>
                    <input type="text" id="telefone" name="telefone" placeholder="Telefone"/>
                    <input type="text" id="inscricao" name="inscricao" placeholder="Nº Inscrição"/>
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
        $('#tabelaClientesLoad').load('clientes/tbl_clientes.php');

        $('#registro').click(function(){
/*
            vazios=validarFormVazio('frmRegistro');

            if(vazios > 0){
                alertify.alert("Preencha os campos!!");
                return false;
            }
*/
            datos=$('#frmRegistro').serialize();
            $.ajax({
                type:"POST",
                data:datos,
                url:"../procedimentos/clientes/adicionarClientes.php",
                success:function(r){
                    if(r==1){
                        $('#frmRegistro')[0].reset();
                        $('#tabelaClientesLoad').load('clientes/tbl_clientes.php');
                        alertify.success("Adicionado com sucesso");
                    }else{
                        alertify.error("Falha ao adicionar :(");
                    }
                }
            });
        });
    });
</script>