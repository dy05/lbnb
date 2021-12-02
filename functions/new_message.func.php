<?php
//la function qui va nous permette de verifier si le pseudo existe et si la personne n'essaye pas de s'auto envoyer un message
function pseudo_incorrect()
{
	$query = mysqli_query(get_mysqli(), "
	SELECT COUNT(pseudo) FROM utilisateurs WHERE pseudo='{$_GET['pseudo']}' AND pseudo != '{$_SESSION['pseudo']}'
	");
	return mysqli_result($query,0);
}
//la function qui va creer la conversation et le message qui va av�c
function creer_conversation($sujet,$message)
{
	mysqli_query(get_mysqli(), "
	INSERT INTO conversations(id_conversation,sujet_conversation)
	VALUES('','{$sujet}')
	") or die(mysqli_error());
	$id_conversation = mysqli_insert_id();
	mysqli_query(get_mysqli(), "INSERT INTO conversations_messages(id_conversation,pseudo_exp,corps_message,date_message)
	VALUES('{$id_conversation}','{$_SESSION['pseudo']}','{$message}',NOW())") or die(mysqli_error());
	mysqli_query(get_mysqli(), "
	INSERT INTO conversations_members(id_conversation,pseudo_dest)
	VALUES('{$id_conversation}','{$_GET['pseudo']}')
	")or die(mysqli_error());
}
?>
