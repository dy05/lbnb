<?php
include('body/menu.php');
include('body/header.php');
if (!isset($_SESSION['pseudo'])) {
	header("Location:index.php?page=actu");
}
	
	if(isset($_POST['submit']))
	{
				$email = mysqli_real_escape_string(htmlentities(trim($_POST['email'])));
				$apropos = mysqli_real_escape_string(htmlentities(trim($_POST['apropos'])));
				$situation = mysqli_real_escape_string(htmlspecialchars(trim($_POST['situation'])));
				changer_informations_member($email,$situation,$apropos);
				header("Location:index.php?page=member");
	}
?>
<br/><br/>
<div class="row">
<div class="span2"></div>
<div class="span7 register alert alert-info">
<h3>Changer vos informations</h3>
<?php
	foreach($infos as $info)
	{
			?>
					<form method='POST' action=''>
							<label for='situation'>Votre niveau scolaire : </label>
							<select name="situation">
				<?php echo  isset($info['situation']) ? '<option value='.$info['situation'].'>'.$info['situation'].'</option>' : ''; ?>
				<optgroup label="Autres">
				<?php echo $classe !='Autre' ? '<option value="Autre">Autre</option>' : ''; ?>
				<?php echo $classe !='Professeur' ? '<option value="Professeur">Professeur</option>' : ''; ?>
				<?php echo $classe !='Etudiant' ? '<option value="Etudiant">Etudiant</option>' : ''; ?>
	</optgroup>
	<optgroup label="Seconde cycle - Francophone">
				<?php echo $classe !='TleC' ? '<option value="TleC">TleC</option>' : ''; ?>
				<?php echo $classe !='TleD' ? '<option value="TleD">TleD</option>' : ''; ?>
				<?php echo $classe !='TleA4-All' ? '<option value="TleA4-All">TleA4-All</option>' : ''; ?>
				<?php echo $classe !='TleA4-Esp' ? '<option value="TleA4-Esp">TleA4-Esp</option>' : ''; ?>
				<?php echo $classe !='PC' ? '<option value="PC">PC</option>' : ''; ?>
				<?php echo $classe !='PD' ? '<option value="PD">PD</option>' : ''; ?>
				<?php echo $classe !='PA4-All' ? '<option value="PA4-All">PA4-All</option>' : ''; ?>
				<?php echo $classe !='PA4-Esp' ? '<option value="PA4-Esp">PA4-Esp</option>' : ''; ?>
				<?php echo $classe !='2C' ? '<option value="2C">2C</option>' : ''; ?>
				<?php echo $classe !='2A4-All' ? '<option value="2A4-All">2A4-All</option>' : ''; ?>
				<?php echo $classe !='2A4-Esp' ? '<option value="2A4-Esp">2A4-Esp</option>' : ''; ?>
	</optgroup>
	<optgroup label="Premier cycle - Francophone">
				<?php echo $classe !='3ème-All' ? '<option value="3ème-All">3ème-All</option>' : ''; ?>
				<?php echo $classe !='3ème-Esp' ? '<option value="3ème-Esp">3ème-Esp</option>' : ''; ?>
				<?php echo $classe !='4ème-All' ? '<option value="4ème-All">4ème-All</option>	' : ''; ?>
				<?php echo $classe !='4ème-Esp' ? '<option value="4ème-Esp">4ème-Esp</option>' : ''; ?>
				<?php echo $classe !='5ème' ? '<option value="5ème">5ème</option>' : ''; ?>
				<?php echo $classe !='6ème' ? '<option value="6ème">6ème</option>' : ''; ?>
	</optgroup>
	<optgroup label="Session anglophone">
				<?php echo $classe !='Form V' ? '<option value="Form V">Form V</option>' : ''; ?>
				<?php echo $classe !='Form IV' ? '<option value="Form IV">Form IV</option>' : ''; ?>
				<?php echo $classe !='Form III' ? '<option value="Form III">Form III</option>	' : ''; ?>
				<?php echo $classe !='Form II' ? '<option value="Form II">Form II</option>' : ''; ?>
				<?php echo $classe !='Form I' ? '<option value="Form I">Form I</option>' : ''; ?>
	</optgroup>
					</select><br /><br />
					<label for='email'>Votre email : </label>
					<input type='text' name='email' value='<?php echo $info['email']; ?>' required autofocus/><br /><br />
					<label for='apropos'>A propos de vous : </label>
					<textarea rows='6' cols='30' name='apropos' required autofocus/><?php echo $info['apropos']; ?></textarea><br /><br />
					<input type='submit' value='Changer'  class="btn btn-primary" name='submit'>
					</form>
			<?php
	}
?>
</div>
</div>
