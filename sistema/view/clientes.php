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
		<title>Clientes</title>
		<?php require_once "menu.php"; ?>
	</head>
	<body>            
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="container">
			<div id="tabelaClientesLoad"></div>
		</div>

	</body>
</html>
  
<script type="text/javascript">
	$(document).ready(function(){
		$('#tabelaClientesLoad').load('clientes/tbl_clientes.php');
	});
</script>

<?php
}else{
	header("location:../index.php");
}
?>