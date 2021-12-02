<?php
include('body/menu.php');
include('body/header.php');
if (!isset($_SESSION['pseudo'])) {
	header("Location:index.php?page=actu");
}
?>
<div class="row"><div class="span6 register alert alert-info">
<h3>Envoyer un message </h3>
<?php

	if(isset($_GET['pseudo']) && !empty($_GET['pseudo']) && pseudo_incorrect() === "1")
	{
			if(isset($_POST['submit']))
			{
				$sujet = mysql_real_escape_string(htmlentities(trim($_POST['sujet'])));
				$message = mysql_real_escape_string(htmlentities(trim($_POST['message'])));
					if(!empty($sujet) && !empty($message))
					{
						 creer_conversation($sujet,$message);
						 ?>
							<div class='alert alert-success'>Votre message a bien été envoyé</div>
						 <?php
					}
			}
	}else{
		header("Location:index.php?page=membre");
	}
?>
<form method='post' action=''>
<label for='a'>à : </label>
<input type="text" name='a' id='a' value='<?php echo $_GET['pseudo']; ?>' disabled='disabled'><br />
<label for='sujet'>Sujet  : </label>
<input type="text" name="sujet" id='sujet' required><br />
<label for='message'>Votre message : </label>
<textarea rows='6' cols='30' name='message' id='message' required></textarea><br /><br />
<input type='submit' class="btn btn-primary" value="Envoyer" name='submit'> 
</form>
</div></div>