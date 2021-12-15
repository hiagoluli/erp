<?php 
    require_once "dependencias.php";
    require_once "menu.php";
    session_start();
	if(isset($_SESSION['usuario'])){

?>


<style>
    body {
        background-color: gray;
    }

    #bt1, #bt2 {
        
        background-color: #4CAF50; /* Green */
        border: none;
        border-radius: 10px;
        color: white;
        padding: 15px 45px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 20px;
    }

    #bt1, #bt2 {
    transition-duration: 0.4s;
    }

    #bt1:hover, #bt2:hover {
    background-color: lightgreen; /* Green */
    color: white;
    }
</style>

<div id="tela2"></div>

<div id="tela" style="background-color:#494e5e; border-radius:10px; padding:40px; margin-top:150px; margin-left: 200px; width: 320px;">

    <a id="bt1" href="#" type="button">Vendas</a>
    <a id="bt2" href="#" type="button">Histórico</a>
</div>

<script type="text/javascript">
		$(document).ready(function(){
			$('#bt1').click(function(){
				esconderSessaoVenda();
				$('#tela2').load('vendas/vendaProduto.php');
				$('#tela2').show();
			});
			$('#bt2').click(function(){
				esconderSessaoVenda();
				$('#vendasFeitas').load('vendas/vendasRelatorios.php');
				$('#vendasFeitas').show();
			});
		});

		function esconderSessaoVenda(){
			$('#tela').hide();
			$('#vendasFeitas').hide();
		}

	</script>

<?php 
	}else{
		header("location:../index.php");
	}
 ?>
