<div class="page-wrapper">
    
            <!-- Page Content-->
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                                <h4 class="page-title">Data Peminjam</h4>
                                <div class="">
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="#">Mifty</a>
                                        </li><!--end nav-item-->
                                        <li class="breadcrumb-item active">Data Peminjam</li>
                                    </ol>
                                </div>                                
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div><!--end row-->
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">                      
                                            <h4 class="card-title">Data Peminjam</h4>                      
                                        </div><!--end col-->
                                        <div class="col-auto">
                                            <?php if ($this->session->flashdata('notif')): ?>
                                                <div id="flashAlert" class="alert-container" style="position: relative; z-index: 1051;">
                                                    <div class="alert alert-<?= $this->session->flashdata('notif_type') ?> shadow-sm border-theme-white-2" role="alert">
                                                        <div class="d-inline-flex justify-content-center align-items-center thumb-xs bg-<?= $this->session->flashdata('notif_type') ?> rounded-circle mx-auto me-1">
                                                            <i class="fas <?= $this->session->flashdata('notif_type') == 'success' ? 'fa-check' : 'fa-xmark' ?> align-self-center mb-0 text-white"></i>
                                                        </div>
                                                        <strong><?= $this->session->flashdata('notif_type') == 'success' ? 'Success!' : 'Error!' ?></strong> 
                                                        <?= $this->session->flashdata('notif') ?>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>  <!--end row-->                                  
                                </div><!--end card-header-->
                                <div class="card-body pt-0">
                                    <div class="table-responsive">
                                        <table class="table datatable" id="datatable_1">
                                            <thead class="table-light">
                                              <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">NIS</th>
                                                <th class="text-center">Nama</th>
                                                <th class="text-center">Kode Buku</th>
                                                <th class="text-center">Nama Buku</th>
                                                <th class="text-center">Jumlah</th>
                                                <th class="text-center">Tanggal</th>
                                                <th class="text-center">Keterangan</th>
                                                <th class="text-center">Aksi</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (!empty($pinjaman)) : ?>
                                                    <?php $no = 1; foreach ($pinjaman as $row): ?> 
                                                        <tr>
                                                            <td class="text-center"><?= $no++ ?></td>
                                                            <td class="text-center"><?= $row->nis ?></td>
                                                            <td class="text-center"><?= $row->nama ?></td>
                                                            <td class="text-center"><?= $row->kode_buku ?></td>
                                                            <td class="text-center"><?= $row->nama_buku ?></td>
                                                            <td class="text-center"><?= $row->qty ?></td>
                                                            <td class="text-center"><?= date('d F Y', strtotime($row->tgl_pinjam)) ?></td>
                                                            <td class="text-center"><?= $row->note ?></td>
                                                            <td class="text-center">                                                       
                                                                <a href="javascript:void(0);"
                                                                    title="Kembalikan Buku"
                                                                    data-id="<?= $row->id ?>"
                                                                    data-nis="<?= $row->nis ?>"
                                                                    data-nama="<?= $row->nama ?>"
                                                                    data-kode="<?= $row->kode_buku ?>"
                                                                    data-buku="<?= $row->nama_buku ?>"
                                                                    onclick="executeExample(this, 'kembalikanbukuRequest')">
                                                                    <i class="las las la-arrow-circle-left text-secondary fs-18"></i>
                                                                </a>
                                                            </td>

                                                        </tr>
                                                    <?php endforeach; ?>
                                               <?php else : ?>
                                                    <tr>
                                                        <td colspan="7" class="text-center">Belum ada Data Peminjam.</td>
                                                    </tr>
                                                <?php endif; ?>
                                            </tbody>
                                          </table>
                                    </div>   
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
                                                Design remake
                                                <i class="iconoir-heart-solid text-danger align-middle"></i>
                                                by Fazri</span>
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
        <div class="modal fade" id="addBook" tabindex="-1"  aria-hidden="true">
            <div class="modal-dialog modal-fullscreen-md-down">
                <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Tambah Jurusan</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('jurusan/add') ?>" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama_jurusan" class="form-label">Nama&nbsp;Jurusan</label>
                        <input class="form-control" type="text" id="nama_jurusan" name="nama_jurusan" required>
                    </div> 
                    <div class="mb-3">
                        <label for="singkatan_jurusan" class="form-label">Singkatan&nbsp;Jurusan</label>
                        <input class="form-control" type="text" id="singkatan_jurusan" name="singkatan_jurusan" required>
                    </div> 
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                </div>
                </div>
                </form>
            </div>
        </div>

        <!-- modal edit jurusan -->
        <div class="modal fade" id="editJurusan" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Jurusan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('jurusan/edit') ?>" method="post">
                            <input type="hidden" name="id" id="id">
                            <div class="mb-3">
                                <label for="nama_jurusan_edit" class="form-label">Nama Jurusan</label>
                                <input type="text" class="form-control" id="nama_jurusan_edit" name="nama_jurusan" required>
                            </div>
                            <div class="mb-3">
                                <label for="singkatan_jurusan_edit" class="form-label">Singkatan Jurusan</label>
                                <input type="text" class="form-control" id="singkatan_jurusan_edit" name="singkatan_jurusan" required>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm">Edit</button>
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var myModal = document.getElementById('editJurusan');
    
    // Event listener untuk menangani ketika modal sedang dibuka
    myModal.addEventListener('show.bs.modal', function (event) {
        // Ambil tombol yang memicu modal
        var button = event.relatedTarget;
        
        // Ambil data dari tombol
        var id = button.getAttribute('data-id');
        var nama_jurusan = button.getAttribute('data-nama_jurusan');
        var singkatan_jurusan = button.getAttribute('data-singkatan_jurusan');
        
        // Cari input yang ada di dalam modal dan setel nilainya
        var modal = myModal;
        modal.querySelector('#id').value = id;
        modal.querySelector('#nama_jurusan_edit').value = nama_jurusan;
        modal.querySelector('#singkatan_jurusan_edit').value = singkatan_jurusan;
        
        // Jika perlu, kamu juga bisa mengatur field lainnya seperti ID atau data tersembunyi
        // Sebagai contoh, menyimpan ID yang dipilih untuk di-submit dengan form
        modal.querySelector('#editJurusanId').value = id;
    });
});
document.addEventListener('DOMContentLoaded', function() {
    // Cek apakah ada alert yang muncul
    var alert = document.getElementById('flashAlert');
    if (alert) {
        // Sembunyikan alert setelah 2 detik
        setTimeout(function() {
            alert.style.display = 'none';
        }, 2000); // 2000 ms = 2 detik
    }
});
</script>
