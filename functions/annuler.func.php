<?php
//la function qui va supprimer l'invitation
function supprimer_invitation()
{
	mysqli_query(get_mysqli(), "
	DELETE FROM amis WHERE pseudo_exp='{$_SESSION['pseudo']}' AND pseudo_dest='{$_GET['pseudo']}'
	");
}
?>
