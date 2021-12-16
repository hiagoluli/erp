<?php require_once "dependencias.php" ?>
<?php require_once "menu.php" ?>

<?php $id = $_POST['id']; 
    echo $id;
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Clientes</title>
	  
	</head>
    
    <link rel="stylesheet" type="text/css" href="/css/login.css">
    <body style="background-color: gray">

        <div class="login-page">
            <div style="background-color: rgba(0, 0, 0, 0.6);" class="form">
                <h3>Alterar Cliente</h3>
                <form id="frmRegistro">
                    <input type="text" hidden="" id="idCliente" name="idCliente"/>
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
        data:"idcliente=" + id,
        url:"../procedimentos/clientes/obterDadosCliente.php",
        success:function(r){
            dado=jQuery.parseJSON(r);

            $('#idCliente').val(dado['cd_cliente']);
            $('#nome').val(dado['nm_nome']);
            $('#endereco').val(dado['ds_endereco']);
            $('#numero').val(dado['nr_numero']);
            $('#tipo').val(dado['tp_cliente']);
            $('#documento').val(dado['nr_documneto']);
            $('#cidade').val(dado['ds_cidade']);
            $('#uf').val(dado['cd_uf']);
            $('#cadastro').val(dado['dt_cadastro']);
            $('#telefone').val(dado['nr_telefone']);
            $('#inscricao').val(dado['nr_inscricao']);
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
                url:"../procedimentos/clientes/atualizarClientes.php",
                success:function(r){

                    if(r==1){
                        $('#tabelaClientesLoad').load('clientes/tbl_clientes.php');
                        alertify.success("Editado com sucesso :D");
                    }else{
                        alertify.error("Não foi possível editar :(");
                    }
                }
            });
        });
    });
</script>