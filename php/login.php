<?php
session_start();
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM siswa WHERE username='$username' OR email='$username' LIMIT 1";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            // simpan user ke session
            $_SESSION['user'] = $user;

            echo json_encode([
                "status" => "success",
                "message" => "Login berhasil!",
                "redirect" => "usersection.php"
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
            "message" => "User tidak ditemukan!"
        ]);
    }
}