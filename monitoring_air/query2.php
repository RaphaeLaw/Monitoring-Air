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
$sql = "SELECT sensor.tipe_sensor,
        COUNT(masalah_notifikasi.masalah_id) AS jumlah_masalah
        FROM
        sensor
        LEFT JOIN
        masalah_notifikasi
        ON
        sensor.sensor_id = masalah_notifikasi.sensor_id
        GROUP BY
        sensor.tipe_sensor;";
        $result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr>
            <th>Tipe Sensor</th>
            <th>Jumlah Masalah</th>
          </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['tipe_sensor'] . "</td>";
        echo "<td>" . $row['jumlah_masalah'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data ditemukan.";
}

$conn->close();
?>
