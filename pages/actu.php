<!--
je dois modifier dans la base de dans la base de données de articles et augmenter avatar

\
-->


<?php
include('body/header.php');
include('body/menu.php');
if(isset($_POST['submit'])){

$nom = $_POST['nom'];
$title = $_POST['title'];
$article = $_POST['article'];
$avatar = $_FILES['avatar']['name'];
$avatar_tmp = $_FILES['avatar']['tmp_name'];
if(!empty($avatar))
	{
	$image_ext = strtolower(end(explode('.',$avatar)));
	if(in_array($image_ext,array('jpg','jpeg','png','gif')))
	{
	inserer_acticle($nom,$title,$article,$avatar_tmp,$avatar);
	header("Location:index.php?page=actu");
	}else{
	echo"<div class='error'>Veuillez saisir une image valide</div>";
	}
}else{
	$imge = "nouveau.png";

	inserer($nom,$title,$article,$imge);
	header("Location:index.php?page=actu");
}
}
?>

<?php
if (isset($_SESSION['pseudo'])) {
$infos = admin();
foreach($infos as $info)
{
if($info['admin'] == '1'){
	$admin == $info['nom'];
?>
<div class="admin">
<form method="post" action="" enctype='multipart/form-data'>
<input type="file" class="input-block pull-right" name="avatar"><br/>
<label for='nom'>Publié en tant que:</label>
<input type="text" name="nom" value='<?php echo $admin; ?>' required>
<!-- <b class="icon-chevron-right"></b>

  Ou tapez le nom de celui ou celle qui a fait(e) la requête! 

<i>*Mettez <u><b>Anonyme</b></u> au cas où la personne ne veut pas divulguer son identité!</i>


<input type="text" name="nom" class="input-block-level" placeholder="Le nom du publieur #Anonyme"><br/>


-->
<br/>
<label for="title">Le titre :</label>
<input type="text" name="title" class="input-block-level" placeholder="Donnez le nom du titre de l'article" required><br/>
<label for="article">Votre article :</label><br/>
<textarea name="article" cols="45" rows="7" required></textarea>
<br/><br/>
<input type="submit" name="submit" class="btn btn-primary" value="Poster"/>
</form>
</div>
<?php
	}
}}
?>
<div class="row">
<div class="span2"></div>
<div class="span7 register alert alert-info">
<h2>ACTUALITES</h2>			
<?php
$articles = afficher_articles();
foreach($articles as $article){
?>
<div class="panel panel-default">
<div class="panel-heading"><h4 style="margin:0px;">
<?php echo $article['title']; ?></h4></div><span class="pull-right">
<?php
if (isset($_SESSION['pseudo'])) {
$infos = admin();
foreach($infos as $info)
{
if($info['admin'] == '1'){
	$admin == $info['nom'];
?>
<a href="index.php?page=delete&id=<?php echo $article['id_article']; ?>">X</a>
<?php
}}}
?>
</span>
<div class="panel-body">		
<div class="console">
<?php echo $article['corps']; ?>
</div><br><br>
<a href="index.php?page=article&article=<?php echo $article['id_article']; ?>" target="_blank">
<img src="images/<?php echo $article['avatar']; ?>" alt="<?php echo $article['title']; ?>" border="0" height="250" width="300"></a><br>
<br/>
<div class="cop"> Publié par <strong>
	<?php echo $article['pseudo']; ?></strong>
</div>
Merci</div>
<div class="panel-footer">
<span class="icon-calendar"></span>
<?php
    echo "le : ".date('d/m/Y',strtotime($article['date']));
?>
<a href="index.php?page=article&article=<?php echo $article['id_article']; ?>" class="btn btn-info btn-mini pull-right" style="margin-left: 10px;"><span class="icon-eye-open"></span> Lire l'article</a>
<span class="pull-right"><b class="icon-comment"></b>  commentaires</span>
</div>
</div>
<?php
}
?>



<div class="fb-like-box" data-href="https://www.facebook.com/lbnbsite" data-width="400" data-height="400" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
<br/>
</div>
</div>