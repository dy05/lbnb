<?php
//la function qui va recupere le pseudo et l'avatar du membre sauf de celui connecté
function recuperer_pseudo_avatar()
{
	$results = array();
	$query = mysql_query("SELECT pseudo,avatar FROM utilisateurs WHERE pseudo!='{$_SESSION['pseudo']}'");
	while($row = mysql_fetch_assoc($query))
	{
		$results[] = $row;
	}
		return $results;
}
?>

