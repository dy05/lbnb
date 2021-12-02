<?php
//la function qui va recuperer les informations de la personne choisie par l'utilisateur
function recuperer_info_membre_choisi()
{
	$results = array();
	$pseudo = mysql_real_escape_string(htmlentities($_GET['pseudo']));
	$query = mysql_query("SELECT * FROM utilisateurs WHERE pseudo='$pseudo'");
	while($row = mysql_fetch_assoc($query))
	{
		$results[] = $row;
	}
		return $results;
}
//la function qui va verifier si une demande existe entre les deux membres
function demande_existe()
{
	$query = mysql_query("SELECT COUNT(id_invitation) FROM amis
	WHERE (pseudo_exp = '{$_SESSION['pseudo']}' AND pseudo_dest='{$_GET['pseudo']}')
	OR
	(pseudo_exp ='{$_GET['pseudo']}' AND pseudo_dest='{$_SESSION['pseudo']}')
	");
	return mysql_result($query,0);
}

//la function qui va verifier si le destinataire a accepté la demande
function accepter_demande()
{
	$query = mysql_query("
	SELECT active FROM amis WHERE (pseudo_exp = '{$_SESSION['pseudo']}' AND pseudo_dest = '{$_GET['pseudo']}')
	OR
	(pseudo_exp = '{$_GET['pseudo']}' AND pseudo_dest = '{$_SESSION['pseudo']}') 
	
	");
	while($row = mysql_fetch_assoc($query))
	{
		if($row['active'] == 0)
		{
			return false;
		}else{
			return true;
		}
	}
}
//la function qui va verifier si le membre connecté est l'expediteur
function verifier_expediteur()
{
	$query = mysql_query("
	SELECT COUNT(id_invitation) FROM amis WHERE pseudo_exp = '{$_SESSION['pseudo']}'
	AND pseudo_dest='{$_GET['pseudo']}'
	");
	return mysql_result($query,0);
}
?>