  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../images/restaurante/logo/<?php echo $foto; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php $_SESSION['nome']; ?></p>
          <p><i class="fa fa-star-half-full text-success"></i> 4.5</p>
        </div>
      </div>
      <ul class="sidebar-menu">
        <li class="header">Menu</li>
        <li><a href="index.php"><i class="fa fa-user"></i> <span>Meu perfil</span></a></li>
        <li><a href="#"><i class="fa fa-star"></i> <span>Avaliações</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-file-text-o"></i> <span>Cardápio</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pratos-cadastrados.php">Pratos cadastrados</a></li>
            <li><a href="cadastrar-prato.php">Cadastrar novo prato</a></li>
            <li><a href="#">Vizualizar avalições</a></li>
          </ul>
        </li>
      </ul>
    </section>
  </aside>