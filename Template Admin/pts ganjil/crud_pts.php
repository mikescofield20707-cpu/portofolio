<?php
@$pages = $_GET['aksi'];
switch ($pages) {
    case 'tampil':
        include 'tampil.php';
        break;

    case 'tampildasar':
            include 'tampildasar.php';
            break;

    case 'tambah':
        include 'tambah.php';
        break;

    case 'tambah_dasar':
            include 'tambahdasar.php';
            break;

    case 'edit':
        include 'edit.php';
        break;

    case 'editdasar':
            include 'editdasar.php';
            break;

    case 'hapus':
        include 'hapus.php';
        break;

    case 'hapusdasar':
            include 'hapusdasar.php';
            break;

    case 'proses_hapus':
        include 'proses hapus.php';
        break;
    
    case 'proses_hhapus':
            include 'proses hhapus.php';
            break;

    default:
        include "tampil.php";
        break;
}
?>