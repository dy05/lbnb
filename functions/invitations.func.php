<?php
//la function qui va recuperer les invitations
function recup_invitations()
{
	$query = mysql_query("
	SELECT pseudo_exp,date_invitation,active,avatar
	FROM amis
	INNER JOIN utilisateurs ON utilisateurs.pseudo = amis.pseudo_exp
	WHERE pseudo_dest = '{$_SESSION['pseudo']}'
	ORDER BY date_invitation DESC
	");
	$results = array();
	while($row = mysql_fetch_assoc($query))
	{
		$results[] = $row;
	}
		return $results;
}
//la function qui va nous permettre d'afficher à l'utilisateur si sa demande a été acceptée
function invitation_acceptee()
{
	$query = mysql_query("
	SELECT pseudo_dest FROM amis WHERE pseudo_exp='{$_SESSION['pseudo']}' AND active=1
	");
	$results = array();
	while($row = mysql_fetch_assoc($query))
	{
		$results[] = $row;
	}
		return $results;
}
?>
