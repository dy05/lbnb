<?php
//la function qui va refuser l'invitation
function refuser_invitation()
{
	mysqli_query(get_mysqli(), "
	DELETE FROM amis WHERE pseudo_exp='{$_GET['pseudo']}' AND pseudo_dest='{$_SESSION['pseudo']}'
	");
}
?>

