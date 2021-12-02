<?php
include('body/menu.php');
include('body/header.php');
if (!isset($_SESSION['pseudo'])) {
	header("Location:index.php?page=home");
}
?>
<div class="row"><div class="span6 register alert alert-info">
<h3>Changer votre image de profile</h3>
<?php
		
		if(isset($_POST['submit']))
		{
			$avatar = $_FILES['avatar']['name'];
			$avatar_tmp = $_FILES['avatar']['tmp_name'];
			if(!empty($avatar))
			{
				$image_ext = strtolower(end(explode('.',$avatar)));
				
				if(in_array($image_ext,array('jpg','jpeg','png','gif')))
				{
						modifier_image_profile($avatar_tmp,$avatar);
						header("Location:index.php?page=membre");
				}else{
					echo"<div class='error'>Veuillez saisir une image valide</div>";
				}
			}
		}	
foreach($infos as $info)
{
	?>
		<img src='avatar/<?php echo $info['avatar']; ?>' class="picture_avatar" alt='avatar'>
	<?php
}
?>
<br/><br/>
<form method='POST' action='' enctype='multipart/form-data'>
<input type="file" name="avatar"><br /><br />
<input type="submit" value="Valider" class="btn btn-primary" name="submit">
</form>
</div></div>