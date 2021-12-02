<?php
//la function qui va recuperer les messages
function recup_message()
{
$messages = array();
$sql = mysql_query("
SELECT conversations_messages.date_message,
conversations_messages.corps_message,
conversations.sujet_conversation,
utilisateurs.pseudo,
utilisateurs.avatar
FROM conversations_messages
INNER JOIN utilisateurs ON utilisateurs.pseudo = conversations_messages.pseudo_exp
INNER JOIN conversations_membres ON conversations_messages.id_conversation = conversations_membres.id_conversation
INNER JOIN conversations ON conversations_messages.id_conversation = conversations.id_conversation
WHERE conversations_messages.id_conversation = '{$_GET['id']}'
AND conversations_membres.pseudo_dest = '{$_SESSION['pseudo']}'
ORDER BY conversations_messages.date_message DESC
") or die(mysql_error());

	while($row = mysql_fetch_assoc($sql))
	{
			$messages[] = $row;
	}
		return $messages;
}
?>

