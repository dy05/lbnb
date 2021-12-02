<?php
//la function qui va recuperer la liste d'amis de l'expediteur
function liste_amis_exp()
{
	$results = array();
	$query = mysql_query("
	SELECT pseudo_dest,avatar FROM amis
	INNER JOIN utilisateurs ON utilisateurs.pseudo = amis.pseudo_dest
	WHERE pseudo_exp='{$_SESSION['pseudo']}' AND active=1
	");
	while($row = mysql_fetch_assoc($query))
	{
		$results[]=$row;
	}
		return $results;
}	
//la function qui va recuperer la liste d'amis du destinataire
function liste_amis_dest()
{
	$results = array();
	$query = mysql_query("
	SELECT pseudo_exp,avatar FROM amis
	INNER JOIN utilisateurs ON utilisateurs.pseudo = amis.pseudo_exp
	WHERE pseudo_dest='{$_SESSION['pseudo']}' AND active=1
	");
	while($row = mysql_fetch_assoc($query))
	{
		$results[]=$row;
	}
		return $results;
}
?>

