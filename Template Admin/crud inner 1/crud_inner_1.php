<?php
@$aksi = $_GET['aksi']; // Tangkap parameter aksi
switch ($aksi) {
    case 'tampil':
        include 'tampil.php'; // Pastikan ini benar
        break;

    case 'tambah':
        include 'tambah.php';
        break;

    case 'edit':
        include 'edit.php';
        break;

    case 'hapus':
        include 'hapus.php';
        break;

    case 'proses_hapus':
        include 'proses hapus.php';
        break;

    case 'proses_edit':
        include 'proses edit.php';
        break;   
    
    case 'crud_inner':
            include 'proses edit.php';
            break; 

    default:
        include 'tampil.php'; // Halaman default
        break;
}
?>
