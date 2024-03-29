<!-- Nav - Begin -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Offcanvas navbar large">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">&nbsp;</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasGDITnavbar" aria-controls="offcanvasGDITnavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas bg-dark offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasGDITnavbar" aria-labelledby="offcanvasGDITnavbarLabel" data-bs-scroll="true">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasGDITnavbarLabel">GDIT System Proposal<br><em>Team Orange</em></h5>
                <button class="btn-close btn-close-white" type="button" data-bs-dismiss="offcanvas" aria-label="Close" data-bs-target="#offcanvasGDITnavbar"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <?php
                        /* Show menu items if user is logged in. */
                        $account_url = $app_path.'controllers?action=view_login';
                        $logout_url = $app_path.'controllers?action=logout';
                        if (isset($_SESSION['adm_id'])) :
                    ?>
                    <li class="nav-item col-7 col-lg-auto">
                        <a class="nav-link py-2 px-0 px-lg-2 active" href="<?php echo $app_path.'controllers/admin?action=view_dashboard' ?>">Dashboard</a>
                    </li>
                    <li class="nav-item col-7 col-lg-auto">
                        <a class="nav-link py-2 px-0 px-lg-2" href="<?php echo $app_path.'controllers/admin?action=view_account' ?>">My Profile</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Clients</a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href="<?php echo $app_path.'controllers/client?action=view_clients'?>">View All</a></li>
                        <li><a class="dropdown-item" href="<?php echo $app_path.'controllers/client?action=add_client'?>">Create</a></li>
                    </ul>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Baselines</a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href="<?php echo $app_path.'controllers/baseline?action=view_baselines'?>">View All</a></li>
                        <?php if (isset($_SESSION['co_id'])) : ?>
                            <li><a class="dropdown-item" href="<?php echo $app_path.'controllers/baseline?action=view_co_baselines'?>"><?php echo $current_client->getShort(); ?>'s Baselines</a></li>
                        <?php endif; ?>
                        <li><a class="dropdown-item" href="<?php echo $app_path.'controllers/baseline?action=start_baseline'?>">Create</a></li>
                    </ul>
                    </li>
                    <!-- <li class="nav-item col-7 col-lg-auto">
                        <a class="nav-link py-2 px-0 px-lg-2" href="" >POAM</a>
                    </li> -->
                    <li class="nav-item col-7 col-lg-auto">
                        <a class="nav-link py-2 px-0 px-lg-2" href="<?php echo $app_path.'controllers/admin?action=view_log'?>" >Logs</a>
                    </li>
                    <li class="nav-item col-7 col-lg-auto">
                        <a class="nav-link py-2 px-0 px-lg-2" href="<?php echo $logout_url ?>" >Logout</a>
                    </li>
                    <?php else: ?>
                    <li class="nav-item col-2 col-lg-auto">
                        <a class="nav-link py-2 px-0 pe-lg-2 active" href="<?php echo $app_path ?>">Home</a>
                    </li>   
                    <li class="nav-item col-2 col-lg-auto">
                        <a class="nav-link py-2 px-0 pe-lg-2" href="<?php echo $account_url ?>">Login</a>
                    </li>
                    <?php endif; ?>

                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- Nav - End -->