<div class="row" id="body-row">
    <!-- Sidebar -->
    <div id="sidebar-container" class="sidebar-expanded d-none d-md-block">
        <!-- d-* hiddens the Sidebar in smaller devices. Its itens can be kept on the Navbar 'Menu' -->
        <!-- Bootstrap List Group -->
        <ul class="list-group sidebar-font">
            <!-- Separator with title -->
            <li class="list-group-item sidebar-separator menu-collapsed"></li>
            <!-- <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed hiddenborder">   
                <small>REKAPITULASI</small>
            </li> -->
            <!-- /END Separator -->
            <!-- Menu with submenu -->

            <a href="<?php echo site_url('K_tenant/chart_detail_rekapall'); ?>" class="  colorli list-group-item list-group-item-action noborder">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fas fa-igloo fa-fw mr-3"></span>
                    <span class="menu-collapsed">Dashboard</span>
                </div>
            </a>

            <a href="#submenu1" data-toggle="collapse" aria-expanded="false" class="  colorli list-group-item list-group-item-action flex-column align-items-start noborder">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-money-bill-alt fa-fw mr-3"></span>
                    <span class="menu-collapsed">Kelola Keuangan</span>
                    <span class="fas fa-caret-down ml-auto"></span>
                </div>
            </a>
            <!-- Submenu content -->
            <div id='submenu1' class="collapse sidebar-submenu ">
                <a href="<?php echo site_url('K_tenant') ?>" class="list-group-item list-group-item-action  noborder colorli text-white">
                    <span class="menu-collapsed">Kelola Transaksi Tenant</span>
                </a>
                <a href="<?php echo site_url('K_tenant/get_all_rekap ') ?>" class="list-group-item list-group-item-action noborder  colorli  text-white">
                    <span class="menu-collapsed">Kelola Data Rekap</span>
                </a>

                <a href="<?php echo site_url('K_tenant/chart_detail_rekap/udin'); ?>" class="list-group-item list-group-item-action noborder  colorli text-white">
                    <span class="menu-collapsed">Statistik Pendapatan Tenant</span>


                <a href="<?php echo site_url('K_tenant/chart_detail_rekapall'); ?>" class="list-group-item list-group-item-action noborder  colorli text-white">
                    <span class="menu-collapsed">Statistik Pengelola</span>
                </a>
                
                </a>
            </div>


            

            <!-- Separator with title -->
            <!-- <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                <small>AKUN</small>
            </li> -->
            <!-- /END Separator -->
            <a href="#submenu3" data-toggle="collapse" aria-expanded="false" class="  colorli noborder list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-user fa-fw mr-3"></span>
                    <span class="menu-collapsed">Pengaturan Akun</span>
                    <span class="fas fa-caret-down ml-auto"></span>
                </div>
            </a>
            <!-- Submenu content -->
            <div id='submenu3' class="collapse sidebar-submenu">
                <a href="#" class="list-group-item list-group-item-action noborder  colorli text-white">
                    <span class="menu-collapsed">Ubah Profile</span>
                </a>
                <a href="#" class="list-group-item list-group-item-action noborder  colorli text-white">
                    <span class="menu-collapsed">Ubah Password</span>
                </a>
            </div>


            <a href="<?php echo site_url('Auth/logout'); ?>" class="  colorli list-group-item list-group-item-action noborder">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fas fa-sign-out-alt fa-fw mr-3"></span>
                    <span class="menu-collapsed">Logout</span>
                </div>
            </a>


            <!-- Separator without title -->
            <li class="list-group-item noborder sidebar-separator menu-collapsed"></li>
            <!-- /END Separator -->
            <a href="#" data-toggle="sidebar-colapse" class="  colorli noborder list-group-item list-group-item-action d-flex align-items-center">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span id="collapse-icon" class="fa fa-2x mr-3"></span>
                    <span id="collapse-text" class="menu-collapsed">Collapse</span>
                </div>
            </a>
            <!-- Logo -->
            <li class="list-group-item logo-separator d-flex justify-content-center">
                <img src=' <?php echo base_url(); ?>assets/img/money.png' width="30" height="30" />
            </li>
        </ul><!-- List Group END-->
    </div><!-- sidebar-container END -->
    <script src="<?php echo base_url(); ?>assets/js/home.js"></script>