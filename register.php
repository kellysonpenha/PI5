<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Registration Page</title>
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
    <p class="login-box-msg">Quem é você?</p>
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active btn_aluno"><a href="#aluno" data-toggle="tab">Aluno</a></li>
        <li class="btn_funcionario"><a href="#funcionario" data-toggle="tab">Funcionário</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="aluno">
          <form method="post" id="cad-aluno" action="">
            <div class="form-group">
              <input type="text" class="form-control input-login" name="nome" placeholder="Nome" required="">
            </div>
            <div class="form-group">
              <input type="text" class="form-control input-login" name="sobrenome" placeholder="Sobrenome" required="">
            </div>
            <div class="form-group">
              <input type="email" class="form-control input-login" name="email" placeholder="Email" required="">
            </div>
            <div class="form-group">
              <input type="password" class="form-control input-login" name="senha" placeholder="Senha" required="">
            </div>
            <div class="form-group">
              <input type="password" class="form-control input-login" placeholder="Confirma senha">
            </div>
            <div class="form-group">
              <select class="form-control input-login select2" data-tags="true" data-placeholder="Qual é o seu curso?" data-allow-clear="true" name="curso">
                <option></option>
                <option>Bacharelado em Ciência da Computação</option>
                <option>Bacharelado em Sistemas de Informação</option>
                <option>Engenharia de Computação</option>
                <option>Tecnologia em Análise e Desenvolvimento de Sistemas</option>
                <option>Tecnologia em Banco de Dados</option>
                <option>Tecnologia em Jogos Digitais</option>
                <option>Engenharia de Controle e Automação</option>
                <option>Tecnologia em Gestão da Tecnologia da Informação</option>
                <option>Tecnologia em Gestão da Tecnologia da Informação - semipresencial  #inscrições abertas</option>
                <option>Tecnologia em Sistemas para Internet</option>
                <option>Tecnologia em Redes de Computadores</option>
                <option>Bacharelado em Educação Física</option>
                <option>Licenciatura em Educação Física</option>
                <option>Bacharelado em Nutrição</option>
                <option>Tecnologia em Radiologia</option>
                <option>Bacharelado em Design de Moda - Estilismo</option>
                <option>Bacharelado em Design de Moda - Modelagem</option>
                <option>Engenharia Ambiental e Sanitária</option>
                <option>Engenharia Civil</option>
                <option>Engenharia de Energia</option>
                <option>Engenharia de Produção</option>
                <option>Tecnologia em Gestão Ambiental</option>
                <option>Bacharelado em Hotelaria</option>
                <option>Tecnologia em Hotelaria</option>
                <option>Bacharelado em Administração - Linha de Formação Específica em Administração de Empresas</option>
                <option>Bacharelado em Administração - Linha de Formação Específica em Comércio Exterior.</option>
                <option>Bacharelado em Ciências Contábeis</option>
                <option>Tecnologia em Gestão Financeira</option>
                <option>Tecnologia em Gestão de Recursos Humanos</option>
                <option>Tecnologia em Logística</option>
                <option>Tecnologia em Marketing</option>
                <option>Bacharelado em Relações Internacionais</option>
                <option>Tecnologia em Gestão Comercial</option>
                <option>Tecnologia em Gastronomia</option>
                <option>Bacharelado em Nutrição</option>
                <option>Tecnologia em Eventos</option>
                <option>Bacharelado em Design Digital</option>
                <option>Bacharelado em Design Gráfico</option>
                <option>Tecnologia em Produção Multimídia</option>
                <option>Bacharelado em Design Industrial</option>
                <option>Bacharelado em Audiovisual</option>
                <option>Tecnologia em Design de Animação</option>
                <option>Bacharelado em Publicidade e Propaganda</option>
                <option>Tecnologia em Produção Multimídia</option>
                <option>Bacharelado em Fotografia</option>
                <option>Tecnologia em Fotografia</option>
                <option>Tecnologia em Estética e Cosmética</option>
                <option>Bacharelado em Arquitetura e Urbanismo</option>
              </select>
            </div>
            <div class="form-group">
              <select class="form-control input-login select2" data-tags="true" data-placeholder="Em que semestre você estuda?" data-allow-clear="true" name="semestre">
                <option></option>
                <option value="1">1º Semestre</option>
                <option value="2">2º Semestre</option>
                <option value="3">3º Semestre</option>
                <option value="4">4º Semestre</option>
                <option value="5">5º Semestre</option>
                <option value="6">6º Semestre</option>
                <option value="7">7º Semestre</option>
                <option value="8">8º Semestre</option>
              </select>
            </div>
            <div class="form-group has-feedback">
              <select class="form-control input-login select2" data-tags="true" data-placeholder="Em que horário você estuda?" data-allow-clear="true" name="periodo">
                <option></option>
                <option value="M">Manhã</option>
                <option value="T">Tarde</option>
                <option value="N">Noite</option>
              </select>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block btn-flat" name="cadastrar_aluno">Cadastrar <i class="fa fa-fw fa-save"></i></button>
            </div>
            <hr>
            <p class="text-center">Já possui um conta? <a href="login.php">Faça login</a></p>
          </form> 
        </div>

        <div class="tab-pane" id="funcionario">
          <form action="" method="post">
            <div class="form-group">
              <input type="text" class="form-control input-login" name="nome" placeholder="Nome" required="">
            </div>
            <div class="form-group">
              <input type="text" class="form-control input-login" name="sobrenome" placeholder="Sobrenome" required="">
            </div>
            <div class="form-group">
              <input type="email" class="form-control input-login" name="email"  placeholder="Email" required="">
            </div>
            <div class="form-group">
              <input type="password" class="form-control input-login" name="senha" placeholder="Senha" required="">
            </div>
            <div class="form-group">
              <input type="password" class="form-control input-login" placeholder="Confirma senha">
            </div>
            <div class="form-group">
              <select class="form-control input-login select2" data-tags="true" data-placeholder="Qual é o seu cargo?" data-allow-clear="true" style="width: 100%;" name="cargo">
                <option></option>
                <option>Professor</option>
                <option>Coordenador</option>
                <option>Segurança</option>
              </select>
            </div>
            <!--<div class="form-group">
              <p>Quem que período vocês está no Senac?</p>
              <div class="form-group">
                <span>
                  <input type="checkbox" class="minimal"> Manhã 
                </span>
                <span>
                  <input type="checkbox" class="minimal"> Tarde 
                </span>
                <span>
                  <input type="checkbox" class="minimal"> Noite 
                </span>
              </div>
            </div>-->
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block btn-flat" name="cadastrar_funcionario">Cadastrar <i class="fa fa-fw fa-save"></i></button>
            </div>
            <hr>
            <p class="text-center">Já possui um conta? <a href="login.php">Faça login</a></p>
          </form>
        </div>
      </div>
    </div>
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

  if (isset($_POST['cadastrar_aluno'])) {
    try {   
      require_once "db.php";
      $email = $_POST["email"];
      $senha = $_POST["senha"];
      $nome = $_POST["nome"];
      $sobrenome = $_POST["sobrenome"];
      $curso = $_POST["curso"];
      $semestre = $_POST["semestre"];
      $periodo = $_POST["periodo"];

      $pdo_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
      $pdo_conn = $pdo_conn->prepare("INSERT INTO UsuarioAluno (nome, sobrenome, email, senha, curso, semestre, periodo, status) VALUES (:nome, :sobrenome, :email, :senha, :curso, :semestre, :periodo, 1);");
      $pdo_conn->bindParam(':nome', $nome, PDO::PARAM_STR);
      $pdo_conn->bindParam(':sobrenome', $sobrenome, PDO::PARAM_STR);
      $pdo_conn->bindParam(':email', $email, PDO::PARAM_STR);
      $pdo_conn->bindParam(':senha', $senha, PDO::PARAM_STR);
      $pdo_conn->bindParam(':curso', $curso, PDO::PARAM_STR);
      $pdo_conn->bindParam(':semestre', $semestre, PDO::PARAM_STR);
      $pdo_conn->bindParam(':periodo', $periodo, PDO::PARAM_STR);
      $pdo_conn->execute();

      //$linha = $pdo_conn->fetch(PDO::FETCH_ASSOC);
               
      echo '<script>$("#aluno").prepend("<div class=\"alert alert-success alert-dismissible\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button><h4><i class=\"icon fa fa-check\"></i> Parabéns!</h4> Usuário cadastrado com sucesso! | <a href="login.php">Faça login</a></div>");</script>';
    } 
    catch(PDOException $e)
    {
      echo "Ocorreu um erro:" . $e->getMessage();
    }
  }
  

  if (isset($_POST['cadastrar_funcionario'])) {
    try {   
      require_once "db.php";
      $nome = $_POST["nome"];
      $sobrenome = $_POST["sobrenome"];
      $email = $_POST["email"];
      $senha = $_POST["senha"];
      $cargo = $_POST["cargo"];

      
      
      $pdo_conn->beginTransaction();
        //$pdo_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo_conn = $pdo_conn->prepare("INSERT INTO LoginUsuario (email, senha, TipoUsuario_id) VALUES (:email, :senha, 2)");
        $pdo_conn->bindParam(':email', $email, PDO::PARAM_STR);
        $pdo_conn->bindParam(':senha', $senha, PDO::PARAM_STR);
        $pdo_conn->execute();

        //$pdo_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo_conn->prepare("INSERT INTO LoginUsuario (nome, sobrenome, cargo, status, Login_id) VALUES (:nome, :sobrenome, :cargo, 1, LAST_INSERT_ID())");
        $pdo_conn->bindParam(':nome', $nome, PDO::PARAM_STR);
        $pdo_conn->bindParam(':sobrenome', $sobrenome, PDO::PARAM_STR);
        $pdo_conn->bindParam(':cargo', $cargo, PDO::PARAM_STR);
        $pdo_conn->execute();

      $pdo_conn->commit();
               
      echo '<script>$("#funcionario").prepend("<div class=\"alert alert-success alert-dismissible\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button><h4><i class=\"icon fa fa-check\"></i> Parabéns!</h4> Usuário cadastrado com sucesso!</div>");$(".btn_aluno").removeClass("active");$(".btn_funcionario").addClass("active");$("#aluno").removeClass("active");$("#funcionario").addClass("active");</script>';
    } 
    catch(PDOException $e)
    {
      echo "Ocorreu um erro:" . $e->getMessage();
    }
  }

  

}

?>
</body>
</html>
