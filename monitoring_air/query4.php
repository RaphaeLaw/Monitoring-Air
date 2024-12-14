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
        nama_parameter,
        AVG(batas_aman_min) AS rata_rata_min,
        AVG(batas_aman_maks) AS rata_rata_maks
        FROM
        parameter_kualitas
        GROUP BY
        nama_parameter;";
        $result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr>
            <th>Nama Parameter</th>
            <th>Rata Rata Minimal</th>
            <th>Rata Rata Maximum</th>
          </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['nama_parameter'] . "</td>";
        echo "<td>" . $row['rata_rata_min'] . "</td>";
        echo "<td>" . $row['rata_rata_maks'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data ditemukan.";
}

$conn->close();
?>
