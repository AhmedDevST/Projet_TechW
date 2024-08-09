<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="Dasbord.php"><img src="../assets/images/logo.svg" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="Dasbord.php"><img src="../assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
         <?php if($_SESSION['role']==1){?>
        
          <li class="nav-item menu-items">
            <a class="nav-link "href="Dasbord.php">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link"  href="Gestion_Pro.php" >
              <span class="menu-icon">
                <i class="mdi mdi-apps"></i>
              </span>
              <span class="menu-title">Produites</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link"  href="Gestion_Cat.php" >
              <span class="menu-icon">
                <i class="mdi mdi-dns"></i>
              </span>
              <span class="menu-title">Categories</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-account-switch"></i>
              </span>
              <span class="menu-title">Clients Fourinsseur</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="List_Cli.php">Clients</a></li>
                <li class="nav-item"> <a class="nav-link" href="List_Four.php">Fourinsseur</a></li>
                <li class="nav-item"> <a class="nav-link" href="Ajouter_Per.php">Ajouter</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link"  href="Gestion_commande.php" >
              <span class="menu-icon">
                <i class="mdi mdi-cart"></i>
              </span>
              <span class="menu-title">Commande</span>
           
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link"  href="Gestion_Achats.php">
              <span class="menu-icon">
                <i class="mdi mdi-basket"></i>
              </span>
              <span class="menu-title">Achats</span>            
            </a>
          </li>
         <?php } ?>
          <li class="nav-item menu-items">
            <a class="nav-link"   href="Gestion_Caisse.php" >
              <span class="menu-icon">
                <i class="mdi mdi-cash-multiple"></i>
              </span>
              <span class="menu-title">Caisse</span>
            </a>
          </li>
        </ul>
      </nav>