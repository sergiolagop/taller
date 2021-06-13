<?php
$id_usuario=$this->session->userdata("user_id");
?>
<header>

  <!-- Sidebar navigation -->
  <div id="slide-out" class="side-nav sn-bg-4 fixed">
    <ul class="custom-scrollbar">

      <!-- Logo -->
      <li class="logo-sn waves-effect py-3">
          <div class="text-center">
            <a href="#" class="pl-0"><img height=60 src="{LOGO_HEADER}"></a>
          </div>
        </li>

      <!-- Search Form 
      <li>
        <form class="search-form" role="search">
          <div class="md-form mt-0 waves-light">
            <input type="text" class="form-control py-2" placeholder="Buscar">
          </div>
        </form>
      </li>
      -->
      <!-- Side navigation links -->
        {MENU}
      <!-- Side navigation links -->

    </ul>
    <div class="sidenav-bg mask-strong"></div>
  </div>
  <!-- Sidebar navigation -->

  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg scrolling-navbar double-nav">

    <!-- SideNav slide-out button -->
    <div class="float-left">
      <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars" style="color:white"></i></a>
    </div>

    <!-- Breadcrumb -->
    <div class="breadcrumb-dn mr-auto">
      <p>TALLER DE INTEGRACIÓN DE SOFTWARE</p>
    </div>

    <div class="d-flex change-mode">

      <!-- <div class="ml-auto mr-3 change-mode-wrapper">
        <button class="btn btn-outline-black btn-sm" id="dark-mode">Change Mode</button>
      </div> -->

      <!-- Navbar links -->
      <ul class="nav navbar-nav nav-flex-icons ml-auto">

        <!-- Dropdown -->
        {notificaciones}
        <li class="nav-item dropdown notifications-nav" id="parent_notif">
          <a class="nav-link dropdown-toggle waves-effect" id="navbarDropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <span class="badge red" id="notif_number">{notif_number}</span> <i class="fas fa-bell"></i>
            <span class="d-none d-md-inline-block">Notificaciones</span>
          </a>
          <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink" id="notif_container">
            {notificaciones_det}
            <a class="dropdown-item" href="#" onclick="markRead({id_notif_user})" id="n{id_notif_user}">
              
              <div style="width: 20px;"><i class="{icon} mr-2" aria-hidden="true"></i> {nombre}</div>
              <span class="float-right"><i class="far fa-clock" aria-hidden="true"></i> {dias} </span>
            </a>
            {/notificaciones_det}
          </div>
        </li>
        {/notificaciones}
        <li class="nav-item">

        </li>

        <!-- Show modal help info -->


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle waves-effect" href="#" id="userDropdown" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user"></i> <span class="clearfix d-none d-sm-inline-block">Perfil</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            
            <a class="dropdown-item" href="http://45.236.129.159/~taller/auth/logout"><i class="fas fa-backward" style="width: 20px;"></i> Salir</a>

          </div>
        </li>

      </ul>
    </div>

  </nav>
  <!-- Navbar -->
</header>