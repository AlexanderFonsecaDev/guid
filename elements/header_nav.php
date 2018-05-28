<header class="navbar navbar-default">
    <!-- Left Header Navigation -->
    <ul class="nav navbar-nav-custom">
        <!-- Main Sidebar Toggle Button -->
        <li>
            <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');">
                <i class="fa fa-bars fa-fw"></i>
            </a>
        </li>
        <!-- END Main Sidebar Toggle Button -->
    </ul>
    <!-- END Left Header Navigation -->

    <!-- Right Header Navigation -->
    <ul class="nav navbar-nav-custom pull-right">
        <!-- User Dropdown -->
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                <img src="../img/icon152.png" alt="avatar"> <i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                <li class="dropdown-header text-center">Cuenta</li>

                <li>
                    <a href="javascript:cargarModalUserInfo();"><i class="fa fa-cogs fa-fw pull-right"></i> Cambiar clave</a>
                    <a href="javascript:salir();"><i class="fa fa-ban fa-outdent pull-right"></i> Salir</a>
                </li>
                
            </ul>
        </li>
        <!-- END User Dropdown -->
    </ul>
    <!-- END Right Header Navigation -->
</header>