<?php
//la function qui va nous permette de verifier si le pseudo existe et si la personne n'essaye pas de s'auto envoyer un message
function pseudo_incorrect()
{
	$query = mysql_query("
	SELECT COUNT(pseudo) FROM utilisateurs WHERE pseudo='{$_GET['pseudo']}' AND pseudo != '{$_SESSION['pseudo']}'
	");
	return mysql_result($query,0);
}
//la function qui va creer la conversation et le message qui va avéc
function creer_conversation($sujet,$message)
{
	mysql_query("
	INSERT INTO conversations(id_conversation,sujet_conversation)
	VALUES('','{$sujet}')
	") or die(mysql_error());
	$id_conversation = mysql_insert_id();
	mysql_query("INSERT INTO conversations_messages(id_conversation,pseudo_exp,corps_message,date_message)
	VALUES('{$id_conversation}','{$_SESSION['pseudo']}','{$message}',NOW())") or die(mysql_error());
	mysql_query("
	INSERT INTO conversations_membres(id_conversation,pseudo_dest)
	VALUES('{$id_conversation}','{$_GET['pseudo']}')
	")or die(mysql_error());
}
?>