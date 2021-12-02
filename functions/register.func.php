<?php
// la function qui va se charger d'inscrire l'utilisateur
function inscrire_utilisateur($pseudo,$nom,$password,$email,$sexe,$age,$situation,$apropos)
{
if ($sexe != 'Femme') {
	$avatar = "homme.png";
}else{
	$avatar = "femme.png";
}
$password = sha1($password);
mysql_query("INSERT INTO utilisateurs(id,pseudo,nom,password,email,sexe,age,situation,apropos,avatar,admin)
VALUES('','$pseudo','$nom','$password','$email','$sexe','$age','$situation','$apropos','$avatar','0')

") or die(mysql_error());
}

//la function qui va verifier si pseudo existe

function pseudo_existe($pseudo)
{
	$query = mysql_query("SELECT COUNT(id) FROM utilisateurs WHERE pseudo='$pseudo'");
	return mysql_result($query,0);
}

//la function qui va verifier si l'email existe

function email_existe($email)
{
	$query = mysql_query("SELECT COUNT(id) FROM utilisateurs WHERE email='$email'");
	return mysql_result($query,0);
}
?>