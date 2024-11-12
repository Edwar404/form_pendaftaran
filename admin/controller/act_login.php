<?php
session_start();
include '../inc/connection.php';

$email = $_POST['email'];
$password = $_POST['password'];

$queryLogin = mysqli_query($connection, "SELECT * FROM users WHERE email = '$email' AND password = '$password'");
if (mysqli_num_rows($queryLogin) > 0) {
    $rowUser = mysqli_fetch_assoc($queryLogin);
    if ($rowUser['email'] == $email && $rowUser['password'] == $password) {
        $_SESSION['name'] = $rowUser['nama_lengkap'];
        $_SESSION['id'] = $rowUser['id'];
        $_SESSION['level'] = $rowUser['id_level'];
        $_SESSION['jurusan'] = $rowUser['id_jurusan'];
        header('location: ../index.php?login=success');
    } else {
        header('location: ../login.php?login=failed');
    }
} else {
    header('location: ../login.php?login=failed');
}
