<?php
@$pages = $_GET['pages'];
switch ($pages) {

    case 'index':
        include "../index.php";
        break;

    case 'login':
        include "login.php";
        break;

    case 'register':
        include "signup.php";
        break;

    case 'table':
        include "table.php";
        break;

    case 'modal':
        include "modals.php";
        break;

    case 'invoice':
        include "invoice.php";
        break;

    case 'form':
        include "form.php";
        break;

    case 'blankpage':
        include "blankpage.php";
        break;

    case 'Pendahuluan':
        include "accordion.php";
        break;

    default:
        include "table.php"; // Arahkan ke dashboard jika tidak ada yang cocok
        break;
}
?>