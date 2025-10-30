<?php

function salam()
{ //target
    return "Hello ay";
}

echo salam() . "<br>"; //pemanggil

function salam2()
{ //target
    return "Kamu Cantik Bgt Hari Ini <3";
}

echo salam2() . "<br>"; //pemanggil
salam2() . "<br>";//pemanggil

//Function Menggunakan Parameter
function salam3($nama)
{ //target
    return "Ya ampunn $nama kamu cantik banget aih ";
}
  
echo salam3('Raraa') . "<br>";

function salam4($waktu = 'pagi', $nama = 'Araaa')
{ //target
    echo "hmmm $waktu $waktu ini enak nya ngapain ya $nama ?";
}
  
echo salam4('malem') . "<br>";
echo "<hr>";

function salam5($waktu = 'PAGI', $nama = 'MICHAEL', $tempat = 'DAGO')
{ //target
    echo "Selamat $waktu hai perkenalkan nama saya $nama saya tinggal di $tempat";
}
  
echo salam5('PAGI') . "<br>";




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
</body>
</html>