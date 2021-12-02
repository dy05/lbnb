<?php
include('body/menu.php');
include('body/header.php');
?>
<div class="row"><div class="span11 text-center"><h3>
<a href="javascript:history.back()">Retour a la page précédente</a></h3>
</div>
<div class="span1"></div>
<div class="span8 register alert alert-info">
<?php
$articles = show_articles();
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
</div><br/><br/>
<img src="images/<?php echo $article['avatar']; ?>" alt="<?php echo $article['title']; ?>" border="0" height="250" width="300"></a><br>
<br>
<div class="cop">
Publié par <strong>
	<?php echo $article['pseudo']; ?></strong>
</div>Merci</div>
<div class="panel-footer">
<span class="icon-calendar"></span>
<?php
    echo "le : ".date('d/m/Y',strtotime($article['date']));
?>
<span class="pull-right"><b class="icon-comment"></b>  comments</span>
</div>
</div>
<?php
//la function qui va nous permettre de supprimer un comment
function supprimer_comment()
{
	mysqli_query(get_mysqli(), "DELETE FROM comments WHERE (pseudo='{$_SESSION['pseudo']}' AND id_comment='{$_GET['pseudo']}')
	OR  (pseudo_exp='{$_GET['pseudo']}' AND pseudo_dest='{$_SESSION['pseudo']}')
	");
}
$comments = show_comments();
foreach($comments as $comment){
echo "<div class='alert alert-error'><strong>".$comment['pseudo']."</strong><br/><span>". $comment['corps']."</span></div><br/>";
}
if(isset($_POST['submit'])){
$pseudo = htmlspecialchars(trim(mysqli_real_escape_string($_POST['pseudo'])));
$comment = htmlspecialchars(trim(mysqli_real_escape_string($_POST['comment'])));
add_comment($pseudo,$comment);
header("Location:index.php?page=article&article={$_GET['article']}");
}
?>
<hr/>
<div class="alert alert-danger">
<form method="post" action="">
<p style="display:none;">
<label for="pseudo">Votre pseudo:</label><br/>
<input type="text" name="pseudo" value="<?php if (isset($_SESSION['pseudo'])) {
echo $_SESSION['pseudo'];}else{echo"Anonyme";} ?>"/></p><br/>

<label for="comment">Votre comment:</label><br/>
<textarea name="comment" cols="20" rows="7" placeholder="Rien à signaler" required></textarea><br/><br/>

<input type="submit" name="submit" class="btn btn-primary" value="Commenter"/>

</form>

</div>
<?php
}
?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>




<div class="fb-like-box" data-href="https://www.facebook.com/lbnbsite" data-width="400" data-height="400" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
<br/>

</div>

</div>
