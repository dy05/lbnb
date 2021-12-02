<?php

session_start();

//connexion à la base de données
$mysqli = new mysqli('localhost', 'root', '', 'lbnb');

// check connection
if ($mysqli->connect_errno) {
    die('Failed to connect to MySql: ' . $mysqli->connect_error);
}

/*
// Perform query
if ($result = $mysqli->query("SELECT * FROM utilisateurs")) {
    foreach ($result->fetch_assoc() as $key => $value) {
        echo $key . ' >>> ' . $value . '<br/>';
    }
    $mysqli->close();
}
//*/

/*
try{
    $pdo = new PDO('mysql:host=localhost;dbname=lbnb','root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
} catch (PDOException $e) {
    die('Erreur de connexion a la base de donnees. Error: ' . $e->getMessage());
}
//*/
