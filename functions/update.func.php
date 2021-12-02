<?php
//la function qui changer les informations du membre

function changer_informations_membre($email,$situation,$apropos)
{
	$query = mysql_query("UPDATE utilisateurs SET email='$email',situation='$situation',apropos='$apropos'
	WHERE pseudo='{$_SESSION['pseudo']}'
	") or die(mysql_error());
}
?>

