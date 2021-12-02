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
mysqli_query(get_mysqli(), "INSERT INTO utilisateurs(id,pseudo,nom,password,email,sexe,age,situation,apropos,avatar,admin)
VALUES('','$pseudo','$nom','$password','$email','$sexe','$age','$situation','$apropos','$avatar','0')

") or die(mysqli_error());
}

//la function qui va verifier si pseudo existe

function pseudo_existe($pseudo)
{
	$query = mysqli_query(get_mysqli(), "SELECT COUNT(id) FROM utilisateurs WHERE pseudo='$pseudo'");
	return mysqli_result($query,0);
}

//la function qui va verifier si l'email existe

function email_existe($email)
{
	$query = mysqli_query(get_mysqli(), "SELECT COUNT(id) FROM utilisateurs WHERE email='$email'");
	return mysqli_result($query,0);
}
?>
