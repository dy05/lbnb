<?php

//la function qui va verifier la combinaison pseudo/password

function verifier_combinaison_pseudo_password($pseudo,$password)
{
	$pseudo = mysqli_real_escape_string(htmlentities($_POST['pseudo']));
	$password = mysqli_real_escape_string(htmlentities($_POST['password']));
	$password = sha1($password);
	
	$query = mysqli_query(get_mysqli(), "SELECT pseudo,password FROM utilisateurs
	
	WHERE pseudo='$pseudo' AND password='$password'
	");
	
	$rows = mysqli_num_rows($query);
	return $rows;
}
?>

