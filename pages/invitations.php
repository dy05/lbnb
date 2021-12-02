<?php
include('body/menu.php');
include('body/header.php');
if (!isset($_SESSION['pseudo'])) {
	header("Location:index.php?page=actu");
}
?>
<br/>
<br/>
<div class="row">
<div class="span2"></div>
<div class="span7 register alert alert-info">
<h2>Vos invitations</h2>
<?php

$invitations = recup_invitations();
$invitations_acceptees = invitation_acceptee();
	if($invitations == true)
	{
			foreach($invitations as $invitation)
			{
					if($invitation['active'] == 0)
					{
					?>
							
							<div class="thumbnail">
							<img src='avatar/<?php echo $invitation['avatar']; ?>' class="picture_avatar" alt='avatar'>
							<br/><br/><div class='alert-error'><center>
							<?php echo $invitation['pseudo_exp']; ?> a voulu vous ajouter comme ami(e)<br />
							<a class="btn btn-primary" href='index.php?page=accepter&pseudo=<?php echo $invitation['pseudo_exp'];?>'>Accepter </a> | <a class="btn btn-primary" href='index.php?page=refuser&pseudo=<?php echo $invitation['pseudo_exp'];?>'> Refuser</a></center>
							</div></div><hr>
					<?php
					}else{
						?>
							<div class='alert alert-success'>Vous êtes désormais ami(e) avec <?php echo $invitation['pseudo_exp'] ;?></div>
						<?php
					}
			}
	}else if($invitations_acceptees == true){
			foreach($invitations_acceptees as $invitation_acceptee)
			{
				update_date_vue();
				?>
					<div class='alert alert-success'><?php echo $invitation_acceptee['pseudo_dest']; ?> a accepté votre invitation</div>
				<?php
			}
	}
	else{
		?>
				<div class='alert alert-danger'>Vous n'avez pas d'invitations</div>
		<?php
	}	
?>

</div>