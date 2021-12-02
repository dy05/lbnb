<?php
include('body/menu.php');
include('body/header.php');
if (!isset($_SESSION['pseudo'])) {
	header("Location:index.php?page=actu");
}
?>
<div class="row">
<div class="span2"></div>
<div class='span7 register alert alert-info'>

<?php
$infos_membres_choisis = recuperer_info_membre_choisi();
if($infos_membres_choisis == true && $_GET['pseudo'] != $_SESSION['pseudo'])
{
	foreach($infos_membres_choisis as $info_membre_choisi)
{
			if(demande_existe() == 0)
			{
				?>
						<div class='alert alert-error'>Vous n'êtes pas ami(e) avéc <?php echo $info_membre_choisi['pseudo'];?><br />
						<a href='index.php?page=envoi&pseudo=<?php echo $info_membre_choisi['pseudo']; ?>'>Envoyer une invitation</a>
						</div>
				<?php
			}else if(accepter_demande() == 0 && verifier_expediteur() == 1){
			
						?>
								<div class='alert alert-success'>Demande envoyée<br />
								<a href='index.php?page=annuler&pseudo=<?php echo $info_membre_choisi['pseudo']; ?>'>Annuler la demande</a>
								</div>
						<?php
			}else if(accepter_demande() == 0 && verifier_expediteur() == 0){
						?>
								<div class='alert alert-danger'>Demande en cours!!<br />
								"Verifiez vos invitations"
								</div>
						<?php
			}else{
		?>
						<img src="avatar/<?php echo $info_membre_choisi['avatar']; ?>" class="picture_avatar" alt='avatar'><br/><br/>
						<p><strong>Pseudo</strong> : <em><?php echo $info_membre_choisi['pseudo']; ?></em></p>
						<p><strong>Noms</strong> : <em><?php echo $info_membre_choisi['nom']; ?></em></p>
						<p><strong>Email</strong> : <em><?php echo $info_membre_choisi['email']; ?></em></p>
						<p><strong>Sexe</strong> : <em><?php echo $info_membre_choisi['sexe']; ?></em></p>
						<p><strong>Situation</strong> : <em><?php echo $info_membre_choisi['situation']; ?></em></p>
						<p><strong>Â propos de vous</strong> : <em><?php echo $info_membre_choisi['apropos']; ?></em></p><br /><br />
						<a href='index.php?page=supprimer_amis&pseudo=<?php echo $info_membre_choisi['pseudo']; ?>' class='alert-error'>Retirer <?php echo $info_membre_choisi['pseudo']; ?> de votre liste d'amis</a>
						<br/><br/><p><a class="btn btn-primary" href='index.php?page=new_message&pseudo=<?php echo $_GET['pseudo']; ?>'>Envoyer un message</a></p>
						
		<?php
			}
}
}else{
	header("Location:index.php?page=membre");
}
?>

</div>
</div>
