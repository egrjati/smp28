<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm  = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    // cek pw
    if ($password !== $confirm) {
        echo json_encode(["status" => "error", "message" => "Password dan konfirmasi tidak sama!"]);
        exit;
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // upfoto
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
            echo json_encode([
                "status" => "success",
                "message" => "
                    <h2 class='text-lg font-medium mb-2'>Your account has been registered...</h2>
                    <p class='text-sm'>Thanks for regist your account....</p>
                "
            ]);
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "Registrasi gagal: " . mysqli_error($conn)
            ]);
        }
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Upload foto gagal!"
        ]);
    }
}