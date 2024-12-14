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
$sql = "SELECT masalah_notifikasi.masalah_id, 
               petugas.nama, 
               sensor.tipe_sensor, 
               masalah_notifikasi.aksi_pengendalian, 
               masalah_notifikasi.waktu_masalah 
        FROM masalah_notifikasi 
        JOIN petugas ON masalah_notifikasi.petugas_id = petugas.petugas_id 
        JOIN sensor ON masalah_notifikasi.sensor_id = sensor.sensor_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr>
            <th>Masalah ID</th>
            <th>Nama Petugas</th>
            <th>Tipe Sensor</th>
            <th>Aksi Pengendalian</th>
            <th>Waktu Masalah</th>
          </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['masalah_id'] . "</td>";
        echo "<td>" . $row['nama'] . "</td>";
        echo "<td>" . $row['tipe_sensor'] . "</td>";
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
