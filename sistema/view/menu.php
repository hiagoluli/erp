
<?php require_once "dependencias.php" ?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="../css/menu.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>

</head>
<body>
  <nav style="background-color:transparent;" class="social">
    <br>
    <br>
    <br>
    <ul>
      <li><a href="">HOME<i class="fa fa-home fa"></i></a></li>
      <li><a href="clientes.php">CLIENTES<i class="fa fa-user fa"></i></a></li>
      <li><a href="Pedidos.php">PEDIDOS<i class="fas fa-file-invoice-dollar"></i></a></li>
      <li><a href="produtos.php">PRODUTOS<i class="fas fa-box-open"></i></a></li>
      <li><a href="usuarios.php">USUARIOS<i class="fas fa-user-lock"></i></a></li>
    </ul>
  </nav>
</body>
</html>

<script type="text/javascript">
  $(window).scroll(function() {
    if ($(document).scrollTop() > 150) {
      $('.logo').width(100);
      $('.logo').height(60);

    }
    else {
      $('.logo').height(100);
      $('.logo').width(150);
    }
  }
  );
</script>