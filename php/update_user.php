<?php
session_start();
include "koneksi.php";

$id = $_SESSION['user_id'];
$data = json_decode(file_get_contents("php://input"), true);

//prepared statement agar aman
$stmt = $conn->prepare("UPDATE siswa SET 
    username = ?, 
    no_siswa = ?, 
    tempat_lahir = ?, 
    alamat = ?, 
    email = ? 
    WHERE id = ?");

$stmt->bind_param(
    "sssssi",
    $data['nama'],
    $data['no_siswa'],
    $data['lahir'],
    $data['alamat'],
    $data['email'],
    $id
);

if ($stmt->execute()) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "error" => $stmt->error]);
}

$stmt->close();
$conn->close();