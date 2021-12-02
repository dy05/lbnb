<?php


//la function qui va supprimer le commentaire
function supprimer_commentaire($pseudo,$commentaire)
{
	mysql_query("
	DELETE FROM commentaires WHERE (id_article='{$_GET['id']}' AND date='{$_GET['date']}')
	");
}
header("Location:index.php?page=amis");
?>