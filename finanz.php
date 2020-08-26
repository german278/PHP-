<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method='POST'>
    <input type="text" placeholder="Geld einzahlen" name="einzahlen"><br>
    <input type="text" placeholder="Geld auszahlen" name="auszahlen"><br>
    <input type="submit" value = "Abschicken" name = "abschicken"><br>
</form>


<?php
$geldEinzahlen = $_POST['einzahlen'];
$geldAuszahlen = $_POST['auszahlen'];

$neuerKontostand = $neuerKontostand + $geldEinzahlen;

for($i=0; $i<= $neuerKontostand; $i++){
    echo $neuerKontostand;
    if($geldEinzahlen > 100){
        echo "Sie haben mehr als 100 EURO eingezahlt"."<br>";
        echo "Ihr neuer Kontostand ist ".$neuerKontostand."<br>";
        break;
    }else if ($geldAuszahlen < 100 ){
        $kontostand = 0;
        echo "Sie haben weniger als 100EURO ausgezahlt "."<br>";
        $kontostand = $kontostand - $geldEinzahlen;
        echo "Ihr neuer Kontostand ist ".$kontostand;
        break;
    }
    else{
        echo "Sie haben weniger als 100 EURO eingezahlt, das geht nicht";
        break;
    }

}




    echo "derzeitiger Kontostand > ". $neuerKontostand." EURO". "<br>";

?>
</body>
</html>