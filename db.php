<?php
$hostname = 'localhost';
$username = 'k6555410_admin_perpus';
$password = 'Fazri!72@dB#xT9kLpQw';
$database = 'k6555410_fzr_perpus';

// Membuat koneksi
$conn = mysqli_connect($hostname, $username, $password, $database);

// Cek koneksi
if ($conn) {
    echo "connect";
} else {
    echo "gagal";
}
?>
