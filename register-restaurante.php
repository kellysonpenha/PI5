<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Cadastre-se | Sistema de avaliação de restaurantes</title>
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
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <link rel="stylesheet" href="dist/css/site.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition register-page">
<div class="register-box">

  <div class="register-box-body">
    <div class="register-logo">
      <a href="index.php"><img src="dist/img/logo-com-texto-branco.png"></a>
    </div>
    <p class="login-box-msg">Cadastro de restaurante</p>

    <form action="" method="post">
      <div class="form-group">
        <input type="text" class="form-control input-login" placeholder="Nome do restaurante" name="nome">
      </div>
      <div class="form-group">
        <input type="email" class="form-control input-login" placeholder="Email para contato" name="email">
      </div>
      <div class="form-group">
        <input type="password" class="form-control input-login" placeholder="Senha" name="senha">
      </div>
      <div class="form-group">
        <input type="password" class="form-control input-login" placeholder="Confirma senha">
      </div>
      <div class="form-group">
        <select class="form-control input-login select2" data-tags="true" data-placeholder="Em que praça você está?" data-allow-clear="true" name="endereco">
          <option></option>
          <option value="P1">Praça 1</option>
          <option value="P2">Praça 2</option>
          <option value="P2">Praça 3</option>
        </select>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block btn-flat">Cadastrar <i class="fa fa-fw fa-save"></i></button>
      </div>
      <hr>
      <p class="text-center">Já possui um conta? <a href="login-restaurante.php">Faça login</a></p>
    </form>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/select2.full.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $(".select2").select2();

    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  require_once "db.php";
  try {   
    
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = password_hash($_POST["senha"], PASSWORD_BCRYPT);
    $endereco = $_POST["endereco"];

    $pdo_conn->beginTransaction();
        //
      $stmt = $pdo_conn->prepare("INSERT INTO LoginUsuario (email, senha, TipoUsuario_id) VALUES (:email, md5(:senha), 2)");
      $stmt->bindParam(':email', $email, PDO::PARAM_STR);
      $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
      $stmt->execute();

      $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
      $stmt->bindParam(':endereco', $endereco, PDO::PARAM_STR);
      $stmt->execute();

    $pdo_conn->commit();
               
    echo '<script>$("form").prepend("<div class=\"alert alert-success alert-dismissible\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button><h4><i class=\"icon fa fa-check\"></i> Parabéns!</h4> Usuário cadastrado com sucesso!</div>");</script>';
  } 
  catch(PDOException $e)
  {
    echo "Ocorreu um erro:" . $e->getMessage();
  }  

}

?>
</body>
</html>
