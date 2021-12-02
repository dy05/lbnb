<?php
//la function qui va modifier l'article
function supprimer_article()
{
	mysql_query("
	DELETE FROM articles WHERE (id_article='{$_GET['id']}')
	");
}
supprimer_article();
header("Location:index.php?page=actu");
?>