<?php
define("ROW_PER_PAGE",4);
require_once('class/Connection.class.php');
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
  <!-- Rate Yo -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.css">
  <link rel="stylesheet" href="dist/css/skins/skin-site.css">
  <link rel="stylesheet" href="dist/css/site.css">
  <!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
	<style>.box-footer{background-color:#FFF;}</style>
</head>
<body class="body-home">
<?php	
	$pdo_conn = new Connection();
	$search_keyword = '';
	if(!empty($_POST['search']['keyword'])) {
		$search_keyword = $_POST['search']['keyword'];
	}	
	//$sql = 'SELECT * FROM estabecimento WHERE post_title LIKE :keyword OR description LIKE :keyword OR post_at LIKE :keyword ORDER BY id DESC ';	
	
	
	$sql = 'SELECT * FROM estabelecimento2 WHERE Nome LIKE :keyword OR Nome ORDER BY Nome DESC ';
	
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



<div class="wrapper">
  <header class="main-header">
    <div class="menu-home container">
      <a href="register.php" class="btn btn-primary btn-flat">Crie sua conta <i class="fa fa-user-plus"></i></a>
      <a href="login.php" class="btn btn-primary btn-flat">Faça login <i class="fa fa-sign-in"></i></a>
      <a href="register-restaurante.php" class="btn btn-primary btn-flat">Restaurante <i class="fa fa-cutlery"></i></a>
    </div>
  </header>
  
  <section class="container home">
  
    <div class="home-intro">	
      <img src="dist/img/logo-com-texto-branco.png" style="max-width: 250px;">
      <p>Que restaurante você quer conhecer?</p>              
    </div>
	
	<form style="max-width: 500px; margin: auto;">
		<div class="form-group">
			<div class="input-group">
				<select name="restaurante" class="form-control select2"  data-placeholder="Escolha um restaurante" >
					<option></option>
					<?php
				        $stmt2 = $pdo_conn->prepare("SELECT id, nome  FROM UsuarioRestaurante;");
				        $stmt2->execute();
				        $restaurantes = $stmt2->fetchAll(PDO::FETCH_ASSOC);
				        
				        foreach ($restaurantes as $restaurante) {
				          echo "<option value=\"".$restaurante['id']."\">".$restaurante['nome']."</option>";
				        }
				      ?>
				</select>
				<span class="input-group-btn">
					<button class="btn btn-primary btn-flat" type="submit">Buscar <i class="fa fa-search"></i></button>
				</span>
			</div>
		</div>
	</form>
          
	<!--<form name='frmSearch' action='' method='post'>	
		<div class="col-md-offset-4 col-md-4">
			<input type='text'class="form-control" name='search[keyword]' value="<?php echo $search_keyword; ?>" id='keyword' maxlength='25' style="inline-block">
		</div>
		<div class="col-md-2">
			<span>
				<button class="btn btn-primary btn-flat" type="submit">Buscar <i class="fa fa-search"></i></button>
			</span>
		</div>
	-->
	<br />
    <hr>	
    <h2>Top 5 melhores restaurantes</h2>
    <p>Olá, veja abaixo o top 5 dos melhores restaurantes do centro universitário Senac</p>
	
	<tbody id='table-body'>
	  <!-- Rate Yo -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
	<?php
	if(!empty($result)) {	
		foreach($result as $row) {
			
			
	?>
	<script> 
		var geral = <?php echo $row["Geral"] ?>;
		var limpeza = <?php echo $row["Limpeza"] ?> ;
		var sabor= <?php echo $row["Sabor"] ?>;
		var preco = <?php echo $row["Preco"] ?>;
		var tempo = <?php echo $row["Tempo"] ?>;
		
		if (geral > 5){
			geral = 5			
		}
		if (limpeza > 5){
			limpeza = 5			
		}
		if (sabor > 5){
			sabor = 5			
		}
		if (preco > 5){
			preco = 5			
		}
		if (tempo > 5){
			tempo = 5			
		}
	
	
	</script>
	
	
	<div class="box box-widget widget-user widget-aviliacao">
      <div class="widget-user-header bg-default">
        <h3 class="widget-user-username"><?php echo  "<a href='avaliar-restaurante.php?id={$row['id_Restaurante']}'>{$row['Nome']}</a>";?></h3>
        <h5 class="widget-user-desc" style="display: inline;">Nota geral:</h5>
		<div class="geral" style="display: inline-block;"></div>
      </div>
      <div class="widget-user-image">
        <img class="img-circle" src="dist/img/casa-do-pao-de-queijo.jpg" alt="User Avatar">
      </div>
      <div class="box-footer">
        <div class="row">
          <div class="col-sm-4 border-right">
            <div class="description-block">
              <h5 class="description-header">Preço</h5>
			  <div class="preco " style="margin: 0 auto;"></div>
            </div>
          </div>
          <div class="col-sm-4 border-right">
            <div class="description-block">
              <h5 class="description-header">Sabor</h5>
			  <div class="sabor " style="margin: 0 auto;"></div>
            </div>
          </div>
			<div class="col-sm-4">
            <div class="description-block">
              <h5 class="description-header">Atendimento</h5>
			  <div class="atendimento " style="margin: 0 auto;"></div>
            </div>
          </div>		  
        </div>
      </div>
    </div>
	<script>
		$(".atendimento").rateYo({
			rating: tempo,
			starWidth: "20px",
			readOnly: true
		});
		$(".sabor").rateYo({
			rating: sabor,
			starWidth: "20px",
			readOnly: true
		});
		$(".preco").rateYo({
			rating: preco,
			starWidth: "20px",
			readOnly: true
		});
		$(".geral").rateYo({
			rating: geral,
			starWidth: "20px",
			readOnly: true
		});
	</script>
	  
    <?php
		}
	}
	?>
  </tbody>
	 
  </section>
    <?php echo $per_page_html; ?>
	</form>

  
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->


<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/select2.full.min.js"></script>

<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>

<script type="text/javascript">
	$('.select2').select2();
</script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
