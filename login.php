<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <form method='POST'>
        <input type="text" placeholder="Vorname" name="vorname1"><br>
        <input type="text" placeholder="Nachname" name="nachname1"><br>
        <input type="password" placeholder="Passwort" name="passwort"><br>
        <input type="submit" name="einloggen" value="Einloggen">
</form>

<?php

    

    function datenbankVerbindung(){ 

    $vorname  = $_POST['vorname1'];
    $nachname  = $_POST['nachname1'];
    $passwort  = $_POST['passwort'];    


    //Datenbank connection
    $servername = "localhost";
    $username="root";
    $password ="root";
    $dbname= "onlineshop_db";

    $conn = new mysqli($servername,$username,$password,$dbname);
    if($conn->connect_error){
        die("Connection failed".$conn->connect_error);
    }

    $sql = "SELECT * FROM onlineshop_db WHERE $vorname = onlineshop_db.vorname AND $nachname = onlineshop_db.nachname"

    if($conn->query($sql)=== TRUE){
        echo "Keine Probleme!";
    }else{
        echo "Error im System ".$sql. $conn->error;
    }

    }


?>
</body>
</html>