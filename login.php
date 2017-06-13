<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login | Sistema de avaliação de restaurantes</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.css">
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="dist/css/site.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-box-body">
    <div class="login-logo">
      <a href="index.php"><img src="dist/img/logo-com-texto-branco.png"></a>
    </div>
    <p class="login-box-msg">Olá, seja bem vindo(a)</p>

    <form method="POST" action="">
      <div class="form-group has-feedback">
        <input type="email" id="email" name="email" class="form-control input-login" placeholder="Email" required="">
        <span class="fa fa-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" id="senha" name="senha" class="form-control input-login" placeholder="Senha" required="">
        <span class="fa fa-lock form-control-feedback"></span>
      </div>
      <div class="form-group">
        <button type="submit" id="enviar" class="btn btn-primary btn-flat">Entrar <i class="fa fa-fw fa-sign-in"></i></button>
        <div class="pull-right">
          <p class="form-control-static"><a href="#">Esqueci minha senha</a></p>
        </div>
      </div>
	 
      <hr>
      <div class="form-group text-center">
        <p>Ainda não está cadastrado?</p>
        <a href="register.php" class="btn btn-default btn-block btn-flat">Cadastre-se</a>
      </div>
    </form>
  </div>
</div>
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
 /* $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
  
var elemEnviar = document.getElementById("enviar");
elemEnviar.onclick = function(){
	var url="returnLogin.php";
	var request = new XMLHttpRequest();	
	request.onload = function(){	
		if(this.status == 200){		
      alert (this.response);
      if (this.response == "false") {
        $("form").prepend("<div class=\"alert alert-danger alert-dismissible\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button><h4><i class=\"icon fa fa-warning\"></i> Atenção!</h4> Usuário ou senha inválidos.</div>");
      }	
		}
	}
		
	request.open("POST", url);
	request.withCredentials = true;
	request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	request.send("login=" + document.getElementById("login").value + "&senha=" + document.getElementById("senha").value);
} */
</script>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  require_once "db.php";

  $email =  $_POST['email'];
  $senha =  $_POST['senha'];

  $stm = $pdo_conn->prepare("SELECT * FROM LoginUsuario where email = :email");
  $stm->bindParam(':email', $email, PDO::PARAM_STR);
  $stm->execute();
  $linha = $stm->fetch(PDO::FETCH_ASSOC);
      
  if($linha == ""){
    echo '<script>$("form").prepend("<div class=\"alert alert-danger alert-dismissible\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button><h4><i class=\"icon fa fa-warning\"></i> Atenção!</h4> Usuário ou senha inválidos.</div>");</script>'; 
  }else{
    if (password_verify($senha, $linha["senha"])) {
          
      session_start();
      $_SESSION["id"] = $linha["id"];
      $_SESSION["tipo"] = $linha["TipoUsuario_id"];

      if($linha["TipoUsuario_id"] == 1) {

        $stm2 = $pdo_conn->prepare("SELECT nome FROM UsuarioAluno where Login_id = :id");
        $stm2->bindParam(':id', $linha["id"], PDO::PARAM_STR);
        $stm2->execute();
        $linha2 = $stm2->fetch(PDO::FETCH_ASSOC);
        $_SESSION["nome"] = $linha2["nome"];
        header("location: minha-conta/aluno-funcionario");

      }elseif($linha["TipoUsuario_id"] == 2){

        $stm2 = $pdo_conn->prepare("SELECT nome FROM UsuarioFuncionario where Login_id = :id");
        $stm2->bindParam(':id', $linha["id"], PDO::PARAM_STR);
        $stm2->execute();
        $linha2 = $stm2->fetch(PDO::FETCH_ASSOC);
        $_SESSION["nome"] = $linha2["nome"];
        header("location: minha-conta/aluno-funcionario");

      }elseif($linha["TipoUsuario_id"] == 3) {

        $stm2 = $pdo_conn->prepare("SELECT nome FROM UsuarioRestaurante where Login_id = :id");
        $stm2->bindParam(':id', $linha["id"], PDO::PARAM_STR);
        $stm2->execute();
        $linha2 = $stm2->fetch(PDO::FETCH_ASSOC);
        $_SESSION["nome"] = $linha2["nome"];
        header("location: minha-conta/restaurante");

      }
      
    }else{
      echo '<script>$("form").prepend("<div class=\"alert alert-danger alert-dismissible\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button><h4><i class=\"icon fa fa-warning\"></i> Atenção!</h4> Usuário ou senha inválidos.</div>");</script>';
    }
  }
}
?>

</body>
</html>