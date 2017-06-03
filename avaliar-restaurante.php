<?php

require_once('class/Connection.class.php');
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Home | Sistema de avaliação de restaurantes</title>
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
</head>
<body class="body-home fixed">
<div class="wrapper">
  <header class="main-header header-default">

    <!-- Logo -->
    <a href="index.php" class="logo">
      <img src="dist/img/logo-extenso.png" class="logo-painel">
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Navbar Right Menu -->
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
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">Olá, Usuario</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  Aluno
                  <small>Sistemas para internet </small>
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
  
  <?php	
	$pdo_conn = new Connection();	
	$idURL = $_GET['id'];
	$pagination_statement = $pdo_conn->prepare('SELECT * FROM estabecimento where id = :id');	
	$pagination_statement->bindParam(':id', $idURL, PDO::PARAM_INT);
	$pagination_statement->execute();	
?>
  
  <?php
	if(!empty($pagination_statement)) { 
		foreach($pagination_statement as $row) {
			
	?>
  
  
  <div class="box box-widget widget-user widget-perfil-restaurante">
    <div class="widget-user-header bg-default">
      <h2 class="widget-user-username"><?php print_r($row["nome"]); ?></h2>      
      <div class="col-md-12"><div class="limpeza " style="margin: 0 auto;"></div></div>
     
	  
    </div>
    <div class="widget-user-image">
      <img class="img-circle" src="dist/img/casa-do-pao-de-queijo.jpg" alt="User Avatar">
    </div>
  </div>
  
	<?php
			
       
		}
	}
	?>
    
  <section class="container">
    <div class="conteudo-intro">
      <h3>Destalhes</h3>      
      <p><button class="btn btn-default btn-flat btn-lg" data-toggle="modal" data-target="#cardapio">Cardápio</button></a></p>
      
      <hr>

      <h3>Avaliações</h3>
      <div class="clearfix"></div>
      <div class="item">
        <div class="col-md-4"><p>Limpeza</p></div>
        <div class="col-md-8"><div id="limpeza" class="limpeza"></div></div>
      </div>
      <div class="item">
        <div class="col-md-4"><p>Tempo de espera</p></div>
        <div class="col-md-8"><div id="tempodeespera" class="tempodeespera"></div></div>
      </div>
      <div class="item">
        <div class="col-md-4"><p>Valor</p></div>
        <div class="col-md-8"><div id="valor" class="valor"></div></div>
      </div>
      <div class="item">
        <div class="col-md-4"><p>Sabor</p></div>
        <div class="col-md-8"><div id="sabor" class="sabor"></div></div>
      </div>
      <div class="item">
        <div class="col-md-4"><p>Qualidade do atendimento</p></div>
        <div class="col-md-8"><div id="qualidadeatendimento" class="qualidadeatendimento"></div></div>
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
          <div class="prato">
            <div class="col-md-4">
              <img src="dist/img/casa-do-pao-de-queijo.jpg" class="img-responsive">
            </div>
            <div class="col-md-8">
              <h3 class="titulo-cardapio">Pão de queijo tradicional</h3>
              <div class="rateYo"></div>
              <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
              <h5 class="preco">R$ 4,50</h5>
              
            </div>
          </div>
          <div class="clearfix"></div>
          <hr>
          <div class="prato">
            <div class="col-md-4">
              <img src="dist/img/avatar04.png" class="img-responsive">
            </div>
            <div class="col-md-8">
              <h3>Pão de queijo com recheado</h3>
              <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
              <p>R$ 6,50</p>
            </div>
          </div>
          <div class="clearfix"></div>
          <hr>
          <div class="prato">
            <div class="col-md-4">
              <img src="dist/img/avatar5.png" class="img-responsive">
            </div>
            <div class="col-md-8">
              <h3>Beirutt de rozbiff</h3>
              <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
              <p>R$ 19,00</p>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary btn-flat">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</div>
  
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>







  </tbody>

<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/select2.full.min.js"></script>
<!-- Rate Yo -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<script>
var x;
$(function () { 
$("#limpeza, #tempodeespera, #valor, #sabor, #qualidadeatendimento").rateYo().on("rateyo.set", function (e, data) {
    if(this.id == "limpeza"){
		console.log("sou zica pq é limpeza");		
		enviarRaiting(data, "limpeza");
		
	}else if(this.id == "tempodeespera"){
		console.log("sou zica pq é tempo de espera");
		enviarRaiting(data, "tempo de espera");
	}else if(this.id == "valor"){
		console.log("sou zica pq é valor");
		enviarRaiting(data, "valor");
	}else if(this.id == "sabor"){
		console.log("sou zica pq é sabor");
		enviarRaiting(data, "sabor");
	}else if(this.id == "qualidadeatendimento"){
		console.log("sou zica pq é qualidadeatendimento");
		enviarRaiting(data, "qualidade de atendimento");
	}
	});
});


function enviarRaiting(estrela, tipo){
	var url="class/avaliacao.php";
	var request = new XMLHttpRequest();	
	request.onload = function(){	
		if(this.status == 200){													
				console.log(this.response + "fsd");
			}
		}
		
		request.open("POST", url);
		request.withCredentials = true;
		request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		request.send("id=" + <?php echo $idURL ?> + "&tipo=" + tipo + "&raiting=" + estrela.rating); 	
}


  $(function () {
    $(".select2").select2();
  });
  
  
  

  $(function () {
 
    $("#limpeza").rateYo({
      rating: <?php print_r($row["nota"]); ?>,
      starWidth: "40px",
	  fullStar: true
    });
	
	 $("#tempodeespera").rateYo({
      rating: 5,
      starWidth: "40px",
	  fullStar: true
    });
	
	 $("#valor").rateYo({
      rating: 5,
      starWidth: "40px",
	  fullStar: true
    });
	
	 $("#sabor").rateYo({
      rating: 5,
      starWidth: "40px",
	 fullStar: true
    });
	
	 $("#qualidadeatendimento").rateYo({
      rating: 2,
      starWidth: "40px",
	  fullStar: true
    });
   
  });
</script>
</body>
</html>
