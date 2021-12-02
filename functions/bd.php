<?php
session_start();
//connexion à la base de données
mysql_connect('localhost','LBNb','aafqIUG') or die('error');
mysql_select_db('khj52ut') or die('Bdd introuvable');
mysql_query('SET NAMES utf-8');
?>