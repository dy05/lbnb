<?php
//la function qui va refuser l'invitation
function refuser_invitation()
{
	mysql_query("
	DELETE FROM amis WHERE pseudo_exp='{$_GET['pseudo']}' AND pseudo_dest='{$_SESSION['pseudo']}'
	");
}
?>

