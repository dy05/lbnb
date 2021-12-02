<?php


//la function qui va supprimer le comment
function supprimer_comment($pseudo,$comment)
{
	mysqli_query(get_mysqli(), "
	DELETE FROM comments WHERE (id_article='{$_GET['id']}' AND date='{$_GET['date']}')
	");
}
header("Location:index.php?page=amis");
?>
