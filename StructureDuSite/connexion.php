<?php

$server = "localhost";
$username = "root";
$password = "";

try{

$idcom = new PDO("mysql:host=$server;dbname=thefocus", $username, $password);
$idcom->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// echo "Connexion reussie";

}

catch(PDOException $e){
    echo"Error de connexion". $e->getMessage();
}

?>