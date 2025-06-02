<!-- jQuery wajib lebih dulu -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- Select2 + Tema Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" rel="stylesheet" />


<div class="page-wrapper">
    
            <!-- Page Content-->
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                                <h4 class="page-title">Data Buku</h4>
                                <div class="">
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="#">Nesabo</a>
                                        </li><!--end nav-item-->
                                        <li class="breadcrumb-item active">Data Buku</li>
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
                                            <h4 class="card-title">Data Buku</h4>                      
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
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBook"><i class="fa-solid fa-plus me-1"></i> Tambah Buku</button>
                                        </div>
                                    </div>  <!--end row-->                                  
                                </div><!--end card-header-->
                                <div class="card-body pt-0">
                                    <div class="table-responsive">
                                        <table class="table datatable" id="datatable_1">
                                            <thead class="table-light">
                                              <tr>
                                                <th>No</th>
                                                <th>Kode Buku</th>
                                                <th>Nama Buku</th>
                                                <th>Stok</th>
                                                <th>Aksi</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (!empty($buku)) : ?>
                                                    <?php $no = 1; foreach ($buku as $row): ?> 
                                                        <tr>
                                                            <td><?= $no++ ?></td>
                                                            <td><?= $row->kode_buku ?></td>
                                                            <td><?= $row->nama_buku ?></td>
                                                            <td><?= $row->stok ?></td>
                                                            <td>                                                       
                                                                <a href="#" 
                                                                    data-bs-toggle="modal" 
                                                                    data-bs-target="#addStok" 
                                                                    title="Tambah Stok"
                                                                    data-id="<?= $row->id ?>">
                                                                    <i class="las la-plus text-secondary fs-18"></i>
                                                                </a>
                                                                <a href="#" 
                                                                    data-bs-toggle="modal" 
                                                                    data-bs-target="#editBook" 
                                                                    title="Edit"
                                                                    data-id="<?= $row->id ?>"
                                                                    data-kode_buku="<?= $row->kode_buku ?>"
                                                                    data-nama_buku="<?= $row->nama_buku ?>">
                                                                    <i class="las la-pen text-secondary fs-18"></i>
                                                                </a>
                                                                <a href="#" 
                                                                    data-bs-toggle="modal" 
                                                                    data-bs-target="#addPinjam" 
                                                                    data-id="<?= $row->id ?>"
                                                                    data-kode_buku="<?= $row->kode_buku ?>"
                                                                    data-nama_buku="<?= $row->nama_buku ?>"
                                                                    title="Pinjam">
                                                                    <i class="las la-folder-plus text-secondary fs-18"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                               <?php else : ?>
                                                    <tr>
                                                        <td colspan="7" class="text-center">Belum ada data buku.</td>
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
                    <h6 class="modal-title">Tambah Buku</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('buku/add') ?>" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="kode_buku" class="form-label">Kode&nbsp;Buku</label>
                        <input class="form-control" type="text" id="kode_buku" name="kode_buku" required>
                    </div> 
                    <div class="mb-3">
                        <label for="nama_buku" class="form-label">Nama&nbsp;Buku</label>
                        <input class="form-control" type="text" id="nama_buku" name="nama_buku" required>
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

        <!-- modal edit buku -->
        <div class="modal fade" id="editBook" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Buku</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('buku/edit') ?>" method="post">
                            <input type="hidden" name="id_buku" id="id_buku">
                            <div class="mb-3">
                                <label for="kode_buku_edit" class="form-label">Kode Buku</label>
                                <input type="text" class="form-control" id="kode_buku_edit" name="kode_buku" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama_buku_edit" class="form-label">Nama Buku</label>
                                <input type="text" class="form-control" id="nama_buku_edit" name="nama_buku" required>
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

        <!-- modal add stok -->
        <div class="modal fade" id="addStok" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Stok Buku</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('buku/addstok') ?>" method="post">
                            <input type="hidden" name="buku_id" id="buku_id">
                            <div class="mb-3">
                                <label for="qty" class="form-label">Jumlah Stok</label>
                                <input type="number" class="form-control" id="qty" name="qty" required>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- modal pinjam -->
        <div class="modal fade" id="addPinjam" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="text_buku">Pinjam Buku</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('buku/addpinjam') ?>" method="post">
                            <input type="hidden" name="buku_id_pinjam" id="buku_id_pinjam">
                            <div class="mb-3">
                                <label for="siswa" class="form-label">Siswa</label>
                                <div class="col-sm-12">
                                    <select class="form-select" name="siswa" id="siswa_pinjam" aria-label="Pilih Siswa">
                                        <option selected disabled value="">Pilih Siswa</option>
                                        <?php foreach ($siswa as $k): ?>
                                            <option value="<?= $k->id; ?>"><?= $k->nis; ?> - <?= $k->nama; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="jml_pinjaman" class="form-label">Jumlah Pinjam</label>
                                <input type="number" class="form-control" id="jml_pinjaman" name="jml_pinjaman" required>
                            </div>
                            <div class="mb-3">
                                <label for="tgl_pinjam" class="form-label">Tanggal Pinjam</label>
                                <div class="col-sm-12">
                                    <input class="form-control" type="date" value="<?= date('Y-m-d'); ?>" name="tgl_pinjam" id="tgl_pinjam">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">                            
                                    <div class="mb-3">
                                        <label class="form-label" for="note">Keterangan</label>
                                        <textarea class="form-control" rows="5" id="note" name="note"></textarea>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm">Tambah Pinjaman</button>
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var myModal = document.getElementById('editBook');
    
    // Event listener untuk menangani ketika modal sedang dibuka
    myModal.addEventListener('show.bs.modal', function (event) {
        // Ambil tombol yang memicu modal
        var button = event.relatedTarget;
        
        // Ambil data dari tombol
        var id = button.getAttribute('data-id');
        var kode_buku = button.getAttribute('data-kode_buku');
        var nama_buku = button.getAttribute('data-nama_buku');
        
        // Cari input yang ada di dalam modal dan setel nilainya
        var modal = myModal;
        modal.querySelector('#kode_buku_edit').value = kode_buku;
        modal.querySelector('#nama_buku_edit').value = nama_buku;
        modal.querySelector('#id_buku').value = id;
        
        // Jika perlu, kamu juga bisa mengatur field lainnya seperti ID atau data tersembunyi
        // Sebagai contoh, menyimpan ID yang dipilih untuk di-submit dengan form
        modal.querySelector('#editBookId').value = id;
    });
});
document.addEventListener('DOMContentLoaded', function () {
    var myModal = document.getElementById('addStok');
    
    // Event listener untuk menangani ketika modal sedang dibuka
    myModal.addEventListener('show.bs.modal', function (event) {
        // Ambil tombol yang memicu modal
        var button = event.relatedTarget;
        
        // Ambil data dari tombol
        var id = button.getAttribute('data-id');
        
        // Cari input yang ada di dalam modal dan setel nilainya
        var modal = myModal;
        modal.querySelector('#buku_id').value = id;
        
        // Jika perlu, kamu juga bisa mengatur field lainnya seperti ID atau data tersembunyi
        // Sebagai contoh, menyimpan ID yang dipilih untuk di-submit dengan form
        modal.querySelector('#addStokId').value = id;
    });
});
document.addEventListener('DOMContentLoaded', function () {
    var myModal = document.getElementById('addPinjam');
    
    // Event listener untuk menangani ketika modal sedang dibuka
    myModal.addEventListener('show.bs.modal', function (event) {
        // Ambil tombol yang memicu modal
        var button = event.relatedTarget;
        
        // Ambil data dari tombol
        var id = button.getAttribute('data-id');
        var kode_buku = button.getAttribute('data-kode_buku');
        var nama_buku = button.getAttribute('data-nama_buku');
        
        // Cari input yang ada di dalam modal dan setel nilainya
        var modal = myModal;
        modal.querySelector('#buku_id_pinjam').value = id;
        modal.querySelector('#text_buku').textContent = "Pinjam Buku "+nama_buku+" ("+kode_buku+")";

        
        // Jika perlu, kamu juga bisa mengatur field lainnya seperti ID atau data tersembunyi
        // Sebagai contoh, menyimpan ID yang dipilih untuk di-submit dengan form
        modal.querySelector('#editPinjamId').value = id;
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
$(document).ready(function() {
    $('#siswa_pinjam').select2({
        theme: 'bootstrap-5',
        placeholder: 'Pilih Siswa',
        allowClear: true,
        width: '100%',
        dropdownParent: $('#addPinjam') // <--- GANTI ini dengan ID modal kamu
    });
});

</script>