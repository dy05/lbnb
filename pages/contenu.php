<?php
include('body/menu.php');
include('body/header.php');
?>
<?php
//la function qui va nous permettre de supprimer un comment
function supprimer_comment()
{
	mysqli_query(get_mysqli(), "
	DELETE FROM comments WHERE (pseudo='{$_SESSION['pseudo']}' AND id_comment='{$_GET['pseudo']}')
	OR  (pseudo_exp='{$_GET['pseudo']}' AND pseudo_dest='{$_SESSION['pseudo']}')
	");
}
?>
<div class="comment">

<h1><a href="javascript:history.back()">Page précédente</a> </h1>

<?php
$articles = show_articles();
foreach($articles as $article){
echo "<p id='article'><u><h2>Article:</h2>".$article['corps']."</p><br/>";
?>
<hr/>
<?php

$comments = show_comments();
foreach($comments as $comment){
echo "<p id='comment_man'>Publié par <u>".$comment['pseudo']."</u></p><br/><br/><p id='comment'>". $comment['corps']."<br/></p>";
if (isset($_SESSION['pseudo'])) {
if ($_SESSION['pseudo'] == $admin) {
echo"
 Le : ".date('d/m/Y à H:i:s',strtotime($comment['date']))."<br/>";
}}
}
}

if(isset($_POST['submit'])){

$pseudo = htmlspecialchars(trim(mysqli_real_escape_string($_POST['pseudo'])));
$comment = htmlspecialchars(trim(mysqli_real_escape_string($_POST['comment'])));


add_comment($pseudo,$comment);
header("Location:index.php?page=contenu&id={$_GET['id']}");
}
?>
<hr/>
<form method="post" action="">
	<p style="display:none;"
<label for="pseudo">Votre pseudo:</label><br/>
<input type="text" name="pseudo" value="<?php if (isset($_SESSION['pseudo'])) {
echo $_SESSION['pseudo'];}else{echo"Anonyme";
} ?>" disable/></p><br/>

<label for="comment">Votre comment:</label><br/>
<textarea name="comment" cols="20" rows="7" placeholder="Rien à signaler"autofocus required></textarea><br/><br/>

<input type="submit" name="submit" value="Commenter"/>

</form>

</div>
