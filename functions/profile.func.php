<?php
//la function qui va recuperer les informations de la personne choisie par l'utilisateur
function get_auth_user()
{
	$results = array();
	$pseudo = mysqli_real_escape_string(htmlentities($_GET['pseudo']));
	$query = mysqli_query(get_mysqli(), "SELECT * FROM utilisateurs WHERE pseudo='$pseudo'");
	while($row = mysqli_fetch_assoc($query))
	{
		$results[] = $row;
	}
		return $results;
}
//la function qui va verifier si une demande existe entre les deux members
function demande_existe()
{
	$query = mysqli_query(get_mysqli(), "SELECT COUNT(id_invitation) FROM amis
	WHERE (pseudo_exp = '{$_SESSION['pseudo']}' AND pseudo_dest='{$_GET['pseudo']}')
	OR
	(pseudo_exp ='{$_GET['pseudo']}' AND pseudo_dest='{$_SESSION['pseudo']}')
	");
	return mysqli_result($query,0);
}

//la function qui va verifier si le destinataire a accept� la demande
function accepter_demande()
{
	$query = mysqli_query(get_mysqli(), "
	SELECT active FROM amis WHERE (pseudo_exp = '{$_SESSION['pseudo']}' AND pseudo_dest = '{$_GET['pseudo']}')
	OR
	(pseudo_exp = '{$_GET['pseudo']}' AND pseudo_dest = '{$_SESSION['pseudo']}') 
	
	");
	while($row = mysqli_fetch_assoc($query))
	{
		if($row['active'] == 0)
		{
			return false;
		}else{
			return true;
		}
	}
}
//la function qui va verifier si le member connect� est l'expediteur
function verifier_expediteur()
{
	$query = mysqli_query(get_mysqli(), "
	SELECT COUNT(id_invitation) FROM amis WHERE pseudo_exp = '{$_SESSION['pseudo']}'
	AND pseudo_dest='{$_GET['pseudo']}'
	");
	return mysqli_result($query,0);
}
?>
