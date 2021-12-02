<?php
//la function qui va accepter l'invitation
function accepter_invitation()
{
	mysql_query("
	UPDATE amis SET active=1,date_confirmation=NOW() WHERE pseudo_exp='{$_GET['pseudo']}'
	AND pseudo_dest='{$_SESSION['pseudo']}'
	");
}
?>

