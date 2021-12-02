<?php

//la function qui va verifier la combinaison pseudo/password

function verifier_combinaison_pseudo_password($pseudo,$password)
{
	$pseudo = mysql_real_escape_string(htmlentities($_POST['pseudo']));
	$password = mysql_real_escape_string(htmlentities($_POST['password']));
	$password = sha1($password);
	
	$query = mysql_query("SELECT pseudo,password FROM utilisateurs
	
	WHERE pseudo='$pseudo' AND password='$password'
	");
	
	$rows = mysql_num_rows($query);
	return $rows;
}
?>

