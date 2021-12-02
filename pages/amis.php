<?php
include('body/menu.php');
include('body/header.php');
if (!isset($_SESSION['pseudo'])) {
	header("Location:index.php?page=actu");
}
?>
<br/><br/>
<div class="row">
<div class="span2"></div>
<div class="span7 register alert alert-info">
<h2>Vos amis</h2>
<?php
$liste_amis_exp = liste_amis_exp();
$liste_amis_dest =  liste_amis_dest();

	foreach($liste_amis_exp  as $liste_ami_exp)
	{
		?>
			<div class="thumbnail">
			<p><a class="picture_avatar" href='index.php?page=profile&pseudo=<?php echo $liste_ami_exp['pseudo_dest'];?>'><strong><?php echo $liste_ami_exp['pseudo_dest']; ?></strong></a></p>
			<a href='index.php?page=profile&pseudo=<?php echo $liste_ami_exp['pseudo_dest'];?>'><img src='avatar/<?php  echo $liste_ami_exp['avatar'];  ?>' class="picture_avatar" alt='avatar'></a>
			</div>
		<?php
	}
	
	
	foreach($liste_amis_dest  as $liste_ami_dest)
	{
		?>
			<p><a href='index.php?page=profile&pseudo=<?php echo $liste_ami_dest['pseudo_exp'];?>'><?php echo $liste_ami_dest['pseudo_exp']; ?></a></p>
			<a href='index.php?page=profile&pseudo=<?php echo $liste_ami_dest['pseudo_exp'];?>'><img src='avatar/<?php  echo $liste_ami_dest['avatar'];  ?>' class="picture_avatar" alt='avatar'></a>
		<?php
	}
	
	if(empty($liste_amis_exp) && empty($liste_amis_dest))
	{
		?>
			<div class='alert alert-danger'>Vous n'avez pas d'amis</div>
		<?php
	}
?></div>

<br/>
</div>