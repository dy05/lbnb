<?php
//la function qui va recuperer les infos de l'utilisateur connecté
if(isset($_SESSION['pseudo'])){
function infos_membre_connecte()
{
$infos = array();
$pseudo = $_SESSION['pseudo'];
$query = mysql_query("SELECT * FROM utilisateurs WHERE pseudo = '$pseudo'");

while($row = mysql_fetch_assoc($query))
{
	$infos[] = $row;
}
	return $infos;

}}
// la function qui va compter le nombre de personnes inscrites
function nombre_membre()
{
	$query = mysql_query("SELECT COUNT(id) FROM utilisateurs");
	return mysql_result($query,0);
}
?>