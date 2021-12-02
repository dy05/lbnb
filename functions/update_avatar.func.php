<?php
//la function qui va changer l'image de profile du membre
function modifier_image_profile($avatar_tmp,$avatar)
{
	move_uploaded_file($avatar_tmp,'avatar/'.$avatar);
	mysql_query("
	
	UPDATE utilisateurs SET avatar='{$_FILES['avatar']['name']}' WHERE pseudo='{$_SESSION['pseudo']}'
	
	");
}
?>