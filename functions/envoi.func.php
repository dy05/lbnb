<?php
//la function qui va enregister l'invitation dans la bdd
function enreg_invitation()
{
	$query = mysql_query("
	INSERT INTO amis(id_invitation,pseudo_exp,pseudo_dest,date_invitation,date_confirmation,date_vue,active)
	VALUES
	('','{$_SESSION['pseudo']}','{$_GET['pseudo']}',NOW(),NOW(),NOW(),0)
	");
}
?>
