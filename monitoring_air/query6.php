<?php
// Konfigurasi database
$host = "localhost";
$username = "root";
$password = "";
$database = "monitoring_air"; // Ganti dengan nama database Anda

// Membuat koneksi ke database
$conn = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query SQL
$sql = "SELECT
        petugas.nama AS nama_petugas,
        COUNT(masalah_notifikasi.masalah_id) AS jumlah_masalah
        FROM
        petugas
        LEFT JOIN
        masalah_notifikasi
        ON
        petugas.petugas_id = masalah_notifikasi.petugas_id
        GROUP BY
        petugas.nama;";
        $result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr>
            <th>Nama Petugas</th>
            <th>Jumlah Masalah</th>
          </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['nama_petugas'] . "</td>";
        echo "<td>" . $row['jumlah_masalah'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data ditemukan.";
}

$conn->close();
?>
