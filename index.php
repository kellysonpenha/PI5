<?php
define("ROW_PER_PAGE",2);
require_once('db.php');
?>


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
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.css">
  <link rel="stylesheet" href="dist/css/skins/skin-site.css">
  <link rel="stylesheet" href="dist/css/site.css">
</head>
<body class="body-home">
<?php	
	$search_keyword = '';
	if(!empty($_POST['search']['keyword'])) {
		$search_keyword = $_POST['search']['keyword'];
	}	
	//$sql = 'SELECT * FROM estabecimento WHERE post_title LIKE :keyword OR description LIKE :keyword OR post_at LIKE :keyword ORDER BY id DESC ';
	
	$sql = 'SELECT * FROM estabecimento WHERE nome LIKE :keyword OR nome ORDER BY nome DESC ';
	
	/* Pagination Code starts */
	$per_page_html = '';
	$page = 1;
	$start=0;
	if(!empty($_POST["page"])) {
		$page = $_POST["page"];
		$start=($page-1) * ROW_PER_PAGE;
	}
	$limit=" limit " . $start . "," . ROW_PER_PAGE;
	$pagination_statement = $pdo_conn->prepare($sql);
	$pagination_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
	$pagination_statement->execute();

	$row_count = $pagination_statement->rowCount();
	if(!empty($row_count)){
		$per_page_html .= "<div style='text-align:center;margin:20px 0px;'>";
		$page_count=ceil($row_count/ROW_PER_PAGE);
		if($page_count>1) {
			for($i=1;$i<=$page_count;$i++){
				if($i==$page){
					$per_page_html .= '<input type="submit" name="page" value="' . $i . '" class="btn-page current" />';
				} else {
					$per_page_html .= '<input type="submit" name="page" value="' . $i . '" class="btn-page" />';
				}
			}
		}
		$per_page_html .= "</div>";
	}
	
	$query = $sql.$limit;
	$pdo_statement = $pdo_conn->prepare($query);
	$pdo_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
	$pdo_statement->execute();
	$result = $pdo_statement->fetchAll();
?>


<form name='frmSearch' action='' method='post' class="busca-home">
	<div class="form-group">
          <div class="input-group">
		  
			<div style='text-align:right;margin:20px 0px;'><input type='text' class="input-login"name='search[keyword]' value="<?php echo $search_keyword; ?>" id='keyword' maxlength='25'></div>		  
		  </div>
	</div>

<table class='tbl-qa'>
  <thead>
	<tr>
	  <th class='table-header' width='20%'>Title</th>
	  <th class='table-header' width='40%'>Description</th>
	  <th class='table-header' width='20%'>Date</th>
	</tr>
  </thead>
  <tbody id='table-body'>
	<?php
	if(!empty($result)) { 
		foreach($result as $row) {
	?>
	  <tr class='table-row'>
		<td><?php echo $row['nome']; ?></td>
		<td><?php echo $row['nota']; ?></td>
		<td><?php echo $row['preco']; ?></td>
	  </tr>
    <?php
		}
	}
	?>
  </tbody>
</table>
<?php echo $per_page_html; ?>
</form>
<div class="wrapper">
  <header class="main-header">
    <div class="menu-home container">
      <a href="pages/examples/register.html" class="btn btn-primary btn-flat">Crie sua conta <i class="fa fa-user-plus"></i></a>
      <a href="pages/examples/login.html" class="btn btn-primary btn-flat">Faça login <i class="fa fa-sign-in"></i></a>
      <a href="pages/examples/login-restaurante.html" class="btn btn-primary btn-flat">Área do restaurante <i class="fa fa-cutlery"></i></a>
    </div>
  </header>
  <section class="container home">
    <div class="home-intro">
      <img src="dist/img/logo-com-texto-branco.png" style="max-width: 250px;">
      <p>Que restaurante você quer conhecer?</p>
      <form class="busca-home">
        <div class="form-group">
          <div class="input-group">
            <select class="form-control input-login select2" data-tags="true" data-placeholder="Em que semestre você estuda?" data-allow-clear="true">
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
    </div>
    <hr>
    <h2>Top 5 melhores restaurantes</h2>
    <p>Olá, veja abaixo o top 5 dos melhores restaurantes do centro universitário Senac</p>
	
	
	
	  <tbody id='table-body'>
	<?php
	if(!empty($result)) { 
		foreach($result as $row) {
	?>
	<div class="box box-widget widget-user widget-aviliacao">
      <div class="widget-user-header bg-default">
        <h3 class="widget-user-username"><?php echo $row['nome']; ?></h3>
        <h5 class="widget-user-desc">Nota geral: 4,3 <i class="fa fa-star "></i></h5>
      </div>
      <div class="widget-user-image">
        <img class="img-circle" src="dist/img/casa-do-pao-de-queijo.jpg" alt="User Avatar">
      </div>
      <div class="box-footer">
        <div class="row">
          <div class="col-sm-4 border-right">
            <div class="description-block">
              <h5 class="description-header">Preço</h5>
              <span class="description-text"><?php echo $row['nota']; ?><i class="fa fa-star-o"></i></span>
            </div>
          </div>
          <div class="col-sm-4 border-right">
            <div class="description-block">
              <h5 class="description-header">Sabor</h5>
              <span class="description-text"><?php echo $row['preco']; ?><i class="fa fa-star-o"></i></span>
            </div>
          </div>        
        </div>
      </div>
    </div>
	
	
	
	
	
	
	
	
	  <tr class='table-row'>
		<td></td>
		<td></td>
		<td></td>
	  </tr>
    <?php
		}
	}
	?>
  </tbody>
	
	
	
	
	
	
	
	
	
	
	
    <div class="box box-widget widget-user widget-aviliacao">
      <div class="widget-user-header bg-default">
        <h3 class="widget-user-username">1 - Casa do pão de queijo</h3>
        <h5 class="widget-user-desc">Nota geral: 4,3 <i class="fa fa-star "></i></h5>
      </div>
      <div class="widget-user-image">
        <img class="img-circle" src="dist/img/casa-do-pao-de-queijo.jpg" alt="User Avatar">
      </div>
      <div class="box-footer">
        <div class="row">
          <div class="col-sm-4 border-right">
            <div class="description-block">
              <h5 class="description-header">Preço</h5>
              <span class="description-text">2,1 <i class="fa fa-star-o"></i></span>
            </div>
          </div>
          <div class="col-sm-4 border-right">
            <div class="description-block">
              <h5 class="description-header">Sabor</h5>
              <span class="description-text">4,2 <i class="fa fa-star-o"></i></span>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="description-block">
              <h5 class="description-header">Atendimento</h5>
              <span class="description-text">4,6 <i class="fa fa-star-o"></i></span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="box box-widget widget-user widget-aviliacao">
      <div class="widget-user-header bg-default">
        <h3 class="widget-user-username">2 - Rizzo</h3>
        <h5 class="widget-user-desc">Nota geral: 4,2 <i class="fa fa-star "></i></h5>
      </div>
      <div class="widget-user-image">
        <img class="img-circle" src="dist/img/rizzo.jpg" alt="User Avatar">
      </div>
      <div class="box-footer">
        <div class="row">
          <div class="col-sm-4 border-right">
            <div class="description-block">
              <h5 class="description-header">Preço</h5>
              <span class="description-text">2,1 <i class="fa fa-star-o"></i></span>
            </div>
          </div>
          <div class="col-sm-4 border-right">
            <div class="description-block">
              <h5 class="description-header">Sabor</h5>
              <span class="description-text">4,3 <i class="fa fa-star-o"></i></span>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="description-block">
              <h5 class="description-header">Atendimento</h5>
              <span class="description-text">4,6 <i class="fa fa-star-o"></i></span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="box box-widget widget-user widget-aviliacao">
      <div class="widget-user-header bg-default">
        <h3 class="widget-user-username">3 - Tasca</h3>
        <h5 class="widget-user-desc">Nota geral: 4,2 <i class="fa fa-star "></i></h5>
      </div>
      <div class="widget-user-image">
        <img class="img-circle" src="dist/img/logo-tasca.jpg" alt="User Avatar">
      </div>
      <div class="box-footer">
        <div class="row">
          <div class="col-sm-4 border-right">
            <div class="description-block">
              <h5 class="description-header">Preço</h5>
              <span class="description-text">2,1 <i class="fa fa-star-o"></i></span>
            </div>
          </div>
          <div class="col-sm-4 border-right">
            <div class="description-block">
              <h5 class="description-header">Sabor</h5>
              <span class="description-text">4,2 <i class="fa fa-star-o"></i></span>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="description-block">
              <h5 class="description-header">Atendimento</h5>
              <span class="description-text">4,1 <i class="fa fa-star-o"></i></span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="box box-widget widget-user widget-aviliacao">
      <div class="widget-user-header bg-default">
        <h3 class="widget-user-username">4 - Nectare</h3>
        <h5 class="widget-user-desc">Nota geral: 4,1 <i class="fa fa-star "></i></h5>
      </div>
      <div class="widget-user-image">
        <img class="img-circle" src="dist/img/logo-nectare.jpg" alt="User Avatar">
      </div>
      <div class="box-footer">
        <div class="row">
          <div class="col-sm-4 border-right">
            <div class="description-block">
              <h5 class="description-header">Preço</h5>
              <span class="description-text">2,1 <i class="fa fa-star-o"></i></span>
            </div>
          </div>
          <div class="col-sm-4 border-right">
            <div class="description-block">
              <h5 class="description-header">Sabor</h5>
              <span class="description-text">4,2 <i class="fa fa-star-o"></i></span>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="description-block">
              <h5 class="description-header">Atendimento</h5>
              <span class="description-text">4,6 <i class="fa fa-star-o"></i></span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="box box-widget widget-user widget-aviliacao">
      <div class="widget-user-header bg-default">
        <h3 class="widget-user-username">5 - menu.com</h3>
        <h5 class="widget-user-desc">Nota geral: 4,0 <i class="fa fa-star "></i></h5>
      </div>
      <div class="widget-user-image">
        <img class="img-circle" src="dist/img/casa-do-pao-de-queijo.jpg" alt="User Avatar">
      </div>
      <div class="box-footer">
        <div class="row">
          <div class="col-sm-4 border-right">
            <div class="description-block">
              <h5 class="description-header">Preço</h5>
              <span class="description-text">2,1 <i class="fa fa-star-o"></i></span>
            </div>
          </div>
          <div class="col-sm-4 border-right">
            <div class="description-block">
              <h5 class="description-header">Sabor</h5>
              <span class="description-text">4,2 <i class="fa fa-star-o"></i></span>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="description-block">
              <h5 class="description-header">Atendimento</h5>
              <span class="description-text">4,6 <i class="fa fa-star-o"></i></span>
            </div>
          </div>
        </div>
      </div>
    </div>
      
  </section>

  
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/select2.full.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
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

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
