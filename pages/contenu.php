<?php
include('body/menu.php');
include('body/header.php');
?>
<?php
//la function qui va nous permettre de supprimer un commentaire
function supprimer_commentaire()
{
	mysql_query("
	DELETE FROM commentaires WHERE (pseudo='{$_SESSION['pseudo']}' AND id_commentaire='{$_GET['pseudo']}')
	OR  (pseudo_exp='{$_GET['pseudo']}' AND pseudo_dest='{$_SESSION['pseudo']}')
	");
}
?>
<div class="comment">

<h1><a href="javascript:history.back()">Page précédente</a> </h1>

<?php
$articles = afficher_articles();
foreach($articles as $article){
echo "<p id='article'><u><h2>Article:</h2>".$article['corps']."</p><br/>";
?>
<hr/>
<?php

$commentaires = afficher_commentaires();
foreach($commentaires as $commentaire){
echo "<p id='comment_man'>Publié par <u>".$commentaire['pseudo']."</u></p><br/><br/><p id='comment'>". $commentaire['corps']."<br/></p>";
if (isset($_SESSION['pseudo'])) {
if ($_SESSION['pseudo'] == $admin) {
echo"
 Le : ".date('d/m/Y à H:i:s',strtotime($commentaire['date']))."<br/>";
}}
}
}

if(isset($_POST['submit'])){

$pseudo = htmlspecialchars(trim(mysql_real_escape_string($_POST['pseudo'])));
$commentaire = htmlspecialchars(trim(mysql_real_escape_string($_POST['commentaire'])));


inserer_commentaire($pseudo,$commentaire);
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

<label for="commentaire">Votre commentaire:</label><br/>
<textarea name="commentaire" cols="20" rows="7" placeholder="Rien à signaler"autofocus required></textarea><br/><br/>

<input type="submit" name="submit" value="Commenter"/>

</form>

</div>