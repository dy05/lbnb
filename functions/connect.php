<?php
session_start();
//connexion � la base de donn�es
mysql_connect('192.162.70.23','LBNb','aafqIUG') or die('error');
mysql_select_db('Khj52Ut') or die('Bdd introuvable');
mysql_query('SET utf8');
?>