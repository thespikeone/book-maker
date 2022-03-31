<?php
$servername = 'mysql-book-maker.alwaysdata.net';
$username = '246204';
$password = 'MOLImoli1';
$dbname = 'book-maker_data';
//On essaie de se connecter
try{
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    //On définit le mode d'erreur de PDO sur Exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
}

/*On capture les exceptions si une exception est lancée et on affiche
 *les informations relatives à celle-ci*/
catch(PDOException $e){
  
}
?>