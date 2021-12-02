<?php
//la function qui va recuperer les conversations
function recup_conversation()
{
	$results = array();
	$sql = mysqli_query(get_mysqli(), "
	SELECT conversations.id_conversation,
					conversations.sujet_conversation,
					utilisateurs.pseudo,
					utilisateurs.avatar,
					conversations_messages.date_message
					FROM conversations
					LEFT JOIN conversations_messages ON conversations.id_conversation = conversations_messages.id_conversation
					INNER JOIN conversations_members ON conversations.id_conversation = conversations_members.id_conversation
					INNER JOIN utilisateurs ON utilisateurs.pseudo = conversations_messages.pseudo_exp
					WHERE pseudo_dest = '{$_SESSION['pseudo']}'
					GROUP BY conversations.id_conversation
					ORDER BY conversations_messages.date_message DESC
	");
	while($row = mysqli_fetch_assoc($sql))
	{
		$results[] = $row;
	}
		return $results;
}
?>

