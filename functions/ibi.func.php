<?php
//la function qui va nous permettre d'afficher l'info-bulle des invitations
if(isset($_SESSION['pseudo'])){
function afficher_ibi()
{
	$query = mysqli_query(get_mysqli(), "
	SELECT COUNT(id_invitation) FROM amis WHERE (pseudo_dest='{$_SESSION['pseudo']}' AND date_invitation = date_confirmation)
	OR (pseudo_exp='{$_SESSION['pseudo']}' AND date_confirmation > date_vue)
	");
	return mysqli_result($query,0);
}
//la function qui va nous permettre de mettre � jour la date_vue dans la bdd pour pouvoir cacher l'info-bulle 
function update_date_vue()
{
	mysqli_query(get_mysqli(), "
	UPDATE amis SET date_vue=NOW() WHERE pseudo_exp='{$_SESSION['pseudo']}' AND active=1
	");
}
}
?>

