<?php
$host = "localhost"; 
$user = "root";      
$pass = "";          
$db   = "smp28_kel21";  

// buat koneksi
$conn = new mysqli($host, $user, $pass, $db);

// cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>