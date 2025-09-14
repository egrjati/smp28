<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm  = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    // cek password & confirm
    if ($password !== $confirm) {
        die("Password dan konfirmasi password tidak sama!");
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // upload foto
    $foto   = $_FILES['foto']['name'];
    $tmp    = $_FILES['foto']['tmp_name'];
    $folder = "../uploads/";

    if (!file_exists($folder)) {
        mkdir($folder, 0777, true);
    }

    $uniqueName = uniqid() . "_" . basename($foto);
    $path = $folder . $uniqueName;

    if (move_uploaded_file($tmp, $path)) {
        $sql = "INSERT INTO siswa (username, email, password, foto)
                VALUES ('$username', '$email', '$hashedPassword', '$uniqueName')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Registrasi berhasil!'); window.location.href='../register.html';</script>";
        } else {
            echo "<script>alert('Registrasi gagal: " . mysqli_error($conn) . "'); window.location.href='../register.html';</script>";
        }
    } else {
        echo "Upload foto gagal!";
    }
}