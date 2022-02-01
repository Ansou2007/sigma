   <?php
		require_once base_app.'views/utilisateur/session.php';		
		$id_login = $_SESSION['utilisateur']['id'];
		$id_commune = $_SESSION['utilisateur']['id_commune'];
		$id_departement = $_SESSION['utilisateur']['id_departement'];
		$id_region = $_SESSION['utilisateur']['id_region'];
		$login = $_SESSION['utilisateur']['login'];
		$groupe = $_SESSION['utilisateur']['groupe'];
		$role = $_SESSION['utilisateur']['role'];
		$commune = $_SESSION['utilisateur']['nom_commune'];
		$departement = $_SESSION['utilisateur']['nom_departement'];
		$region = $_SESSION['utilisateur']['nom_region'];
   ?>
   <!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="accueil">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="far fa-grin-alt"></i>
  </div>
  <div class="sidebar-brand-text mx-3">SIGMP <sup>1.0</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link" href="accueil">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>TABLEAU DE BORD</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Interface
</div>

	<!-- Nav Item - Cellule -->
	<li class="nav-item">
        <a class="nav-link" href="cellule">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>CELLULES</span></a>
      </li>
	<!-- Nav Item - Militant -->
      <li class="nav-item">
        <a class="nav-link" href="Militant">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>MILITANTS</span></a>
      </li>
	  
	  <!-- Nav Item - Page Collapse ADMINISTRATION -->
	  <?php
	  if($role=="Super Administrateur"){
     echo ' <li class="nav-item">'
        .'<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">'
         .' <i class="fas fa-fw fa-cog"></i>'
          .'<span>ADMINISTRATION</span></a>'
        .'<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">'
          .'<div class="bg-white py-2 collapse-inner rounded">'
           .' <h6 class="collapse-header">Gérer:</h6>'
            .'<a class="collapse-item" href="region">Région</a>'
            .'<a class="collapse-item" href="departement">Département</a>'
			.'<a class="collapse-item" href="commune">Commune</a></div></div></li>';
	  }
      ?>
	    
	<!-- Nav Item - Gestion des utilisateur -->
	  <?php 
		if($role=="Administrateur" || $role=="Super Administrateur"){				
		echo '<li class="nav-item">'
			. '<a class="nav-link" href="utilisateur">'
			. '<i class="fas fa-fw fa-chart-area"></i>'
			. '<span>GESTION UTILISATEUR</span></a></li> ';
	  }
      ?>





<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Info
</div>

<!-- Nav Item - Info Collapse Menu -->
      <li class="nav-item active">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Information</span>
        </a>
        <div id="collapsePages" class="collapse show" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Je suis de la:</h6>
            <a class="collapse-item">Pole: <?php echo $region?> </a>
            <a class="collapse-item">Filiére: <?php echo $departement?></a>
            <a class="collapse-item">Cohorte: <?php echo $commune?></a>
            <div class="collapse-divider"></div>
            
          </div>
        </div>
      </li>

	<!-- Nav Item - Statistique -->
      <li class="nav-item">
        <a class="nav-link" href="">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>STATISTIQUES</span></a>
      </li>


<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Rechercher..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Rechercher..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alertes -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">0+</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerte
                </h6>
                  
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500"><?php echo date("d:m:Y");?></div>
                    Vous serez notifié.
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Voir Tout</a>
              </div>
            </li>

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter">0</span>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Messagerie
                </h6>
               
                
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                    <div class="status-indicator bg-warning"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Aucun message</div>
                    <div class="small text-gray-500">Admin</div>
                  </div>
                </a>
                
                <a class="dropdown-item text-center small text-gray-500" href="#">Voir Plus</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item -  Information Utilisateur -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                  
               Bonjour <?php echo $login?>
                  
                </span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profil
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Paramétre
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Journal d'Activité
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="deconnexion" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Déconnexion
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->


  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Avant de quitter</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Voulez-vous vraiment quitter la session ?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>

          <form action="deconnexion" method="POST"> 
          
            <button type="submit" name="logout_btn" class="btn btn-primary">Déconnexion</button>

          </form>


        </div>
      </div>
    </div>
  </div>