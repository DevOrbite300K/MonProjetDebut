<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @yield('title', 'Tableau de bord Produits')
    </title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    @yield('css')

    <style>
      :root {
        --primary-color: #4361ee;
        --secondary-color: #3f37c9;
        --accent-color: #4895ef;
        --light-bg: #f8f9fa;
        --dark-bg: #212529;
        --sidebar-width: 280px;
        --transition-speed: 0.3s;
      }
      
      body {
        background-color: var(--light-bg);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        min-height: 100vh;
        padding-top: 70px;
      }
      
      /* Navbar styling */
      .navbar {
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)) !important;
        padding: 0.7rem 1rem;
      }
      
      .navbar-brand {
        font-weight: 700;
        letter-spacing: 0.5px;
      }
      
      /* Offcanvas sidebar */
      .offcanvas {
        width: var(--sidebar-width) !important;
        background: linear-gradient(to bottom, #2c3e50, #1a1f25) !important;
        box-shadow: 3px 0 15px rgba(0, 0, 0, 0.1);
      }
      
      .offcanvas-header {
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        padding: 1.2rem 1.5rem;
      }
      
      .offcanvas-title {
        font-weight: 600;
        color: #fff;
      }
      
      /* User profile */
      .user-profile {
        transition: transform var(--transition-speed);
      }
      
      .user-profile:hover {
        transform: scale(1.05);
      }
      
      /* Accordion styling */
      .accordion-button {
        font-weight: 500;
        padding: 1rem 1.25rem;
        transition: all var(--transition-speed);
      }
      
      .accordion-button:not(.collapsed) {
        background-color: rgba(255, 255, 255, 0.1);
        color: #fff;
        box-shadow: none;
      }
      
      .accordion-button:focus {
        box-shadow: none;
        border-color: rgba(255, 255, 255, 0.1);
      }
      
      .accordion-body {
        padding: 0.5rem 1.25rem;
        background-color: rgba(0, 0, 0, 0.2);
      }
      
      .accordion-item {
        border: none;
        margin-bottom: 0.5rem;
        border-radius: 0.5rem !important;
        overflow: hidden;
      }
      
      .accordion-button::after {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23ffffff'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
      }
      
      /* Navigation links */
      .nav-link {
        padding: 0.6rem 0.8rem;
        border-radius: 0.35rem;
        margin-bottom: 0.25rem;
        transition: all var(--transition-speed);
      }
      
      .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.1);
        transform: translateX(5px);
      }
      
      /* Dropdown styling */
      .dropdown-menu {
        border: none;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        border-radius: 0.5rem;
        padding: 0.5rem;
      }
      
      .dropdown-item {
        border-radius: 0.35rem;
        padding: 0.5rem 1rem;
        transition: all var(--transition-speed);
      }
      
      .dropdown-item:hover {
        background-color: #f8f9fa;
      }
      
      .dropdown-header {
        font-weight: 600;
        color: #6c757d;
      }
      
      /* Main content */
      .main-content {
        background: #fff;
        border-radius: 0.75rem;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        padding: 1.5rem;
        margin-bottom: 2rem;
        min-height: 400px;
      }
      
      /* Dashboard title */
      .dashboard-title {
        color: #fff;
        font-weight: 600;
        padding-bottom: 1rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
      }
      
      /* Logout button */
      .logout-btn {
        transition: all var(--transition-speed);
        font-weight: 500;
      }
      
      .logout-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(220, 53, 69, 0.3);
      }
      
      /* Notification and profile icons */
      .nav-icon {
        transition: all var(--transition-speed);
        padding: 0.5rem;
        border-radius: 50%;
      }
      
      .nav-icon:hover {
        background-color: rgba(255, 255, 255, 0.1);
        transform: scale(1.1);
      }
      
      /* Badge for notifications */
      .notification-badge {
        position: absolute;
        top: -5px;
        right: -5px;
        background-color: #dc3545;
        color: white;
        border-radius: 50%;
        width: 18px;
        height: 18px;
        font-size: 0.65rem;
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .navbar-toggler {
                        display: block !important;
                        }
    </style>
  </head>
  <body>
    
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container-fluid">
        
        <a class="navbar-brand" href="#">
          <i class="bi bi-grid-3x3-gap-fill me-2"></i>Dashboard Produit
        </a>
        
        <div class="d-flex align-items-center">
          
          <!-- Dropdown Notifications -->
          <div class="dropdown me-3 position-relative">
            <a class="nav-link text-white dropdown-toggle nav-icon" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-bell-fill fs-5"></i>
              <span class="notification-badge">3</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><h6 class="dropdown-header">Notifications</h6></li>
              <li><a class="dropdown-item" href="#"><i class="bi bi-cart-check me-2"></i>Nouvelle commande reçue</a></li>
              <li><a class="dropdown-item" href="#"><i class="bi bi-exclamation-triangle me-2"></i>Stock produit faible</a></li>
              <li><a class="dropdown-item" href="#"><i class="bi bi-person-plus me-2"></i>Nouveau client ajouté</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item text-center text-primary" href="#"><i class="bi bi-list-ul me-1"></i>Voir toutes</a></li>
            </ul>
          </div>
          
          <!-- Dropdown Profil -->
          <div class="dropdown me-3">
            <a class="nav-link text-white dropdown-toggle nav-icon" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-person-circle fs-5"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><h6 class="dropdown-header">Profil</h6></li>
              <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>Mon compte</a></li>
              <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i>Paramètres</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-box-arrow-right me-2"></i>Déconnexion</a></li>
            </ul>
          </div>

          <!-- Bouton Hamburger -->
          <button class="navbar-toggler text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
            aria-controls="offcanvasNavbar" aria-label="Menu">
            <span class="navbar-toggler-icon"></span>
          </button>

          
        </div>
      </div>
    </nav>

    <!-- Offcanvas -->
    <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header bg-darkblue">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu Principal</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Fermer"></button>
      </div>
      <div class="offcanvas-body d-flex flex-column justify-content-between">

        <!-- Image utilisateur -->
        <div class="text-center mb-4 user-profile">
          <i class="bi bi-person-circle fs-5"></i>
          <h6 class="mt-2 mb-0 text-white">Utilisateur Admin</h6>
          <small class="text-muted">Administrateur</small>
        </div>

        <!-- Titre Tableau de bord -->
        <div class="mb-2">
          <h4 class="dashboard-title text-center">📊 Tableau de bord</h4>
        </div>

        <!-- Partie haute : Accordions -->
        <div>
          <div class="accordion accordion-flush" id="menuAccordion">
            


            <!-- Catégorie -->
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingCategorie">
                <button class="accordion-button collapsed bg-dark text-white" type="button" data-bs-toggle="collapse" 
                        data-bs-target="#collapseCategorie" aria-expanded="false" aria-controls="collapseCategorie">
                  <i class="bi bi-tags me-2"></i> Catégorie
                </button>
              </h2>
              <div id="collapseCategorie" class="accordion-collapse collapse" aria-labelledby="headingCategorie" 
                   data-bs-parent="#menuAccordion">
                <div class="accordion-body">
                  <ul class="list-unstyled">
                    <li><a href="#" class="nav-link text-white"><i class="bi bi-plus-circle me-2"></i>Ajouter Catégorie</a></li>
                    <li><a href="#" class="nav-link text-white"><i class="bi bi-list-ul me-2"></i>Liste Catégories</a></li>
                  </ul>
                </div>
              </div>
            </div>



            <!-- Fournisseur -->
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingFournisseur">
                <button class="accordion-button collapsed bg-dark text-white" type="button" data-bs-toggle="collapse" 
                        data-bs-target="#collapseFournisseur" aria-expanded="false" aria-controls="collapseFournisseur">
                  <i class="bi bi-truck me-2"></i> Fournisseur
                </button>
              </h2>
              <div id="collapseFournisseur" class="accordion-collapse collapse" aria-labelledby="headingFournisseur" 
                   data-bs-parent="#menuAccordion">
                <div class="accordion-body">
                  <ul class="list-unstyled">
                    <li><a href="#" class="nav-link text-white"><i class="bi bi-plus-circle me-2"></i>Ajouter Fournisseur</a></li>
                    <li><a href="#" class="nav-link text-white"><i class="bi bi-list-ul me-2"></i>Liste Fournisseurs</a></li>
                  </ul>
                </div>
              </div>
            </div>

            <!-- Produit -->
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingProduit">
                <button class="accordion-button collapsed bg-dark text-white" type="button" data-bs-toggle="collapse" 
                        data-bs-target="#collapseProduit" aria-expanded="false" aria-controls="collapseProduit">
                  <i class="bi bi-box-seam me-2"></i> Produit
                </button>
              </h2>
              <div id="collapseProduit" class="accordion-collapse collapse" aria-labelledby="headingProduit" 
                   data-bs-parent="#menuAccordion">
                <div class="accordion-body">
                  <ul class="list-unstyled">
                    @can('PeutAjouter')

                    <li><a href="{{ route('produits.create') }}" class="nav-link text-white"><i class="bi bi-plus-circle me-2"></i>Ajouter Produit</a></li>
                      
                    @endcan
                    <li><a href="{{ route('produits.index') }}" class="nav-link text-white"><i class="bi bi-list-ul me-2"></i>Liste Produits</a></li>
                  </ul>
                </div>
              </div>
            </div>

            <!-- Client -->
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingClient">
                <button class="accordion-button collapsed bg-dark text-white" type="button" data-bs-toggle="collapse" 
                        data-bs-target="#collapseClient" aria-expanded="false" aria-controls="collapseClient">
                  <i class="bi bi-people me-2"></i> Client
                </button>
              </h2>
              <div id="collapseClient" class="accordion-collapse collapse" aria-labelledby="headingClient" 
                   data-bs-parent="#menuAccordion">
                <div class="accordion-body">
                  <ul class="list-unstyled">
                    <li><a href="#" class="nav-link text-white"><i class="bi bi-plus-circle me-2"></i>Ajouter Client</a></li>
                    <li><a href="#" class="nav-link text-white"><i class="bi bi-list-ul me-2"></i>Liste Clients</a></li>
                  </ul>
                </div>
              </div>
            </div>




            <!-- Commandes -->
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingCommandes">
                <button class="accordion-button collapsed bg-dark text-white" type="button" data-bs-toggle="collapse" 
                        data-bs-target="#collapseCommandes" aria-expanded="false" aria-controls="collapseCommandes">
                  <i class="bi bi-cart me-2"></i> Commandes
                </button>
              </h2>
              <div id="collapseCommandes" class="accordion-collapse collapse" aria-labelledby="headingCommandes" 
                   data-bs-parent="#menuAccordion">
                <div class="accordion-body">
                  <ul class="list-unstyled">
                    <li><a href="#" class="nav-link text-white"><i class="bi bi-plus-circle me-2"></i>Ajouter Commande</a></li>
                    <li><a href="#" class="nav-link text-white"><i class="bi bi-list-ul me-2"></i>Liste Commandes</a></li>
                  </ul>
                </div>
              </div>
            </div>



            <!-- Ligne Commande -->
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingLigneCommandes">
                <button class="accordion-button collapsed bg-dark text-white" type="button" data-bs-toggle="collapse" 
                        data-bs-target="#collapseLigneCommandes" aria-expanded="false" aria-controls="collapseLigneCommandes">
                  <i class="bi bi-cart me-2"></i> Ligne Commandes
                </button>
              </h2>
              <div id="collapseLigneCommandes" class="accordion-collapse collapse" aria-labelledby="headingLigneCommandes" 
                   data-bs-parent="#menuAccordion">
                <div class="accordion-body">
                  <ul class="list-unstyled">
                    <li><a href="#" class="nav-link text-white"><i class="bi bi-plus-circle me-2"></i>Ajouter Client</a></li>
                    <li><a href="#" class="nav-link text-white"><i class="bi bi-list-ul me-2"></i>Liste Clients</a></li>
                  </ul>
                </div>
              </div>
            </div>

            <!-- Rapport -->

            <a href="{{ route('produits.rapport') }}" class="nav-link text-white"><i class="bi bi-file-earmark-text me-2"></i>Rapport</a>

          </div>
        </div>

        <!-- Partie basse : Déconnexion -->
        <div class="text-center mt-4 mb-3">

        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit" class="btn btn-danger">Déconnexion</button>
      </form>
          
        </div>
      </div>

    </div>

    <!-- Contenu principal -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="main-content">
            @yield('content')
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>