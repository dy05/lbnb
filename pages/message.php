<?php
include('body/menu.php');
include('body/header.php');
if (!isset($_SESSION['pseudo'])) {
	header("Location:index.php?page=actu");
}
?>
<div class="row"><div class="span6 register alert alert-info">
<h2>Les messages</h2>
<?php
$messages = recup_message();
foreach($messages as $message)
{
	?>
					<div class="thumbnail">
					<p>Envoyé par : <a href='index.php?page=profile&pseudo=<?php echo $message['pseudo']; ?>'><strong><?php echo $message['pseudo']; ?></strong></a>
					Le : <?php echo date('d/m/Y à H:i:s',strtotime($message['date_message']));?></p>
					<img src='avatar/<?php echo $message['avatar'];?>' height='50px' width='50px'><br />
					<p class="alert alert-danger"><?php echo $message['corps_message']; ?><hr></p>
 					</div><br/><br/>
	<?php
}
?>
</div>
</div>