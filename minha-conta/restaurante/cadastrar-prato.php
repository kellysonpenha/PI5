<?php
  require_once "../../seguranca.php";

  protegeRestaurante();

    $escriptjs = "Eba";

    if(isset($_FILES['foto'])) {

        $nome =  $_POST['nome'];
        $valor =  $_POST['valor'];
        $descricao =  $_POST['descricao'];
        
        // Pasta onde o arquivo vai ser salvo
        $_UP['pasta'] = '../../images/restaurante/prato/';
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
            $escriptjs = "<script>
                $(\"#form-foto-perfil\").append(\"<p class='text-erro-perfil'>Erro! Por favor, envie arquivos com as seguintes extensões: jpg, png ou jpeg</p>\");
              </script>";
          }elseif ($_UP['tamanho'] < $_FILES['foto']['size']) {
            $escriptjs = "<script>
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
                $pdo_conn->beginTransaction();

                $stmt5 = $pdo_conn->prepare("INSERT INTO Prato (nome, foto1, descricao, valor, status) VALUES (:nome, :foto, :descricao, :valor, 1);");  
                $stmt5->bindParam(":nome", $nome);
                $stmt5->bindParam(":foto", $nome_final);
                $stmt5->bindParam(":descricao", $descricao);
                $stmt5->bindParam(":valor", $valor);
                $stmt5->execute();

                $stmt5 = $pdo_conn->prepare("INSERT INTO Cardapio (Prato_id, UsuarioRestaurante_id) VALUES (LAST_INSERT_ID(), :id);");
                $stmt5->bindParam(":id", $_SESSION['id']);
                $stmt5->execute();

                $pdo_conn->commit();

                $escriptjs = "<script>
                  $(\"#form-foto-perfil\").prepend(\"<p class='text-success'>Prato cadastrado com sucesso!</p>\");
                </script>";

              }catch (Exception $e){
                $escriptjs = "<script>
                  $(\"#form-foto-perfil\").append(\"<p class='text-erro-perfil'>Erro! Ocorreu um erro inesperado, por favor tente novamente mais tarde</p>\");
                </script>";
              }
            } else {
              // Não foi possível fazer o upload, provavelmente a pasta está incorreta
              $escriptjs = "<script>
                  $(\"#form-foto-perfil\").append(\"<p class='text-erro-perfil'>Erro! Não foi possível enviar o arquivo, tente novamente</p>\");
                </script>";
            }
          }
          
        }
    }

  $stmt2 = $pdo_conn->prepare("SELECT * FROM UsuarioRestaurante WHERE Login_id = :id;");
  $stmt2->bindParam(":id", $_SESSION['id']);
  $stmt2->execute();
  $dadosUsuarios = $stmt2->fetchAll(PDO::FETCH_ASSOC);
  $dadosUsuario = $dadosUsuarios[0];

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Cadastrar novo prato | Sistema de avaliação de restaurantes</title>
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
  
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Cadastrar novo prato
        <small></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-dark">
            <div class="box-header with-border">
              <h3 class="box-title">Dados do prato</h3>
            </div>
            <div class="box-body">
              <form method="POST" action="" id="form-foto-perfil" enctype="multipart/form-data">
                <div class="form-group col-md-6">
                  <label>Nome</label>
                  <input type="text" name="nome" class="form-control" placeholder="Digite seu nome prato" required="">
                </div>
                <div class="form-group col-md-6">
                  <label>Valor</label>
                  <div class="input-group">
                    <span class="input-group-addon">R$</span>
                    <input type="text" name="valor" class="form-control" placeholder="00,00" required="" data-inputmask='"mask": "99.99"' data-mask>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="foto">
                    <p class="help-block">Faça upload da imagem do prato</p>
                  </div>
                </div>
                <div class="form-group col-md-12">
                  <label>Descrição</label>
                  <textarea name="descricao" class="form-control" placeholder="Informe os detalhes do prato" required=""></textarea>
                </div>
                <div class="form-group col-md-12">
                  <button type="submit" class="btn btn-primary btn-flat ">Cadastrar <i class="fa fa-fw fa-save"></i></button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Versão 1.0
    </div>
    <!-- Default to the left -->
    Copyright &copy; 2017 <a href="http://sistemasparainter.net" target="_blank">Sistemas para Internet Senac</a> | Senac
  </footer>
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- InputMask -->
<script src="../../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<script type="text/javascript">
  $(function () {
    $('[data-toggle="popover"]').popover()
  });
  $("[data-mask]").inputmask();
</script>

<?php
  echo $escriptjs;
?>
</body>
</html>
