<?php
//la function qui va nous permettre de supprimer un ami
function supprimer_amis()
{
	mysqli_query(get_mysqli(), "
	DELETE FROM amis WHERE (pseudo_exp='{$_SESSION['pseudo']}' AND pseudo_dest='{$_GET['pseudo']}')
	OR  (pseudo_exp='{$_GET['pseudo']}' AND pseudo_dest='{$_SESSION['pseudo']}')
	");
}
?>

