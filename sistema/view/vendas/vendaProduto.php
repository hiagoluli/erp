<?php 

require_once "../../classes/conexao.php";
	$c= new conectar();
	$conexao=$c->conexao();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário | GN</title>
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
            top: 70%;
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

    </style>
</head>
<body>
    <div id="venda" class="box">
        <form action="">
            <fieldset>
                <legend><b>Venda</b></legend>
                <br>
                <label for="clientes" class="custom-select">Cliente:</label>
                <select name="clientes" id="clientes">
                    <option value="A">Selecionar</option>
                    <?php
                    $sql="SELECT id,nome,preco,qtde 
                    from produtos";
                    $result=mysqli_query($conexao,$sql);
                    while ($produto=mysqli_fetch_row($result)):
                        ?>
                        <option value="<?php echo $produto[0] ?>"><?php echo $produto[1]." ".$produto[2] ?></option>
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
                <br><br> 
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
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
    <br><br><br><br><br><br><br><br>
    <div id="itens" class="box">
        <form action="">
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
            </fieldset>
        </form>
    </div>
               


</body>
</html>

<script>
    var limite;
    var precounit;

    function calculaPreco(qtde) { 
        alert(qtde);
        if(qtde > limite){
            alert("Quantidade não disponivel em estoque");
        }else{
            document.getElementById('total').value = qtde * precounit;
        }
    }                      

    function update() {
        
        var select = document.getElementById('produtos');
        var value = select.options[select.selectedIndex].value;
        alert(value);

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