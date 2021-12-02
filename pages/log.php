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