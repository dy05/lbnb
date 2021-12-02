<?php
//la function qui va modifier l'article
function supprimer_article()
{
	mysqli_query(get_mysqli(), "
	DELETE FROM articles WHERE (id_article='{$_GET['id']}')
	");
}
supprimer_article();
header("Location:index.php?page=actu");
?>
