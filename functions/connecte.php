<?php
session_start();
//connexion à la base de données
try{
    $pdo = new PDO('mysql:host=localhost;dbname=lbnb','root','');
    $pdo = null;
}catch (PDOException $e){
    echo "Erreur de connexion a la base de donnees. Error: ".$e->getMessage()."<br/>";
    die();
}
?>