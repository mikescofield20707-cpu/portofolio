<?php
// untuk melakukan koneksi ke database

$HOSTNAME = "localhost";
$DATABASE = "db_rpl2324";
$USERNAME = "root";
$PASSWORD = "";


$KONEKSI = mysqli_connect($HOSTNAME,$USERNAME,$PASSWORD,$DATABASE);

if (!$KONEKSI) {
    die("koneksi salah bor.....". mysqli_connect_error($KONEKSI));
}

?>