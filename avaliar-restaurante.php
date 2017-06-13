<?php

require_once('seguranca.php');

protegeAlunoFunionario();

if (!isset($_GET['id'])) {
    header("location: index.php");
}else{
  if (!preg_match("/^[0-9]+$/", $_GET['id'])) {
    header("location: index.php");
  }else{
    $idRestaurante = $_GET['id'];
  }
}

      $escriptjs = "";

      if (isset($_POST['limpeza'])) {
        $nota = $_POST['limpeza'];
        try {
          $stmt4 = $pdo_conn->prepare("SELECT * FROM Avaliacao WHERE LoginUsuario_id = :idUsuario AND UsuarioRestaurante_id = :idRestaurante AND tipoNota_id = 1;");
          $stmt4->bindParam(":idUsuario", $_SESSION['id']);
          $stmt4->bindParam(":idRestaurante", $idRestaurante);
          $stmt4->execute();
          $Avs = $stmt4->fetchAll(PDO::FETCH_ASSOC);

          if (count($Avs) > 0) {
            $stmt5 = $pdo_conn->prepare("UPDATE Avaliacao SET valorNota = :nota WHERE id = :idNota;");
            $stmt5->bindParam(":nota", $nota);
            $stmt5->bindParam(":idNota", $Avs[0]['id']);
            $stmt5->execute();

            $escriptjs = "<script>
                  $(\"#msg_avaliacao\").prepend(\"<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Sucesso!</h4>Avaliação atualizada com sucesso!</div>\");
                </script>";
          }else{
            $tipo = 1;
            $stmt5 = $pdo_conn->prepare("INSERT INTO Avaliacao (valorNota, tipoNota_id, LoginUsuario_id, UsuarioRestaurante_id) VALUES (:valorNota, :tipoNota_id, :LoginUsuario_id, :UsuarioRestaurante_id);");
            $stmt5->bindParam(":valorNota", $nota);
            $stmt5->bindParam(":tipoNota_id", $tipo);
            $stmt5->bindParam(":LoginUsuario_id", $_SESSION['id']);
            $stmt5->bindParam(":UsuarioRestaurante_id", $idRestaurante);
            $stmt5->execute();

            $escriptjs = "<script>
                  $(\"#msg_avaliacao\").prepend(\"<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Sucesso!</h4>Avaliação realizada com sucesso!</div>\");
                </script>";
          }

        }catch (Exception $e){
          $escriptjs = "<script>
            $(\"#msg_avaliacao\").prepend(\"<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-ban'></i> Erro!</h4>Ocorreu um erro inesperado, por favor tente novamente mais tarde.</div>\");
          </script>";

        }
    }

    if (isset($_POST['tempo'])) {
        $nota = $_POST['tempo'];
        try {
          $stmt4 = $pdo_conn->prepare("SELECT * FROM Avaliacao WHERE LoginUsuario_id = :idUsuario AND UsuarioRestaurante_id = :idRestaurante AND tipoNota_id = 5;");
          $stmt4->bindParam(":idUsuario", $_SESSION['id']);
          $stmt4->bindParam(":idRestaurante", $idRestaurante);
          $stmt4->execute();
          $Avs = $stmt4->fetchAll(PDO::FETCH_ASSOC);

          if (count($Avs) > 0) {
            $stmt5 = $pdo_conn->prepare("UPDATE Avaliacao SET valorNota = :nota WHERE id = :idNota;");
            $stmt5->bindParam(":nota", $nota);
            $stmt5->bindParam(":idNota", $Avs[0]['id']);
            $stmt5->execute();

            $escriptjs = "<script>
                  $(\"#msg_avaliacao\").prepend(\"<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Sucesso!</h4>Avaliação atualizada com sucesso!</div>\");
                </script>";
          }else{
            $tipo = 5;
            $stmt5 = $pdo_conn->prepare("INSERT INTO Avaliacao (valorNota, tipoNota_id, LoginUsuario_id, UsuarioRestaurante_id) VALUES (:valorNota, :tipoNota_id, :LoginUsuario_id, :UsuarioRestaurante_id);");
            $stmt5->bindParam(":valorNota", $nota);
            $stmt5->bindParam(":tipoNota_id", $tipo);
            $stmt5->bindParam(":LoginUsuario_id", $_SESSION['id']);
            $stmt5->bindParam(":UsuarioRestaurante_id", $idRestaurante);
            $stmt5->execute();

            $escriptjs = "<script>
                  $(\"#msg_avaliacao\").prepend(\"<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Sucesso!</h4>Avaliação realizada com sucesso!</div>\");
                </script>";
          }

        }catch (Exception $e){
          $escriptjs = "<script>
            $(\"#msg_avaliacao\").prepend(\"<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-ban'></i> Erro!</h4>Ocorreu um erro inesperado, por favor tente novamente mais tarde.</div>\");
          </script>";

        }
    }

    if (isset($_POST['valor'])) {
        $nota = $_POST['valor'];
        try {
          $stmt4 = $pdo_conn->prepare("SELECT * FROM Avaliacao WHERE LoginUsuario_id = :idUsuario AND UsuarioRestaurante_id = :idRestaurante AND tipoNota_id = 3;");
          $stmt4->bindParam(":idUsuario", $_SESSION['id']);
          $stmt4->bindParam(":idRestaurante", $idRestaurante);
          $stmt4->execute();
          $Avs = $stmt4->fetchAll(PDO::FETCH_ASSOC);

          if (count($Avs) > 0) {
            $stmt5 = $pdo_conn->prepare("UPDATE Avaliacao SET valorNota = :nota WHERE id = :idNota;");
            $stmt5->bindParam(":nota", $nota);
            $stmt5->bindParam(":idNota", $Avs[0]['id']);
            $stmt5->execute();

            $escriptjs = "<script>
                  $(\"#msg_avaliacao\").prepend(\"<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Sucesso!</h4>Avaliação atualizada com sucesso!</div>\");
                </script>";
          }else{
            $tipo = 3;
            $stmt5 = $pdo_conn->prepare("INSERT INTO Avaliacao (valorNota, tipoNota_id, LoginUsuario_id, UsuarioRestaurante_id) VALUES (:valorNota, :tipoNota_id, :LoginUsuario_id, :UsuarioRestaurante_id);");
            $stmt5->bindParam(":valorNota", $nota);
            $stmt5->bindParam(":tipoNota_id", $tipo);
            $stmt5->bindParam(":LoginUsuario_id", $_SESSION['id']);
            $stmt5->bindParam(":UsuarioRestaurante_id", $idRestaurante);
            $stmt5->execute();

            $escriptjs = "<script>
                  $(\"#msg_avaliacao\").prepend(\"<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Sucesso!</h4>Avaliação realizada com sucesso!</div>\");
                </script>";
          }

        }catch (Exception $e){
          $escriptjs = "<script>
            $(\"#msg_avaliacao\").prepend(\"<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-ban'></i> Erro!</h4>Ocorreu um erro inesperado, por favor tente novamente mais tarde.</div>\");
          </script>";

        }
    }

    if (isset($_POST['sabor'])) {
        $nota = $_POST['sabor'];
        try {
          $stmt4 = $pdo_conn->prepare("SELECT * FROM Avaliacao WHERE LoginUsuario_id = :idUsuario AND UsuarioRestaurante_id = :idRestaurante AND tipoNota_id = 2;");
          $stmt4->bindParam(":idUsuario", $_SESSION['id']);
          $stmt4->bindParam(":idRestaurante", $idRestaurante);
          $stmt4->execute();
          $Avs = $stmt4->fetchAll(PDO::FETCH_ASSOC);

          if (count($Avs) > 0) {
            $stmt5 = $pdo_conn->prepare("UPDATE Avaliacao SET valorNota = :nota WHERE id = :idNota;");
            $stmt5->bindParam(":nota", $nota);
            $stmt5->bindParam(":idNota", $Avs[0]['id']);
            $stmt5->execute();

            $escriptjs = "<script>
                  $(\"#msg_avaliacao\").prepend(\"<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Sucesso!</h4>Avaliação atualizada com sucesso!</div>\");
                </script>";
          }else{
            $tipo = 2;
            $stmt5 = $pdo_conn->prepare("INSERT INTO Avaliacao (valorNota, tipoNota_id, LoginUsuario_id, UsuarioRestaurante_id) VALUES (:valorNota, :tipoNota_id, :LoginUsuario_id, :UsuarioRestaurante_id);");
            $stmt5->bindParam(":valorNota", $nota);
            $stmt5->bindParam(":tipoNota_id", $tipo);
            $stmt5->bindParam(":LoginUsuario_id", $_SESSION['id']);
            $stmt5->bindParam(":UsuarioRestaurante_id", $idRestaurante);
            $stmt5->execute();

            $escriptjs = "<script>
                  $(\"#msg_avaliacao\").prepend(\"<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Sucesso!</h4>Avaliação realizada com sucesso!</div>\");
                </script>";
          }

        }catch (Exception $e){
          $escriptjs = "<script>
            $(\"#msg_avaliacao\").prepend(\"<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-ban'></i> Erro!</h4>Ocorreu um erro inesperado, por favor tente novamente mais tarde.</div>\");
          </script>";

        }
    }

    if (isset($_POST['qualidade'])) {
        $nota = $_POST['qualidade'];
        try {
          $stmt4 = $pdo_conn->prepare("SELECT * FROM Avaliacao WHERE LoginUsuario_id = :idUsuario AND UsuarioRestaurante_id = :idRestaurante AND tipoNota_id = 4;");
          $stmt4->bindParam(":idUsuario", $_SESSION['id']);
          $stmt4->bindParam(":idRestaurante", $idRestaurante);
          $stmt4->execute();
          $Avs = $stmt4->fetchAll(PDO::FETCH_ASSOC);

          if (count($Avs) > 0) {
            $stmt5 = $pdo_conn->prepare("UPDATE Avaliacao SET valorNota = :nota WHERE id = :idNota;");
            $stmt5->bindParam(":nota", $nota);
            $stmt5->bindParam(":idNota", $Avs[0]['id']);
            $stmt5->execute();

            $escriptjs = "<script>
                  $(\"#msg_avaliacao\").prepend(\"<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Sucesso!</h4>Avaliação atualizada com sucesso!</div>\");
                </script>";
          }else{
            $tipo = 4;
            $stmt5 = $pdo_conn->prepare("INSERT INTO Avaliacao (valorNota, tipoNota_id, LoginUsuario_id, UsuarioRestaurante_id) VALUES (:valorNota, :tipoNota_id, :LoginUsuario_id, :UsuarioRestaurante_id);");
            $stmt5->bindParam(":valorNota", $nota);
            $stmt5->bindParam(":tipoNota_id", $tipo);
            $stmt5->bindParam(":LoginUsuario_id", $_SESSION['id']);
            $stmt5->bindParam(":UsuarioRestaurante_id", $idRestaurante);
            $stmt5->execute();

            $escriptjs = "<script>
                  $(\"#msg_avaliacao\").prepend(\"<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Sucesso!</h4>Avaliação realizada com sucesso!</div>\");
                </script>";
          }

        }catch (Exception $e){
          $escriptjs = "<script>
            $(\"#msg_avaliacao\").prepend(\"<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-ban'></i> Erro!</h4>Ocorreu um erro inesperado, por favor tente novamente mais tarde.</div>\");
          </script>";

        }
    }

    if (isset($_POST['prato_id'])) {
        $prato = $_POST['prato_id'];
        $nota = $_POST['nota_prato'];
        try {
          $stmt4 = $pdo_conn->prepare("SELECT * FROM AvaliacaoPrato WHERE LoginUsuario_id = :idUsuario AND Prato_id = :idPrato AND tipoNota_id = 6;");
          $stmt4->bindParam(":idUsuario", $_SESSION['id']);
          $stmt4->bindParam(":idPrato", $prato);
          $stmt4->execute();
          $Avs = $stmt4->fetchAll(PDO::FETCH_ASSOC);

          if (count($Avs) > 0) {
            $stmt5 = $pdo_conn->prepare("UPDATE AvaliacaoPrato SET valorNota = :nota WHERE id = :idNota;");
            $stmt5->bindParam(":nota", $nota);
            $stmt5->bindParam(":idNota", $Avs[0]['id']);
            $stmt5->execute();

            $escriptjs = "<script>
                  $(\"#msg_prato\").prepend(\"<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Sucesso!</h4>Avaliação atualizada com sucesso!</div>\");
                  $('#cardapio').modal('show');
                </script>";
          }else{
            $tipo = 6;
            $stmt5 = $pdo_conn->prepare("INSERT INTO AvaliacaoPrato (valorNota, LoginUsuario_id, Prato_id, tipoNota_id) VALUES (:valorNota, :LoginUsuario_id, :Prato_id, :tipoNota_id);");
            $stmt5->bindParam(":valorNota", $nota);
            $stmt5->bindParam(":LoginUsuario_id", $_SESSION['id']);
            $stmt5->bindParam(":Prato_id", $prato);
            $stmt5->bindParam(":tipoNota_id", $tipo);
            $stmt5->execute();

            $escriptjs = "<script>
                  $(\"#msg_prato\").prepend(\"<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Sucesso!</h4>Avaliação realizada com sucesso!</div>\");
                  $('#cardapio').modal('show');
                </script>";
          }

        }catch (Exception $e){
          $escriptjs = "<script>
            $(\"#msg_prato\").prepend(\"<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-ban'></i> Erro!</h4>Ocorreu um erro inesperado, por favor tente novamente mais tarde.</div>\");
              $('#cardapio').modal('show');
          </script>";

        }
    }

$stm = $pdo_conn->prepare('SELECT * FROM estabelecimento2
INNER JOIN UsuarioRestaurante ON UsuarioRestaurante.id = estabelecimento2.id_restaurante WHERE id_restaurante = :id;');	
$stm->bindParam(':id', $idRestaurante, PDO::PARAM_INT);
$stm->execute();
$restaurante = $stm->fetchAll(PDO::FETCH_ASSOC);

if (count($restaurante) <= 0) {
  header("location: index.php");
}else{
  $restaurante = $restaurante[0];
}

if ($_SESSION['tipo'] == 1) {
  $stmt2 = $pdo_conn->prepare("SELECT * FROM UsuarioAluno WHERE Login_id = :id;");
  $stmt2->bindParam(":id", $_SESSION['id']);
  $stmt2->execute();
  $dadosUsuarios = $stmt2->fetchAll(PDO::FETCH_ASSOC);
  $dadosUsuario = $dadosUsuarios[0];
}elseif ($_SESSION['tipo'] == 2) {
  $stmt2 = $pdo_conn->prepare("SELECT * FROM UsuarioFuncionario WHERE Login_id = :id;");
  $stmt2->bindParam(":id", $_SESSION['id']);
  $stmt2->execute();
  $dadosUsuarios = $stmt2->fetchAll(PDO::FETCH_ASSOC);
  $dadosUsuario = $dadosUsuarios[0];
}


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Perfil do restaurante | Sistema de avaliação de restaurantes</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/select2.min.css">
  <!-- Rate Yo -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.css">
  <link rel="stylesheet" href="dist/css/skins/skin-site.css">
  <link rel="stylesheet" href="dist/css/site.css">

  <!-- jQuery 2.2.3 -->
  <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <!-- Rate Yo -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
</head>
<body class="body-home fixed">
<div class="wrapper">
  <header class="main-header header-default">

    <!-- Logo -->
    <a href="index.php" class="logo">
      <img src="dist/img/logo-extenso.png" class="logo-painel">
    </a>

    <nav class="navbar navbar-static-top" role="navigation">
	
      <div>
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="navbar-left">
            <form class="busca-home navbar-form">
              <div class="form-group">
                <div class="input-group">
                  <select class="form-control input-login select2" data-tags="true" data-placeholder="Buscar restaurante" data-allow-clear="true">
                    <option></option>
                    <option>Casa do pão de queijo</option>
                    <option>Rizzo</option>
                    <option>Menu.com</option>
                    <option>Nectare</option>
                    <option>Tasca</option>
                  </select>
                  <span class="input-group-btn">
                    <button class="btn btn-primary btn-flat" type="button">Buscar <i class="fa fa-search"></i></button>
                  </span>
                </div>
              </div>
            </form>
          </li>
        </ul>
      </div>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <?php
                if ($dadosUsuario['foto'] == NULL) {
                  $foto = "perfil.png";
                } else{
                  $foto = $dadosUsuario['foto'];
                }
              ?>
              <img src="images/aluno-funcionario/perfil/<?php echo $foto; ?>" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">Olá, <?php echo $_SESSION['nome']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header user-header-af">
                <img src="images/aluno-funcionario/perfil/<?php echo $foto; ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION['nome']; ?>
                  <small></small>
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sair</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <div class="box box-widget widget-user widget-perfil-restaurante">
    <div class="widget-user-header bg-default">
      <h2 class="widget-user-username"><?php echo $restaurante['Nome'] ?></h2>      
      <div class="col-md-12"><div class="limpeza " style="margin: 0 auto;"></div><?php echo $restaurante['endereco'] ?></div>
    </div>
    <div class="widget-user-image">
        <?php
          if ($restaurante['foto'] == NULL) {
            $foto = "perfil.png";
          } else{
            $foto = $restaurante['foto'];
          }
        ?>
      <img class="img-circle" src="images/restaurante/logo/<?php echo $foto; ?>" alt="User Avatar">
    </div>
  </div>
  <section class="container">
    <div class="conteudo-intro">
      <h3>Destalhes</h3>      
      <p><button class="btn btn-default btn-flat btn-lg" data-toggle="modal" data-target="#cardapio">Cardápio</button></a></p>
      
      <hr>

      <h3>Avaliações</h3>
      <div id="msg_avaliacao"></div>
      <div class="clearfix"></div>
      <div class="item">
        <div class="col-md-4"><p>Limpeza</p></div>
        <div class="col-md-8"><div id="limpeza" class="limpeza"></div></div>
        <form id="form_limpeza" method="POST" action="">
          <input type="hidden" name="limpeza" class="hidden">
        </form>
      </div>
      <div class="item">
        <div class="col-md-4"><p>Tempo de espera</p></div>
        <div class="col-md-8"><div id="tempo" class="tempodeespera"></div></div>
        <form id="form_tempo" method="POST" action="">
          <input type="hidden" name="tempo" class="hidden">
        </form>
      </div>
      <div class="item">
        <div class="col-md-4"><p>Valor</p></div>
        <div class="col-md-8"><div id="valor" class="valor"></div></div>
        <form id="form_valor" method="POST" action="">
          <input type="hidden" name="valor" class="hidden">
        </form>
      </div>
      <div class="item">
        <div class="col-md-4"><p>Sabor</p></div>
        <div class="col-md-8"><div id="sabor" class="sabor"></div></div>
        <form id="form_sabor" method="POST" action="">
          <input type="hidden" name="sabor" class="hidden">
        </form>
      </div>
      <div class="item">
        <div class="col-md-4"><p>Qualidade do atendimento</p></div>
        <div class="col-md-8"><div id="qualidade" class="qualidadeatendimento"></div></div>
        <form id="form_qualidade" method="POST" action="">
          <input type="hidden" name="qualidade" class="hidden">
        </form>
      </div>
      <div class="clearfix"></div>
      <hr>

      <h3>Comentários</h3>

      <div class="box box-widget">
        <div class="box-footer box-comments">
          <div class="box-comment">
            <img class="img-circle img-sm" src="dist/img/user3-128x128.jpg" alt="User Image">
            <div class="comment-text">
              <span class="username"> Maria Gonzales <span class="text-muted pull-right">8:03 PM Today</span></span>
                  It is a long established fact that a reader will be distracted
                  by the readable content of a page when looking at its layout.
            </div>
          </div>
          <div class="box-comment">
            <img class="img-circle img-sm" src="dist/img/user5-128x128.jpg" alt="User Image">
            <div class="comment-text">
              <span class="username">Nora Havisham<span class="text-muted pull-right">8:03 PM Today</span></span>
                  The point of using Lorem Ipsum is that it has a more-or-less
                  normal distribution of letters, as opposed to using
                  'Content here, content here', making it look like readable English.
            </div>
          </div>
        </div>
        <div class="box-footer">
          <form action="#" method="post">
            <img class="img-responsive img-circle img-sm" src="dist/img/user4-128x128.jpg" alt="Alt Text">
            <div class="img-push">
              <input type="text" class="form-control input-sm input-login" placeholder="Precione enter para publicar seu comentário">
            </div>
          </form>
        </div>
      </div>

    </div>
    
  </section>
</div>
<div>
  <div class="modal" id="cardapio">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Cardápio</h4>
        </div>
        <div class="modal-body">
          <div id="msg_prato"></div>
          <?php
            $stmt2 = $pdo_conn->prepare("SELECT * FROM CardapioV WHERE id_Restaurante  = :idRestaurante;");
            $stmt2->bindParam(":idRestaurante", $idRestaurante);
            $stmt2->execute();
            $pratos = $stmt2->fetchAll(PDO::FETCH_ASSOC);

            foreach ($pratos as $prato) {
              if ($prato['foto1'] == NULL) {
                $pratoImg = "prato.png";
              } else{
                $pratoImg = $prato['foto1'];
              }
              if ($prato['Media'] == NULL) {
                $nota = 0;
              } else{
                $nota = $prato['Media'];
              }
              echo "<div class=\"prato\">
                      <div class=\"col-md-4\">
                        <img src=\"images/restaurante/prato/".$pratoImg."\" class=\"img-responsive\">
                      </div>
                      <div class=\"col-md-8\">
                        <h3 class=\"titulo-cardapio\">".$prato['nome_prato']."</h3>
                        <div id=\"prato_".$prato['id']."\" class=\"form_prato\"></div>
                        <form method=\"POST\" action=\"\" id=\"form_prato_".$prato['id']."\">
                          <input type=\"hidden\" name=\"prato_id\" value=\"".$prato['id']."\">
                          <input type=\"hidden\" id=\"nota_prato_".$prato['id']."\" name=\"nota_prato\">
                        </form>

                        <script>$(\"#prato_".$prato['id']."\").rateYo({
                          rating: ".$nota.",
                          starWidth: \"40px\",
                          fullStar: true
                        });</script>
                        <p>".$prato['descricao']."</p>
                        <h5 class=\"preco\">R$ ".$prato['valor']."</h5>
                        
                      </div>
                    </div>
                    <div class=\"clearfix\"></div>
                    <hr>";
            }
          ?>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>
</div>

  <div class="control-sidebar-bg"></div>
</div>

<!-- REQUIRED JS SCRIPTS -->

<!-- Select2 -->
<script src="plugins/select2/select2.full.min.js"></script>

<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<script>

  <?php
    if ($restaurante['Limpeza'] == NULL) {
      $Limpeza = 0;
    } else{
      $Limpeza = $restaurante['Limpeza'];
    }

    if ($restaurante['Tempo'] == NULL) {
      $Tempo = 0;
    } else{
      $Tempo = $restaurante['Tempo'];
    }

    if ($restaurante['Preco'] == NULL) {
      $Preco = 0;
    } else{
      $Preco = $restaurante['Preco'];
    }

    if ($restaurante['Sabor'] == NULL) {
      $Sabor = 0;
    } else{
      $Sabor = $restaurante['Sabor'];
    }

    if ($restaurante['Qualidade'] == NULL) {
      $Qualidade = 0;
    } else{
      $Qualidade = $restaurante['Qualidade'];
    }
  ?>

  $(function () {
    $(".select2").select2();
  });

  $(function () {
 
    $("#limpeza").rateYo({
      rating: <?php echo $Limpeza; ?>,
      starWidth: "40px",
	  fullStar: true
    });
	
	 $("#tempo").rateYo({
      rating: <?php echo $Tempo; ?>,
      starWidth: "40px",
	  fullStar: true
    });
	
	 $("#valor").rateYo({
      rating: <?php echo $Preco; ?>,
      starWidth: "40px",
	  fullStar: true
    });
	
	 $("#sabor").rateYo({
      rating: <?php echo $Sabor; ?>,
      starWidth: "40px",
	 fullStar: true
    });
	
	 $("#qualidade").rateYo({
      rating: <?php echo $Qualidade; ?>,
      starWidth: "40px",
	  fullStar: true
    });
   
  });

  $(function () {
    $("#limpeza").rateYo().on("rateyo.set", function (e, data) {
      var rating = data.rating;
      $("[name='limpeza']").val(rating);
      $("#form_limpeza").submit();
    });
  });

  $(function () {
    $("#tempo").rateYo().on("rateyo.set", function (e, data) {
      var rating = data.rating;
      $("[name='tempo']").val(rating);
      $("#form_tempo").submit();
    });
  });

  $(function () {
    $("#valor").rateYo().on("rateyo.set", function (e, data) {
      var rating = data.rating;
      $("[name='valor']").val(rating);
      $("#form_valor").submit();
    });
  });

  $(function () {
    $("#sabor").rateYo().on("rateyo.set", function (e, data) {
      var rating = data.rating;
      $("[name='sabor']").val(rating);
      $("#form_sabor").submit();
    });
  });

  $(function () {
    $("#qualidade").rateYo().on("rateyo.set", function (e, data) {
      var rating = data.rating;
      $("[name='qualidade']").val(rating);
      $("#form_qualidade").submit();
    });
  });

  $(function () {
    $(".form_prato").rateYo().on("rateyo.set", function (e, data) {
      var rating = data.rating;
      var form =  $(this).attr("id");
      $("#nota_"+form).val(rating);
      $("#form_"+form).submit();
    });
  });
</script>

<?php
  echo $escriptjs;
?>
</body>
</html>
