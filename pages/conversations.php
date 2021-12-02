<?php
include('body/menu.php');
include('body/header.php');
if (!isset($_SESSION['pseudo'])) {
	header("Location:index.php?page=actu");
}
?><br/><br/>
<div class="row">
<div class="span2"></div>
<div class="span7 register alert alert-info">
<h2>Les conversations</h2>
<?php
$conversations = recup_conversation();
	if($conversations == true)
	{
			foreach($conversations as $conversation)
			{
				?>
			
					<div class='alert alert-danger thumbnail'>
						<a href='index.php?page=profile&pseudo=<?php echo $conversation['pseudo']; ?>'><strong><?php echo $conversation['pseudo']; ?></strong></a><br /><br/>
						<img src='avatar/<?php echo $conversation['avatar']; ?>' class="picture_avatar">
						<p><a href='index.php?page=message&id=<?php echo $conversation['id_conversation']; ?>'><?php echo $conversation['sujet_conversation'] ?></a></p>
						<p>Envoyé le : <?php echo date('d/m/Y à H:i:s',strtotime($conversation['date_message'])); ?></p>
					</div>
				<?php
			}
	}else{
		?>
			<div class='alert alert-danger'>Vous n'avez pas de message</div>
		<?php
	}
?></div></div>