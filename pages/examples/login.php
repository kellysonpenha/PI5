<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login | Sistema de avaliação de restaurantes</title>
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
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">

  <link rel="stylesheet" href="../../dist/css/site.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<?php
require_once "sessao.php"
?>
<div class="login-box">
  
  <!-- /.login-logo -->
  <div class="login-box-body">
    <div class="login-logo">
      <a href="../../index.php"><img src="../../dist/img/logo-com-texto-branco.png"></a>
    </div>
    <p class="login-box-msg">Olá, seja bem vindo(a)</p>

    <form method="POST">
      <div class="form-group has-feedback">
        <input type="email" id="login" class="form-control input-login" placeholder="Email" required="">
        <span class="fa fa-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" id="senha" class="form-control input-login" placeholder="Senha" required="">
        <span class="fa fa-lock form-control-feedback"></span>
      </div>
      <div class="form-group">
        <button type="button" id="enviar" class="btn btn-primary btn-flat">Entrar <i class="fa fa-fw fa-sign-in"></i></button>
		 <div id="erro" style="display:none">Login /e ou senha errado</div>
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
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
  
  

$(function () {
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
				this.response == "false" ? document.getElementById("erro").style="block" : $("form").prepend("<div class=\"alert alert-danger alert-dismissible\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button><h4><i class=\"icon fa fa-warning\"></i> Atenção!</h4> Usuário ou senha inválidos.</div>");			
			}
		}
		
	request.open("POST", url);
	request.withCredentials = true;
	request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	request.send("login=" + document.getElementById("login").value + "&senha=" + document.getElementById("senha").value); 	
}

  
  
</script>
</body>
</html>
