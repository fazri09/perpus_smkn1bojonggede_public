<!-- Top Bar Start -->
    <div class="topbar d-print-none">
        <div class="container-fluid">
            <nav class="topbar-custom d-flex justify-content-between" id="topbar-custom">    
        

                <ul class="topbar-item list-unstyled d-inline-flex align-items-center mb-0">                        
                    <li>
                        <button class="nav-link mobile-menu-btn nav-icon" id="togglemenu">
                            <i class="iconoir-menu"></i>
                        </button>
                    </li> 
                    <li class="mx-2 welcome-text">
                        <?php
                        $hour = (int) date('H');

                        if ($hour >= 5 && $hour < 12) {
                            $greeting = "Good Morning";
                        } elseif ($hour >= 12 && $hour < 17) {
                            $greeting = "Good Afternoon";
                        } elseif ($hour >= 17 && $hour < 21) {
                            $greeting = "Good Evening";
                        } else {
                            $greeting = "Good Night";
                        }

                        ?>

                        <h5 class="mb-0 fw-semibold text-truncate"><?= $greeting ?>, <?= $this->session->userdata('user_nama') ?: '' ?>!</h5>
                        <!-- <h6 class="mb-0 fw-normal text-muted text-truncate fs-14">Here's your overview this week.</h6> -->
                    </li>                   
                </ul>
                <ul class="topbar-item list-unstyled d-inline-flex align-items-center mb-0">
                    <li class="topbar-item">
                        <a class="nav-link nav-icon" href="javascript:void(0);" id="light-dark-mode">
                            <i class="iconoir-half-moon dark-mode"></i>
                            <i class="iconoir-sun-light light-mode"></i>
                        </a>                    
                    </li>
    
                    <li class="dropdown topbar-item">
                        <a class="nav-link dropdown-toggle arrow-none nav-icon" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false" data-bs-offset="0,19">
                            <img src="assets/images/logo-sm.png" alt="" class="thumb-md rounded-circle">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end py-0">
                            <div class="d-flex align-items-center dropdown-item py-2 bg-secondary-subtle">
                                <div class="flex-shrink-0">
                                    <img src="assets/images/logo-sm.png" alt="" class="thumb-md rounded-circle">
                                </div>
                                <div class="flex-grow-1 ms-2 text-truncate align-self-center">
                                    <h6 class="my-0 fw-medium text-dark fs-13"><?= $this->session->userdata('user_nama') ?: '' ?></h6>
                                    <small class="text-muted mb-0"><?= $this->session->userdata('user_role') ?: '' ?></small>
                                </div><!--end media-body-->
                            </div>
                            <div class="dropdown-divider mb-0"></div>
                            <a class="dropdown-item text-danger" href="<?= base_url('auth/logout'); ?>">
                                <i class="las la-power-off fs-18 me-1 align-text-bottom"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul><!--end topbar-nav-->
            </nav>
            <!-- end navbar-->
        </div>
    </div>
    <!-- Top Bar End -->
    <!-- leftbar-tab-menu -->
    <div class="startbar d-print-none">
        <!--start brand-->
        <div class="brand">
            <a href="<?= base_url('dashboard'); ?>" class="logo">
                <span>
                    <img src="assets/images/logo-sm.png" alt="logo-small" class="logo-sm">
                </span>
                <span class="">
                    <img src="assets/images/logo-light.png" alt="logo-large" class="logo-lg logo-light">
                    <img src="assets/images/logo-dark.png" alt="logo-large" class="logo-lg logo-dark">
                </span>
            </a>
        </div>
        <!--end brand-->
        <!--start startbar-menu-->
        <div class="startbar-menu" >
            <div class="startbar-collapse" id="startbarCollapse" data-simplebar>
                <div class="d-flex align-items-start flex-column w-100">
                    <!-- Navigation -->
                    <ul class="navbar-nav mb-auto w-100">
                        <li class="menu-label mt-2">
                            <span>Navigation</span>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('dashboard'); ?>">
                                <i class="iconoir-report-columns menu-icon"></i>
                                <span>Dashboard</span>
                            </a>
                        </li><!--end nav-item-->

                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('buku'); ?>">
                                <i class="fas fa-book menu-icon"></i>
                                <span>Data Buku</span>
                            </a>
                        </li><!--end nav-item-->
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('pinjaman'); ?>">
                                <i class="fas fa-list menu-icon"></i>
                                <span>Data Peminjam</span>
                            </a>
                        </li><!--end nav-item-->
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('history'); ?>">
                                <i class="fas fa-history menu-icon"></i>
                                <span>History Pinjaman</span>
                            </a>
                        </li><!--end nav-item-->

                        <li class="nav-item">
                            <a class="nav-link" href="#sidebarMaster" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarMaster"> 
                                <i class="fas fa-star menu-icon"></i>                                       
                                <span>Master</span>
                            </a>
                            <div class="collapse " id="sidebarMaster">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a href="<?= base_url('siswa'); ?>" class="nav-link ">Siswa</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a href="<?= base_url('jurusan'); ?>" class="nav-link ">Jurusan</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a href="<?= base_url('kelas'); ?>" class="nav-link ">Kelas</a>
                                    </li><!--end nav-item-->
                                </ul><!--end nav-->
                            </div>
                        </li><!--end nav-item-->                                
                    </ul><!--end navbar-nav--->
                </div>
            </div><!--end startbar-collapse-->
        </div><!--end startbar-menu-->    
    </div><!--end startbar-->
    <div class="startbar-overlay d-print-none"></div>
    <!-- end leftbar-tab-menu-->