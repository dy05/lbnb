<?php
include('body/menu.php');
include('body/header.php');
?>
<div class="row">
<div class="span6 register alert alert-info">
<h1>Inscription</h1>

<?php
		
		if(isset($_POST['submit']))
		{
				$sexe = mysqli_real_escape_string(htmlspecialchars(trim($_POST['sexe'])));
				$pseudo = mysqli_real_escape_string(htmlentities(trim($_POST['pseudo'])));
				$nom = mysqli_real_escape_string(htmlentities(trim($_POST['nom'])));
				$password = mysqli_real_escape_string(htmlentities(trim($_POST['password'])));
				$rpassword = mysqli_real_escape_string(htmlentities(trim($_POST['rpassword'])));
				$age = mysqli_real_escape_string(htmlentities(trim($_POST['age'])));
				$email = mysqli_real_escape_string(htmlentities(trim($_POST['email'])));
				$apropos = mysqli_real_escape_string(htmlentities(trim($_POST['apropos'])));
				$situation = mysqli_real_escape_string(htmlspecialchars(trim($_POST['situation'])));
				
				
				
				if ($age < 10 ) {
					$errors[] = "Votre age n'est pas autorisé";
				}
								
				if(!filter_var($email,FILTER_VALIDATE_EMAIL))
				{
					$errors[] = "Votre adresse email n'est pas correcte";
				}
				
				if($password != $rpassword)
				{
					$errors[] = "Vos mots de passe ne correspondent pas";
				}

				if( pseudo_existe($pseudo) == 1)
				{
					$errors[] = "Ce pseudo n'est pas disponible";
				}
				
				if(email_existe($email) == 1)
				{
					$errors[] = "Cette adresse email existe déja <br> avez vous oublié votre <a href='#'>mot de passe?</a>";
				}
				
				if(!empty($errors))
				{
						foreach($errors as $error)
						{
							echo "<div class='error'>".$error."</div>";
						}
				}else{
					inscrire_utilisateur($pseudo,$nom,$password,$email,$sexe,$age,$situation,$apropos);
					header("Location:index.php?page=login");
			$msg = "Hello ".$nom.", you are welcome to our website and we are  very happy to count you into our membership. Thank you to join us as http://www.lbnb.net";
            $objet = "Message de bienvenue sur le site du LBNB" ;
 
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From: Team of LBNB Website &nbsp;|&nbsp; Bienvenue sur le site du lycee ne NEW BELL.'."\r\n";
                if ( mail($email, $objet, $msg, $headers) ) // On envoie l e-mail.
                {
 
                echo "<div class='alert alert-success'>Votre message a bien ete envoye!</div>";
                }
                else
                {
                echo "<div class='alert alert-error'>Il y a eu une erreur lors de l'envoi du mail pour votre sugestion.</div>";
                }
				}
		}
?>

<form class="form-horizontal" method='POST' action=''>

	<label for='sexe'>Sexe<span class="text-error">*</span></label>
	<select name="sexe" class="span4">
				<?php echo  isset($sexe) ? '<option value='.$sexe.'>'.$sexe.'</option>' : ''; ?>
				<?php echo $sexe != 'Homme' ? '<option value="Homme">Homme</option>' : ''; ?>
				<?php echo $sexe != 'Femme' ? '<option value="Femme">Femme</option>' : ''; ?>
	</select><br /><br/>
	<label for='situation'>Niveau d'étude<span class="text-error">*</span></label>
	<select name="situation" class="span4">
				<?php echo  isset($classe) ? '<option value='.$classe.'>'.$classe.'</option>' : ''; ?>
	<optgroup label="Autres">
				<?php echo $classe !='Autre' ? '<option value="Autre">Autre</option>' : ''; ?>
				<?php echo $classe !='Professeur' ? '<option value="Professeur">Professeur</option>' : ''; ?>
				<?php echo $classe !='Etudiant' ? '<option value="Etudiant">Etudiant</option>' : ''; ?>
	</optgroup>
	<optgroup label="Seconde cycle - Francophone">
				<?php echo $classe !='TleC' ? '<option value="Tle C">Tle C</option>' : ''; ?>
				<?php echo $classe !='TleD' ? '<option value="Tle D">Tle D</option>' : ''; ?>
				<?php echo $classe !='TleA4 All' ? '<option value="TleA4 All">TleA4 All</option>' : ''; ?>
				<?php echo $classe !='TleA4 Esp' ? '<option value="TleA4 Esp">TleA4 Esp</option>' : ''; ?>
				<?php echo $classe !='PC' ? '<option value="PC">PC</option>' : ''; ?>
				<?php echo $classe !='PD' ? '<option value="PD">PD</option>' : ''; ?>
				<?php echo $classe !='PA4 All' ? '<option value="PA4 All">PA4 All</option>' : ''; ?>
				<?php echo $classe !='PA4 Esp' ? '<option value="PA4 Esp">PA4 Esp</option>' : ''; ?>
				<?php echo $classe !='2C' ? '<option value="2C">2C</option>' : ''; ?>
				<?php echo $classe !='2A4 All' ? '<option value="2A4 All">2A4 All</option>' : ''; ?>
				<?php echo $classe !='2A4 Esp' ? '<option value="2A4 Esp">2A4 Esp</option>' : ''; ?>
	</optgroup>
	<optgroup label="Premier cycle - Francophone">
				<?php echo $classe !='3ème All' ? '<option value="3ème All">3ème All</option>' : ''; ?>
				<?php echo $classe !='3ème A/I' ? '<option value="3ème A/I">3ème A/I</option>' : ''; ?>
				<?php echo $classe !='3ème Esp' ? '<option value="3ème Esp">3ème Esp</option>' : ''; ?>
				<?php echo $classe !='4ème All' ? '<option value="4ème All">4ème All</option>	' : ''; ?>
				<?php echo $classe !='4ème A/I' ? '<option value="4ème A/I">4ème A/I</option>	' : ''; ?>
				<?php echo $classe !='4ème Esp' ? '<option value="4ème Esp">4ème Esp</option>' : ''; ?>
				<?php echo $classe !='5ème' ? '<option value="5ème">5ème</option>' : ''; ?>
				<?php echo $classe !='6ème' ? '<option value="6ème">6ème</option>' : ''; ?>
	</optgroup>
	<optgroup label="Session anglophone">
				<?php echo $classe !='Upper-sixth' ? '<option value="Upper-sixth">Upper-sixth</option>' : ''; ?>
				<?php echo $classe !='Lower-sixth' ? '<option value="Lower-sixth">Lower-sixth</option>' : ''; ?>
				<?php echo $classe !='Form V' ? '<option value="Form V">Form V</option>' : ''; ?>
				<?php echo $classe !='Form IV' ? '<option value="Form IV">Form IV</option>' : ''; ?>
				<?php echo $classe !='Form III' ? '<option value="Form III">Form III</option>	' : ''; ?>
				<?php echo $classe !='Form II' ? '<option value="Form II">Form II</option>' : ''; ?>
				<?php echo $classe !='Form I' ? '<option value="Form I">Form I</option>' : ''; ?>
	</optgroup>
	</select>
	
	<label for="pseudo">Votre pseudo : <span class="text-error">*</span></label>
	<input type="text" name="pseudo" class="span4" value='<?php echo isset($pseudo) ? $pseudo : ''; ?>' required>
	
	<label for="nom">Votre nom entier : <span class="text-error">*</span></label>
	<input type="text" name="nom" class="span6" class="span4" value='<?php echo isset($nom) ? $nom : ''; ?>' required>
	
	<label for="password">Votre mot de passe : <span class="text-error">*</span></label>
	<input type="password" class="span6" class="span6" class="span4" name="password" required>
	
	<label for="rpassword">Répetez votre mot de passe : <span class="text-error">*</span></label>
	<input type="password" class="span6" class="span6" class="span4" class="span6" name="rpassword" required>
	
	<label for="age">Votre âge : <span class="text-error">*</span></label>
	<input type="text" class="span6" class="span6" class="span6" class="span4" class="span6" name="age" required>
	
	<label for="email">Veuillez saisir votre email  : <span class="text-error">*</span></label>
	<input type="text" name="email" class="span6" class="span6" class="span4" class="span6" class="span6" class="span6" value='<?php echo isset($email) ? $email : ''; ?>' required>
	
	<label for="apropos">A prôpos de vous </label>
	<textarea rows="6" cols="30" class="span6" maxlength="1500" name="apropos" placeholder="Hello !" style="height: 100px; max-width: 500px; max-height: 500px;" required><?php echo isset($apropos) ? $apropos : ''; ?></textarea><br /><br />

	<button type="submit" class="btn btn-primary input-large" name="submit"><b class="icon-send"></b> S'inscrire</button>
	<button type="reset" class="btn input-large"><b class="icon-remove"></b> Annuler</button>

</form>
</div>
<div class="span4 lert">
<?php
include("pages/chart.php");
?>
</div>
</div>

<!--


 <?php
    if(isset($_GET['email'])) // On vérifie que la variable $_GET['email'] existe.
    {
 
        if( !empty($_POST['email']) AND $_GET['email']==1 AND isset($_POST['new'])) /* On vérifie que la variable $_POST['email'] contient bien quelque chose, que la variable $_GET['email'] est égale à 1 et que la variable $_POST['new'] existe. */
        {
        if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email'])) // On vérifie qu'on a bien rentré une adresse e-mail valide.
        {
 
            if($_POST['new']==0) // Si la variable $_POST['new'] est égale à 0, cela signifie que l'on veut s'inscrire.
            {
 
            // On définit les paramètres de l'e-mail.
            $email = $_POST['email'];
            $message = 'Pour valider votre inscription à la newsletter de LBNB.NET, <a href="index.php?page=register&amp;tru=1&amp;email='.$email.'">cliquez ici</a><br><br><br><u><b>
                La Team de gestion du LBNB SOCIAL NETWORK.</b></u>
      .';
 
            $destinataire = $email;
            $objet = "Inscription au site du LBNB" ;
 
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From: cilbnb@lbnb.net' . "\r\n";
                if ( mail($destinataire, $objet, $message, $headers) ) // On envoie l'e-mail.
                {
 
                echo "Pour valider votre inscription, veuillez cliquer sur le lien dans l'e-mail que nous venons de vous envoyer.";
                }
                else
                {
                echo "Il y a eu une erreur lors de l'envoi du mail pour votre inscription.";
                }
            }
            elseif($_POST['new']==1) // Si la variable $_POST['new'] est égale à 1, cela signifie que l'on veut se désinscrire.
            {
 
            // On définit les paramètres de l'e-mail.
            $email = $_POST['email'];
            $message = 'Pour valider votre désinscription de la newsletter de MonSite.fr, <a href="http://www.monsite.fr/desinscription.php?tru=1&amp;email='.$email.'">cliquez ici</a>.';
 
            $destinataire = $email;
            $objet = "Désinscription de la newsletter de MonSite.fr" ;
 
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From: monsite@monsite.fr' . "\r\n";
                if ( mail($destinataire, $objet, $message, $headers) ) 
                {
 
                echo "Pour valider votre désinscription, veuillez cliquer sur le lien dans l'e-mail que nous venons de vous envoyer.";
                }
                else
                {
                echo "Il y a eu une erreur lors de l'envoi du mail pour votre désinscription.";
                }
            }
            else
            {
            echo "Il y a eu une erreur !";
            }
        }
        else
        {
        echo "Vous n\'avez pas entré une adresse e-mail valide ! Veuillez recommencer !";
        }
        }
        else
        {
        echo "Il y a eu une erreur.";
        }
    }
    else // Si les champs n'ont pas été remplis.
    {
?>
La newsletter :
<form method="post" action="index.php?email=1">
Adresse e-mail : <input type="text" name="email" size="25" /><br />
<input type="radio" name="new" value="0" />S''inscrire
<input type="radio" name="new" value="1" />Se désinscrire<br />
<input type="submit" value="Envoyer" name="submit" /> <input type="reset" name="reset" value="Effacer" />
</form>
<?php
    }
?>

-->
