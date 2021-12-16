<?php 
	session_start();
	if(isset($_SESSION['usuario'])){
?>

<style>
	body {
        background-color: gray;
    }
</style>

<!DOCTYPE html>
	<html>
	<head>
		<title>usuarios</title>
		<?php require_once "menu.php"; ?>
	</head>
	<body>            
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="container">
			<div id="tabelaProdutosLoad"></div>
		</div>

	</body>
	</html>
  
	<script type="text/javascript">
		$(document).ready(function(){
			$('#tabelaProdutosLoad').load('produtos/tbl_produtos.php');
		});
	</script>

<?php
}else{
	header("location:../index.php");
}
?>