<?php
$host = 'localhost';
$username = 'root';
$password = '';
$db_name = 'angkatan3_pendaftaran';

$connection = mysqli_connect($host, $username, $password, $db_name);

if (!$connection) {
    echo "Error connecting, Something is wrong";
}
