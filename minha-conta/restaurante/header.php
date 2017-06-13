  <?php
    $stmt2 = $pdo_conn->prepare("SELECT * FROM UsuarioRestaurante WHERE Login_id = :id;");
    $stmt2->bindParam(":id", $_SESSION['id']);
    $stmt2->execute();
    $dadosUsuarios = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    $dadosUsuario = $dadosUsuarios[0];
  ?>

  <header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo">
      <img src="../../dist/img/logo-extenso-branco.png" class="logo-painel">
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <?php
              if ($dadosUsuario['foto'] == NULL) {
                $foto = "perfil.png";
              } else{
                $foto = $dadosUsuario['foto'];
              }
            ?>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="../../images/restaurante/logo/<?php echo $foto; ?>" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">Olá, <?php echo $_SESSION['nome']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
              
                <img src="../../images/restaurante/logo/<?php echo $foto; ?>" class="img-circle" alt="User Image">


                <p>
                  <?php echo $_SESSION['nome']; ?>
                  <small><?php echo $dadosUsuario['endereco'];?></small>
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="index.php" class="btn btn-default btn-flat">Perfil</a>
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