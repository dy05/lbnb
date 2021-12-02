<?php
//la function qui va recupere le pseudo et l'avatar du member sauf de celui connect�
function get_pseudo_avatar()
{
	$results = array();
	$query = mysqli_query(get_mysqli(), "SELECT pseudo,avatar FROM utilisateurs WHERE pseudo!='{$_SESSION['pseudo']}'");
	while($row = mysqli_fetch_assoc($query))
	{
		$results[] = $row;
	}
		return $results;
}
?>

