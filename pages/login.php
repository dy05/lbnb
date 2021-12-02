<?php
include('body/menu.php');
include('body/header.php');
?>
<div class="row"><div class="span6 register alert alert-info">
<?php
if (!isset($_SESSION['pseudo'])) {
?>
<h1>Connexion</h1>
<?php

	if(isset($_POST['submit']))
	{	
				if(verifier_combinaison_pseudo_password($_POST['pseudo'],$_POST['password']) == 0)
				{
					echo"<div class='error'>Pseudo ou password incorrect</div>";
				}else{
					$_SESSION['pseudo'] = $_POST['pseudo'];
					header("Location:index.php?page=actu");
				}
	}
?>
<form method="POST" action="">
	<label for="pseudo">Votre pseudo : </label>
	<input type="text" name="pseudo" required autofocus>
	<label for="password">Votre mot de passe : </label>
	<input type="password" name="password" required><br />
	<input type="submit" value="Se connecter" class="btn btn-primary" name="submit">
</form>
<?php
}else{
	header("Location:index.php?page=actu");
	$_SESSION['pseudo'] == $_POST['pseudo'];
}

?>
</div>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-like span3"></div>


</div>
