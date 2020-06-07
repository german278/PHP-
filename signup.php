<?php

session_start();
$pdo = new PDO('mysql:host=localhost;dbname= test', 'root', '');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrieren</title>
</head>
<body>
    
<?php
$showformular = true;

if(isset($_GET['register'])){
    $error = false;
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        echo 'Bitte gultige Email eingeben';
        $error = true;
    }
    if(strlen($password) == 0){
        echo 'Bitte Passwort eingeben';
        $error = true;

    }
    if($password!= $password2){
        echo 'Ihr passwort stimmt nicht uberein';
        $error = true;
    
    }

    //Prufen ob email registiriert wurde
    if(!error){
        $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $result = $statement-> execute(array('email' => $email));
        $user = $statement->fetch();
        if($user!=false){
            echo 'Diese E-Mail wird bereits genutzt';
            $error = true;
        }
    }
    if(!error){
        $password_hash = password_hash($password, PASSWORD_DEFAULT);


        $statement = $pdo->prepare("INSERT INTO users(email, password) VALUES (:email, password)");
        $result = $statement-> execute(array('email' => $email, 'password' => $password_hash));

        if($result){
            echo 'Du wurdest erfolgreich registriert <a href = "login.php">Zum Login</a>';
            $showformular = false;

        }else{
            echo 'Es ist ein Fehler aufgetreten, bitte kontaktieren Sie den Support'; 

        }
    }
    
}
if($showformular){
    
?>

<form action="?register=1" method="post">
E-Mail:<br>
<input type="email" size="40" maxlength="250" name="email"><br><br>
 
Dein Passwort:<br>
<input type="password" size="40"  maxlength="250" name="password"><br>
 
Passwort wiederholen:<br>
<input type="password" size="40" maxlength="250" name="password2"><br><br>
 
<input type="submit" value="Abschicken">
</form>

<?php
}
?>

</body>
</html>