<?php
  require_once "../../seguranca.php";
  echo $_SESSION['tipo'];
  if(protegeRestaurante())

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_FILES['foto'])) {
        
        // Pasta onde o arquivo vai ser salvo
        $_UP['pasta'] = '../../images/restaurante/logo/';
        // Tamanho máximo do arquivo (em Bytes)
        $_UP['tamanho'] = 1024 * 1024 * 4; // 2Mb
        // Array com as extensões permitidas
        $_UP['extensoes'] = array('jpg', 'png', 'jpeg');
        // Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e um nome único)
        $_UP['renomeia'] = true;
        // Array com os tipos de erros de upload do PHP
        $_UP['erros'][0] = 'Não houve erro';
        $_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
        $_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
        $_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
        $_UP['erros'][4] = 'Não foi feito o upload do arquivo';
        // Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
        if ($_FILES['foto']['error'] != 0) {
          die("Não foi possível fazer o upload");
        }else{
          $extensao = explode('.', $_FILES['foto']['name']);
          $extensao = strtolower(end($extensao));
          if (array_search($extensao, $_UP['extensoes']) === false) {
            echo "<script>
                $(\"#form-foto-perfil\").append(\"<p class='text-erro-perfil'>Erro! Por favor, envie arquivos com as seguintes extensões: jpg, png ou jpeg</p>\");
              </script>";
          }elseif ($_UP['tamanho'] < $_FILES['foto']['size']) {
            echo "<script>
                $(\".form-foto-perfil\").append(\"<p class='text-erro-perfil'>Erro! O arquivo enviado é muito grande, envie arquivos de até 4MB</p>\");
              </script>";
          }else{
            // O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
            // Primeiro verifica se deve trocar o nome do arquivo
            if ($_UP['renomeia'] == true) {
              // Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
              $nome_final = md5(time()).$_SESSION['id'].'.jpg';
            } else {
              // Mantém o nome original do arquivo
              $nome_final = $_FILES['arquivo']['name'];
            }
              
            // Depois verifica se é possível mover o arquivo para a pasta escolhida
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $_UP['pasta'] . $nome_final)) {
              // Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo

              try {
                $stmt5 = $pdo_conn->prepare("UPDATE UsuarioRestaurante SET foto = :foto  WHERE Login_id = :id;");  
                $stmt5->bindParam(":id", $_SESSION['id']);
                $stmt5->bindParam(":foto", $nome_final);
                $stmt5->execute();

              }catch (Exception $e){
                echo "<script>
                  $(\"#form-foto-perfil\").append(\"<p class='text-erro-perfil'>Erro! Ocorreu um erro inesperado, por favor tente novamente mais tarde</p>\");
                </script>";
              }
            } else {
              // Não foi possível fazer o upload, provavelmente a pasta está incorreta
              echo "<script>
                  $(\"#form-foto-perfil\").append(\"<p class='text-erro-perfil'>Erro! Não foi possível enviar o arquivo, tente novamente</p>\");
                </script>";
            }
          }
          
        }
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Perfil | Sistema de avaliação de restaurantes</title>
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
        Perfil
        <small></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box box-dark">
            <div class="box-header with-border">
              <h3 class="box-title">Dados do restaurante</h3>
            </div>
            <div class="box-body">
              <form>
                <div class="col-md-12">
                  <h4>Sobre</h4>
                </div>
                <div class="form-group col-md-6">
                  <label>Nome do restaurante</label>
                  <input type="text" name="" class="form-control" placeholder="Digite seu nome restaurante" required="">
                </div>
                <div class="form-group col-md-6">
                  <label>Local</label>
                  <input type="text" name="" class="form-control" placeholder="Selecione o local" required="">
                </div>
                <div class="form-group col-md-12">
                  <button type="submit" class="btn btn-primary btn-flat ">Atualizar <i class="fa fa-fw fa-save"></i></button>
                </div>
              </form>
                <div class="clearfix"></div>
                <hr>
              <form>
                <div class="col-md-12">
                  <h4>Dados de acesso</h4>
                </div>
                <div class="form-group col-md-6">
                  <label>E-mail atual</label>
                  <input type="email" name="" class="form-control" placeholder="Digite seu e-mail" required="">
                </div>
                <div class="form-group col-md-6">
                  <label>Novo e-mail</label>
                  <input type="email" name="" class="form-control" placeholder="Digite seu e-mail" required="">
                </div>
                <div class="form-group col-md-12">
                  <button type="submit" class="btn btn-primary btn-flat ">Atualizar <i class="fa fa-fw fa-save"></i></button>
                </div>
              </form>
              <form>
                <div class="col-md-12">
                  <p>Deseja atualizar sua senha de acesso?</p>
                </div>
                <div class="form-group col-md-6">
                  <label>Senha atual</label>
                  <input type="password" name="" class="form-control" placeholder="Digite seu senha" required="">
                </div>
                <div class="form-group col-md-6">
                  <label>Nova senha</label>
                  <input type="password" name="" class="form-control" placeholder="Digite seu senha" required="">
                </div>
                <div class="form-group col-md-12">
                  <button type="submit" class="btn btn-primary btn-flat ">Atualizar <i class="fa fa-fw fa-save"></i></button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="box box-dark">
            <div class="box-header with-border">
              <h3 class="box-title">Foto de perfil</h3>
            </div>
            <div class="box-body">
              <form method="POST" action="" id="form-foto-perfil" enctype="multipart/form-data">
                <div class="col-md-4">
                  <img src="../../images/restaurante/logo/<?php echo $foto; ?>" class="img-thumbnail img-circle form-img-perfil">
                </div>
                <div class="col-md-8">
                  <p>Adicione o logo do seu restaurante para que o mesmo possa ser identificado com mais facilidade</p>
                  <div class="form-group">
                    <input type="file" id="exampleInputFile" name="foto">
                    <p class="help-block">Faça upload da sua foto de Perfil</p>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-flat ">Salvar <i class="fa fa-fw fa-save"></i></button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
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

<?php
    
?>
</body>
</html>
