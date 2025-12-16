<?php
session_start();
include 'config/koneksi.php';

$email = $_POST['email'];
$password = $_POST['password_hash'];

$query = "SELECT * FROM users WHERE email='$email' AND password_hash='$password'";
$result = mysqli_query($conn, $query);

$cekuser = mysqli_num_rows($result);

// var_dump($cekuser);
if (mysqli_num_rows($result) == 1) {
    $datauser = mysqli_fetch_array($result);
    $_SESSION['status_login'] = true;
    $_SESSION['name'] = $datauser['name'];
    $_SESSION['email'] = $datauser['email'];
    $_SESSION['role'] = $datauser['role'];
    header('Location: admin/dashboard.php');
} else {
    $_SESSION['message'] = "username atau password salah";
    echo "Login failed. Please check your email and password.";
    header('Location: index.php');
}

mysqli_close($conn);