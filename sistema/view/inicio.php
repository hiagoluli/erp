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
		<title>Início</title>
		<?php require_once "menu.php" ?>
	</head>
	<body>
	</body>
</html>


<?php 
} else{
	header("location:../index.php");
}

 ?>
