<?php
include('body/header.php');
include('body/menu.php');
if(isset($_SESSION['pseudo'])){
$infos = infos_membre_connecte();
	foreach($infos as $info)
{
	$avatar == $info['avatar'];
}
}else{
	$avatar == 'defaut.png'
}
?>
<?php
$articles = afficher_articles();
foreach($articles as $article){
?>

<div class="row">
<div class="span8">
<h2>ACTUALITES</h2>
				
<div class="panel panel-default">
<div class="panel-heading"><h4 style="margin:0px;"><?php echo $article['title']; ?></h4><span class="pull-right"><?php
if (isset($_SESSION['pseudo']) && $_SESSION['pseudo'] == $admin) {
?>

<a href="index.php?page=delete&id=<?php echo $article['id_article']; ?>">X</a>
<?php
}
?>
</span></div>
<div class="panel-body">
<?php echo $article['corps']; ?>
<br><br>
<a href="http://www.lbnb.net/index.php?article=" target="_blank">
<img src="avatar/<?php echo $article['avatar']; ?>" alt="<?php echo $article['titre']; ?>" border="0" height="250" width="300"></a><br>
<br>
Merci</div>
<div class="panel-footer">
<span class="glyphicon icon-calendar"></span>
   <?php
    $mois = array(1=>'janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');
    $jours = array('dimanche', 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi');
    echo"Le : ".date('.$jours[date('w')].''.date('j').' '.$mois[date('n')].' '.date('Y')',strtotime($article['date']));
?>
<a href="http://www.lbnb.net/index.php?page=article&article=<?php echo $article['id_article']; ?>" class="btn btn-info btn-mini pull-right" style="margin-left: 10px;"><span class="glyphicon glyphicon-eye-open"></span> Lire l'article</a>
<span class="pull-right"><span class="glyphicon glyphicon-comment"></span>  commentaires</span>
</div>
</div>
</div>

}
?>
<?php

$commentaires = afficher_commentaires();
foreach($commentaires as $commentaire){
echo "Publié par ".$commentaire['pseudo']."<br/>";
echo $commentaire['corps']."<br/>";
echo "Le : ".date('d/m/Y à H:i:s',strtotime($commentaire['date']))."<br/>";
echo ".........................................................................<br/><br/>";

}
}

if(isset($_POST['submit'])){

$pseudo = htmlspecialchars(trim(mysql_real_escape_string($_POST['pseudo'])));
$commentaire = htmlspecialchars(trim(mysql_real_escape_string($_POST['commentaire'])));


if(empty($pseudo) || empty($commentaire)){
echo "Veuillez saisir tous les champs";
}else{
inserer_commentaire($pseudo,$commentaire);
header("Location:inserer.php?id={$_GET['id']}");
}
}
?>
<hr/>
<form method="post" action="">
<label for="pseudo">Votre pseudo:</label><br/>
<input type="text" name="pseudo"/><br/>

<label for="commentaire">Votre commentaire:</label><br/>
<textarea name="commentaire" cols="20" rows="7" placeholder="Rien à signaler"></textarea><br/><br/>

<input type="submit" name="submit" value="Commenter"/>

</form>