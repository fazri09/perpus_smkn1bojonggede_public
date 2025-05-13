<?php
$hostname = 'localhost';
$username = 'k6555410_admin_perpus';
$password = 'Fazri!72@dB#xT9kLpQw';
$database = 'k6555410_fzr_perpus';

$conn = mysqli_connect($hostname, $username, $password, $database);

// Cek koneksi
if (!$conn) {
    echo "gagal";
    exit;
}
echo "connect<br>";

// Membuat tabel (jika belum ada)
$createTableQuery = "
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL
) ENGINE=InnoDB;
";

if (mysqli_query($conn, $createTableQuery)) {
    echo "Tabel users siap<br>";
} else {
    echo "Gagal membuat tabel: " . mysqli_error($conn);
    exit;
}

// Insert data dummy jika belum ada
$checkData = mysqli_query($conn, "SELECT COUNT(*) as total FROM users");
$row = mysqli_fetch_assoc($checkData);
if ($row['total'] == 0) {
    mysqli_query($conn, "INSERT INTO users (name, email) VALUES 
        ('Fazri', 'fazri@example.com'),
        ('Alya', 'alya@example.com')
    ");
    echo "Data dummy ditambahkan<br>";
}

// Select dan tampilkan data
$result = mysqli_query($conn, "SELECT * FROM users");
if ($result && mysqli_num_rows($result) > 0) {
    while ($user = mysqli_fetch_assoc($result)) {
        echo "ID: " . $user['id'] . " | ";
        echo "Name: " . $user['name'] . " | ";
        echo "Email: " . $user['email'] . "<br>";
    }
} else {
    echo "Tidak ada data.<br>";
}

mysqli_close($conn);
?>
