<?php
session_start();
include "koneksi.php";

// Matikan error notice biar gak bocor ke JSON
error_reporting(0);
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM guru WHERE email='$email' LIMIT 1";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $guru = $result->fetch_assoc();

        if (password_verify($password, $guru['password'])) {
            $_SESSION['guru'] = $guru;

            echo json_encode([
                "status" => "success",
                "message" => "Login guru berhasil!",
                "user"    => $guru,
                "redirect" => "gurusection.php"
            ]);
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "Password salah!"
            ]);
        }
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Email tidak ditemukan!"
        ]);
    }
    exit;
}

// Kalau akses langsung tanpa POST
echo json_encode([
    "status" => "error",
    "message" => "Invalid request!"
]);
exit;