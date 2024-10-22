<nav class="sidebar-wrapper">

  <!-- Sidebar brand starts -->
  <!-- Sidebar brand ends -->

  <!-- Sidebar menu starts -->
  <div class="sidebar-menu">
    <div class="sidebarMenuScroll">
      <ul>
        <!-- <li><a href="<?php echo site_url('dashbord/'); ?>">
          <i class="bi bi-house"></i>
          <span class="menu-text">Dashboards</span>
        </a>
        </li> -->
        <li class="sidebar-dropdown">
          <a href="#">
            <i class="bi bi-people"></i>
            <span class="menu-text">Personnel</span>
          </a>
          <div class="sidebar-submenu">
            <ul>
              <li><a href="<?php echo site_url('personnel/'); ?>">Ajouter Personnel</a></li>
              <li><a href="<?php echo site_url('personnel/view'); ?>">Voir Personnel</a></li>
            </ul>
          </div>
        </li>

        <li class="sidebar-dropdown">
          <a href="#">
            <i class="bi bi-building"></i>
            <span class="menu-text">Départements</span>
          </a>
          <div class="sidebar-submenu">
            <ul>
              <li><a href="<?php echo site_url('departement_ctrl'); ?>">Ajouter demande</a></li>
            </ul>
          </div>
        </li>

        <li class="sidebar-dropdown">
          <a href="#">
            <i class="bi bi-briefcase"></i>
            <span class="menu-text">Fournisseurs</span>
          </a>
          <div class="sidebar-submenu">
            <ul>
              <li><a href="<?php echo site_url('fournisseur/create'); ?>">Ajouter Fournisseur</a></li>
              <li><a href="<?php echo site_url('fournisseur/view'); ?>">Voir Fournisseurs</a></li>
            </ul>
          </div>
        </li>

        <li class="sidebar-dropdown">
          <a href="#">
            <i class="bi bi-file-earmark-text"></i>
            <span class="menu-text">Documents</span>
          </a>
          <div class="sidebar-submenu">
            <ul>
              <li><a href="<?php echo site_url('demandeachat_ctrl'); ?>">Voir toutes les demandes</a></li>
              <li><a href="<?php echo site_url('proformat_ctrl/liste'); ?>">Voir la liste des Proforma</a></li>
              <li><a href="<?php echo site_url('bonlivraison/liste'); ?>">Voir la liste des Bon de libraisons</a></li>
              <li><a href="<?php echo site_url('facture/liste'); ?>">Voir les factures</a></li>

            </ul>
          </div>
        </li>

        <li class="sidebar-dropdown">
          <a href="#">
            <i class="bi bi-pie-chart"></i>
            <span class="menu-text">Gestion de Stock</span>
          </a>
          <div class="sidebar-submenu">
            <ul>
              <li><a href="<?php echo site_url('produit_ctrl'); ?>">Entrée/Sortie</a></li>
              <li><a href="<?php echo site_url('stock_ctrl'); ?>">Etat Stock</a></li>
            </ul>
          </div>
        </li>

        <!-- Ajout de la section Finance -->
        <li class="sidebar-dropdown">
          <a href="#">
            <i class="bi bi-cash"></i>
            <span class="menu-text">Finance</span>
          </a>
          <div class="sidebar-submenu">
            <ul>
              <li><a href="<?php echo site_url('finance_ctrl'); ?>">Voir les Finances</a></li>
            </ul>
          </div>
        </li>
        <!-- Fin de l'ajout -->

      </ul>
    </div>
  </div>
  <!-- Sidebar menu ends -->

</nav>
<!-- Sidebar wrapper end -->
 
<div class="main-container">

  <!-- Page header starts -->
  <div class="page-header">

    <div class="toggle-sidebar" id="toggle-sidebar"><i class="bi bi-list"></i></div>

    <!-- Breadcrumb start -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <i class="bi bi-house"></i>
      </li>
      <li class="breadcrumb-item breadcrumb-active" aria-current="page">Achats</li>
    </ol>
    <!-- Breadcrumb end -->

    <!-- Header actions container start -->
    <div class="header-actions-container">

      <!-- Search container start -->
      <div class="search-container">

        <!-- Search input group start -->
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search">
          <button class="btn" type="button">
            <i class="bi bi-search"></i>
          </button>
        </div>
        <!-- Search input group end -->

      </div>
      <!-- Search container end -->
      <!-- Header actions end -->

    </div>
    <!-- Header actions container end -->

  </div>
  <!-- Page header ends -->
