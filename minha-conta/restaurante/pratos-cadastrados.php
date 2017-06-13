<?php
  require_once "../../seguranca.php";

  protegeRestaurante();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pratos cadastrados | Sistema de avaliação de restaurantes</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.css">
  <link rel="stylesheet" href="../../dist/css/skins/skin-site.css">
  <link rel="stylesheet" href="../../dist/css/site.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <?php 
    require_once("header.php");
  ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php 
    require_once("menu.php");
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pratos cadastrados
        <small></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
      <?php
        $stmt2 = $pdo_conn->prepare("select nome, foto1, descricao, valor FROM Prato INNER JOIN Cardapio ON Cardapio.Prato_id = Prato.id WHERE Cardapio.UsuarioRestaurante_id = :id;");
        $stmt2->bindParam(":id", $_SESSION['id']);
        $stmt2->execute();
        $pratos = $stmt2->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($pratos as $prato) {
          if ($prato['foto1'] == NULL) {
            $pratoImg = "prato.png";
          } else{
            $pratoImg = $prato['foto1'];
          }
          echo "<div class=\"col-md-6\">
          <div class=\"box box-dark\">
            <div class=\"box-header with-border\">
              <h3 class=\"box-title\">Destalhes do prato</h3>
            </div>
            <div class=\"box-body\">
              <div class=\"prato\">
                <div class=\"col-md-4\">
                  <img src=\"../../images/restaurante/prato/".$pratoImg."\" class=\"img-responsive\">
                </div>
                <div class=\"col-md-8\">
                  <h3 class=\"titulo-cardapio\">".$prato['nome']."</h3>
                  <div class=\"rateYo\"></div>
                  <p>".$prato['descricao']."</p>
                  <h5 class=\"preco\">R$ ".$prato['valor']."</h5>
                </div>
              </div>
            </div>
          </div>
        </div>";
        }
      ?>
        

      </div>
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Versão 1.0
    </div>
    <!-- Default to the left -->
    Copyright &copy; 2017 <a href="http://sistemasparainter.net" target="_blank">Sistemas para Internet Senac</a> | Senac
  </footer>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<script type="text/javascript">
  $(function () {
    $('[data-toggle="popover"]').popover()
  });
</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
