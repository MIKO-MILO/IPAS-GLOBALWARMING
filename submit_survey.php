<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "survey_global_warming";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$age_group = $_POST['age_group'];
$knowledge_level = $_POST['knowledge_level'];
$action_willingness = $_POST['action_willingness'];
$renewable_support = $_POST['renewable_support'];
$climate_change_concern = $_POST['climate_change_concern'];

// Masukkan data ke tabel
$sql = "INSERT INTO survey_results (age_group, knowledge_level, action_willingness, renewable_support, climate_change_concern) 
        VALUES ('$age_group', '$knowledge_level', '$action_willingness', '$renewable_support', '$climate_change_concern')";

if ($conn->query($sql) === TRUE) {
    header("Location: success.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
