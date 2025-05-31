 <div class="page-wrapper">

        <!-- Page Content-->
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                            <h4 class="page-title">Dashboard</h4>
                            <div class="">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="#">Mifty</a>
                                    </li><!--end nav-item-->
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>                            
                        </div><!--end page-title-box-->
                    </div><!--end col-->
                </div><!--end row-->
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="flex-shrink-0 bg-primary-subtle text-primary thumb-md rounded-circle">
                                        <i class="fas fa-book-open fs-4"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-2 text-truncate">
                                        <p class="text-dark mb-0 fw-semibold fs-14">Jumlah Buku</p>
                                    </div><!--end media-body-->
                                </div><!--end media-->
                                <div class="row d-flex justify-content-center">
                                    <div class="col">                                        
                                        <h3 class="mt-2 mb-0 fw-bold"><?= $jml_buku; ?></h3>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                    <div class="col-md-6 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="flex-shrink-0 bg-info-subtle text-info thumb-md rounded-circle">
                                        <i class="fas fa-book fs-4"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-2 text-truncate">
                                        <p class="text-dark mb-0 fw-semibold fs-14">Stok Buku Tersedia</p>
                                    </div><!--end media-body-->
                                </div><!--end media-->
                                <div class="row d-flex justify-content-center">
                                    <div class="col">                                        
                                        <h3 class="mt-2 mb-0 fw-bold"><?= $jml_stok_buku; ?></h3>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                    <div class="col-md-6 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="flex-shrink-0 bg-warning-subtle text-warning thumb-md rounded-circle">
                                        <i class="fas fa-users fs-4"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-2 text-truncate">
                                        <p class="text-dark mb-0 fw-semibold fs-14">Jumlah Anggota</p>
                                    </div><!--end media-body-->
                                </div><!--end media-->
                                <div class="row d-flex justify-content-center">
                                    <div class="col">                                        
                                        <h3 class="mt-2 mb-0 fw-bold"><?= $jml_siswa; ?></h3>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                   
                    <!--end col-->                    
                </div>
                <!--end row-->
                <div class="row justify-content-center">
                    <div class="col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">                      
                                        <h4 class="card-title">Grafik Bulanan Peminjam Buku</h4>                      
                                    </div><!--end col-->
                                    <div class="col-auto"> 
                                    </div><!--end col-->
                                </div>  <!--end row-->                                  
                            </div><!--end card-header-->
                            <div class="card-body pt-0">
                                <div id="monthly_income" class="apex-charts"></div>                                
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->

                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">                      
                                        <h4 class="card-title">Jurusan Paling Banyak Meminjam Buku</h4>                      
                                    </div><!--end col-->
                                    <!-- <div class="col-auto"> 
                                        <div class="dropdown">
                                            <a href="#" class="btn bt btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="icofont-calendar fs-5 me-1"></i> This Month<i class="las la-angle-down ms-1"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Today</a>
                                                <a class="dropdown-item" href="#">Last Week</a>
                                                <a class="dropdown-item" href="#">Last Month</a>
                                                <a class="dropdown-item" href="#">This Year</a>
                                            </div>
                                        </div>               
                                    </div> -->
                                </div>  <!--end row-->                                  
                            </div><!--end card-header-->
                            <div class="card-body pt-0">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                    <tbody>
                                        <?php
                                            $flag_images = [
                                                'assets/images/flags/us_flag.jpg',
                                                'assets/images/flags/spain_flag.jpg',
                                                'assets/images/flags/french_flag.jpg',
                                                'assets/images/flags/germany_flag.jpg',
                                                'assets/images/flags/baha_flag.jpg',
                                                'assets/images/flags/russia_flag.jpg',
                                            ];
                                            $i = 0;
                                        ?>
                                        <?php foreach ($top_jurusan as $row): ?>
                                        <tr>
                                            <td class="px-0">
                                                <div class="d-flex align-items-center">
                                                    <img src="<?= base_url($flag_images[$i % count($flag_images)]) ?>" class="me-2 align-self-center thumb-md rounded" alt="flag">
                                                    <div class="flex-grow-1 text-truncate"> 
                                                        <h6 class="m-0 text-truncate"><?= htmlspecialchars($row->nama_jurusan) ?></h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-0 text-end">
                                                <span class="text-body ps-2 align-self-center text-end fw-medium">
                                                    <?= htmlspecialchars($row->jumlah_pinjaman) ?> Buku
                                                </span>
                                            </td>
                                        </tr>
                                        <?php $i++; endforeach; ?>
                                    </tbody>
                                </table>
                                            
                                </div><!--end /div-->                           
                            </div><!--end card-body--> 
                        </div><!--end card--> 
                    </div> <!--end col--> 
                    <div class="col-md-6 col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">                      
                                        <h4 class="card-title">Anggota Paling Banyak Meminjam Buku</h4>                      
                                    </div><!--end col-->
                                    <!-- <div class="col-auto"> 
                                        <div class="dropdown">
                                            <a href="#" class="btn bt btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="icofont-calendar fs-5 me-1"></i> This Year<i class="las la-angle-down ms-1"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Today</a>
                                                <a class="dropdown-item" href="#">Last Week</a>
                                                <a class="dropdown-item" href="#">Last Month</a>
                                                <a class="dropdown-item" href="#">This Year</a>
                                            </div>
                                        </div>               
                                    </div> -->
                                </div>  <!--end row-->                                  
                            </div><!--end card-header-->
                            <div class="card-body pt-0">
                                <div class="table-responsive">
                                   <table class="table mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="border-top-0">NIS</th>
                                                <th class="border-top-0">Nama</th>
                                                <th class="border-top-0">Kelas</th>
                                                <th class="border-top-0">Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($top_siswa)) : ?>
                                                <?php foreach ($top_siswa as $siswa) : ?>
                                                    <tr>
                                                        <td><?= htmlspecialchars($siswa->nis) ?></td>
                                                        <td><?= htmlspecialchars($siswa->nama) ?></td>
                                                        <td><?= htmlspecialchars($siswa->nama_kelas ?? 'Unknown') ?></td>
                                                        <td><?= htmlspecialchars($siswa->jumlah_buku_dipinjam) ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <tr>
                                                    <td colspan="4" class="text-center">Tidak ada data</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div><!--end /div-->
                            </div><!--end card-body--> 
                        </div><!--end card--> 
                    </div> <!--end col-->   
                    <div class="col-md-6 col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">                      
                                        <h4 class="card-title">Buku Paling Banyak Di Pinjam</h4>                      
                                    </div><!--end col-->
                                    <!-- <div class="col-auto"> 
                                        <div class="dropdown">
                                            <a href="#" class="btn bt btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="icofont-calendar fs-5 me-1"></i> This Year<i class="las la-angle-down ms-1"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Today</a>
                                                <a class="dropdown-item" href="#">Last Week</a>
                                                <a class="dropdown-item" href="#">Last Month</a>
                                                <a class="dropdown-item" href="#">This Year</a>
                                            </div>
                                        </div>               
                                    </div> -->
                                </div>  <!--end row-->                                  
                            </div><!--end card-header-->
                            <div class="card-body pt-0">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="border-top-0">Kode Buku</th>
                                                <th class="border-top-0">Nama Buku</th>
                                                <th class="border-top-0">Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($top_buku)) : ?>
                                                <?php foreach ($top_buku as $buku) : ?>
                                                    <tr>
                                                        <td><?= htmlspecialchars($buku->kode_buku) ?></td>
                                                        <td><?= htmlspecialchars($buku->nama_buku) ?></td>
                                                        <td><?= htmlspecialchars($buku->jumlah_pinjaman) ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <tr>
                                                    <td colspan="3" class="text-center">Tidak ada data</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table> <!--end table-->                                               
                                </div><!--end /div-->
                            </div><!--end card-body--> 
                        </div><!--end card--> 
                    </div> <!--end col-->            
                </div><!--end row-->
            </div><!-- container -->

            <!--Start Rightbar-->
            <!--Start Rightbar/offcanvas-->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="Appearance" aria-labelledby="AppearanceLabel">
                <div class="offcanvas-header border-bottom justify-content-between">
                  <h5 class="m-0 font-14" id="AppearanceLabel">Appearance</h5>
                  <button type="button" class="btn-close text-reset p-0 m-0 align-self-center" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">  
                    <h6>Account Settings</h6>
                    <div class="p-2 text-start mt-3">
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" id="settings-switch1">
                            <label class="form-check-label" for="settings-switch1">Auto updates</label>
                        </div><!--end form-switch-->
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" id="settings-switch2" checked>
                            <label class="form-check-label" for="settings-switch2">Location Permission</label>
                        </div><!--end form-switch-->
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="settings-switch3">
                            <label class="form-check-label" for="settings-switch3">Show offline Contacts</label>
                        </div><!--end form-switch-->
                    </div><!--end /div-->
                    <h6>General Settings</h6>
                    <div class="p-2 text-start mt-3">
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" id="settings-switch4">
                            <label class="form-check-label" for="settings-switch4">Show me Online</label>
                        </div><!--end form-switch-->
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" id="settings-switch5" checked>
                            <label class="form-check-label" for="settings-switch5">Status visible to all</label>
                        </div><!--end form-switch-->
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="settings-switch6">
                            <label class="form-check-label" for="settings-switch6">Notifications Popup</label>
                        </div><!--end form-switch-->
                    </div><!--end /div-->               
                </div><!--end offcanvas-body-->
            </div>
            <!--end Rightbar/offcanvas-->
            <!--end Rightbar-->
            <!--Start Footer-->
            
            <footer class="footer text-center text-sm-start d-print-none">
                <!-- <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card mb-0 rounded-bottom-0">
                                <div class="card-body">
                                    <p class="text-muted mb-0">
                                        ©
                                        <script> document.write(new Date().getFullYear()) </script>
                                        Mifty
                                        <span
                                            class="text-muted d-none d-sm-inline-block float-end">
                                            Design with
                                            <i class="iconoir-heart-solid text-danger align-middle"></i>
                                            by Mannatthemes</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </footer>

            <!--end footer-->
        </div>
        <!-- end page content -->
    </div>