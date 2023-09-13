  <!-- partial:partials/_sidebar.html -->

  @include('admin.diplome.RechercherEtudiant')

  <nav class="sidebar sidebar-offcanvas " id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="/admin/dashboard">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="mdi mdi-circle-outline menu-icon"></i>
          <span class="menu-title">GESTION DIPLOME</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/diplome') }}">board diplomes</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/categorie') }}" >Categories</a></li>
            <li class="nav-item"> <a class="nav-link" href="" data-bs-toggle="modal" data-bs-target="#Rechechermodel" > remise</a></li>
          </ul>
        </div>
      </li>


      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="mdi mdi-account menu-icon"></i>
          <span class="menu-title">GESTION ETUDIANTS</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/etudiant') }}">board Etudiants </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/etudiant/nouveauEtudiant') }}">Nouveau Etudiant</a></li>

          </ul>
        </div>
      </li>


      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" role="button" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="mdi mdi-account menu-icon"></i>
          <span class="menu-title">GESTION UTILISATEURS</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Nouveau utilisateur </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html">board utilisateur</a></li>

          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/admin/facultes">
          <i class="mdi mdi-file-document-box-outline menu-icon"></i>
          <span class="menu-title">Faculté</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/admin/programme">
          <i class="mdi mdi-file-document-box-outline menu-icon"></i>
          <span class="menu-title">Programe</span>
        </a>
      </li>


      <li class="nav-item">
        <a class="nav-link" href="documentation/documentation.html">
          <i class="mdi mdi-file-document-box-outline menu-icon"></i>
          <span class="menu-title">Documentation</span>
        </a>
      </li>



      <li class="nav-item">
        <a class="nav-link" href="documentation/documentation.html">
          <i class="mdi mdi-file-document-box-outline menu-icon"></i>
          <span class="menu-title">a propos</span>
        </a>
      </li>
    </ul>



  </nav>



