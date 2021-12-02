<?php
//la function qui changer les informations du member

function changer_informations_member($email,$situation,$apropos)
{
	$query = mysqli_query(get_mysqli(), "UPDATE utilisateurs SET email='$email',situation='$situation',apropos='$apropos'
	WHERE pseudo='{$_SESSION['pseudo']}'
	") or die(mysqli_error());
}
?>

