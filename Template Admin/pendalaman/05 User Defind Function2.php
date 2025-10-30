<?php 

function perkalian($nilai1, $nilai2)
{ //target
    $hasil = $nilai1 * $nilai2;
    return $hasil;
}
  
echo perkalian(10, 2) . "<br>";

echo "<hr>";

function luas_lingkaran($jarijari)
{ //target
    $hasil0 = 3.14 * $jarijari * $jarijari;
    return $hasil0;
}
  
echo luas_lingkaran(10) . "<br>";
echo "<hr>";
$phi = 3.14;
function luas_lingkaran2($jarijari)
{ //target
    global $phi;
    $hasil1 = $phi * $jarijari * $jarijari;
    return $hasil1;
}
  
echo luas_lingkaran2(10) . "<br>";
echo "<hr>";
define('PHI', 3.14);
function luas_lingkaran3($jarijari)
{ //target
    $hasil2 = PHI * $jarijari * $jarijari;
    return $hasil2;
}
  
echo luas_lingkaran3(10) . "<br>";
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