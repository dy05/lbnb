<?php
//la function qui va recuperer les messages
function recup_message()
{
$messages = array();
$sql = mysqli_query(get_mysqli(), "
SELECT conversations_messages.date_message,
conversations_messages.corps_message,
conversations.sujet_conversation,
utilisateurs.pseudo,
utilisateurs.avatar
FROM conversations_messages
INNER JOIN utilisateurs ON utilisateurs.pseudo = conversations_messages.pseudo_exp
INNER JOIN conversations_members ON conversations_messages.id_conversation = conversations_members.id_conversation
INNER JOIN conversations ON conversations_messages.id_conversation = conversations.id_conversation
WHERE conversations_messages.id_conversation = '{$_GET['id']}'
AND conversations_members.pseudo_dest = '{$_SESSION['pseudo']}'
ORDER BY conversations_messages.date_message DESC
") or die(mysqli_error());

	while($row = mysqli_fetch_assoc($sql))
	{
			$messages[] = $row;
	}
		return $messages;
}
?>

