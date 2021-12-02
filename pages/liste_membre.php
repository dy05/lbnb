<?php
include('body/menu.php');
include('body/header.php');
if (!isset($_SESSION['pseudo'])) {
	header("Location:index.php?page=actu");
}
?><br/>
<div class="row"><div class="span2"></div><div class="span7 register alert alert-info text-center">
<h2>La liste des membres</h2>
<?php
$pseudos_avatars = recuperer_pseudo_avatar();
	
	foreach($pseudos_avatars as $pseudo_avatar)
	{
		?>
			<div class="thumbnail">
			<p><a href='index.php?page=profile&pseudo=<?php echo $pseudo_avatar['pseudo'];?>'><?php echo $pseudo_avatar['pseudo'] ?></a></p>
			<a href='index.php?page=profile&pseudo=<?php echo $pseudo_avatar['pseudo'];?>'><img src="avatar/<?php echo $pseudo_avatar['avatar']; ?>" class="picture_avatar" alt='avatar'></a><br/><hr><br/>
			</div><br/>
		<?php
	}
?>
</div>
</div>
