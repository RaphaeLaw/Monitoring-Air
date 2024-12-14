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
        masalah_notifikasi.*
        FROM
        masalah_notifikasi
        WHERE
        petugas_id IN (
        SELECT petugas_id
        FROM
        petugas
        WHERE status_aktif = 1
        );";
        $result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='table table-bordered' border='1'>";
    echo "<tr>
            <th>ID Masalah</th>
            <th>ID Petugas</th>
            <th>ID Sensor</th>
            <th>Aksi Pengendalian</th>
            <th>Waktu_Masalah</th>
          </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['masalah_id'] . "</td>";
        echo "<td>" . $row['petugas_id'] . "</td>";
        echo "<td>" . $row['sensor_id'] . "</td>";
        echo "<td>" . $row['aksi_pengendalian'] . "</td>";
        echo "<td>" . $row['waktu_masalah'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data ditemukan.";
}

$conn->close();
?>

