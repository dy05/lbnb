
<?php
include('body/header.php');
include('body/menu.php');
?>
<div class="row"><div class="span2"></div><div class="span6 register alert alert-info">
<u><h2>Qui sommes-nous?</h2></u>
Nous présentons ici le lycée bilingue de New Bell avec la 
possibilité pour ses élèves et même pour ceux d'autres établissement 
d'avoir accès aux cours qui y sont dispensés, exercices et sujet 
d'examen entre autres. Possibilité de discuter et tchatcher entre eux.<br/>Egalement les proffesseurs pourront y participer aux forums et bien d'autres!!!
<br/><br/>Bonne visite!!!
Ce site a été réalisé par le département #InternetLight du Club Informatique du Lycée Bilingue de NEW-BELL.
<br/><br/><br/>Vous pouvez me contacter a l'adresse :<a href="mailto:dyos@lbnb.net">dyos@lbnb.net</a>
<br/><br/><br/><br/>
<div class="hmm" style="height:1px;margin-top:3px;background-color:#EEE;"></div>
<div class="row"><div id="contact" class="contact span4 alert alert-success">
<u><h2>Contactez-nous</h2></u>
<form method="POST" action="">
<label>Votre nom :</label>
<input type="text" name="nom" required placeholder="Votre nom" class="input" >
<label>Votre adresse email :</label>
<input type="email" name="email" required placeholder="******@******.***" class="input" >
<label>Votre message :</label>
<textarea rows="5" cols="10" required placeholder="Message" name="message"></textarea><br/>
<button type="submit"  class="btn btn-primary btn-small" name="submit">
<i class="icon-eject icon-white"></i>Envoyer</button>
</form>
</div>
</div>
<h2><u>Nos adresses</u></h2>
<div class="span3">
<a href="http://www.facebook.com/clubinfolbnb" class="btn-social btn-outline"><img class="rs" src="disign/img/fb.png"> CI LBNB</a><br/>
<a class="btn-social btn-outline" href="mailto:cilbnb@gmail.com"><img class="rs" src="disign/img/gmail.png">cilbnb@gmail.com</a><br/>
<a class="btn-social btn-outline" href="mailto:cilbnb@lbnb.net"><img class="rs" src="disign/img/mail.png">Club Informatique du LBNB</a>
</div>


 <?php


	if(isset($_POST['submit']))
		{
			$nom = mysql_real_escape_string(htmlspecialchars(trim($_POST['nom'])));
			$email = mysql_real_escape_string(htmlentities(trim($_POST['email'])));
			$msg = mysql_real_escape_string(htmlentities(trim($_POST['message'])));
            $destinataire = "cilbnb@lbnb.net";
            $objet = "Sugestion concernant le site du LBNB" ;
 
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From: '.$email. "\r\n";
                if ( mail($destinataire, $objet, $msg, $headers) ) // On envoie l'e-mail.
                {
 
                echo "<div class='alert alert-success'>Votre message a bien ete envoye!</div>";
                }
                else
                {
                echo "<div class='alert alert-error'>Il y a eu une erreur lors de l'envoi du mail pour votre sugestion.</div>";
                }
        }
          
?>
<!-- 
La newsletter :
<form method="post" action="index.php?email=1">
Adresse e-mail : <input type="text" name="email" size="25" /><br />
<input type="radio" name="new" value="0" />S''inscrire
<input type="radio" name="new" value="1" />Se désinscrire<br />
<input type="submit" value="Envoyer" name="submit" /> <input type="reset" name="reset" value="Effacer" />
</form>


<br/>

pour un formulaire en une ligne class="form-inline well"

<span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(-3px) translateY(47px) rotate(-28deg);" class="char2">h</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(-5px) translateY(33px) rotate(-23deg);" class="char3">e</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(-5px) translateY(25px) rotate(-20deg);" class="char4">&nbsp;</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(-5px) translateY(16px) rotate(-16deg);" class="char5">G</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(-4px) translateY(8px) rotate(-11deg);" class="char6">e</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(-2px) translateY(3px) rotate(-6deg);" class="char7">n</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(-1px) translateY(0px) rotate(-3deg);" class="char8">i</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(0px) translateY(0px) rotate(0deg);" class="char9">u</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(2px) translateY(1px) rotate(4deg);" class="char10">s</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(3px) translateY(4px) rotate(8deg);" class="char11">&nbsp;</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(4px) translateY(9px) rotate(11deg);" class="char12">C</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(5px) translateY(17px) rotate(16deg);" class="char13">e</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(5px) translateY(27px) rotate(21deg);" class="char14">n</span>

Ca est a travailler pour faire comme l'écuson

<span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(-2px) translateY(75px) rotate(-35deg);" class="char2">L</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(-3px) translateY(69px) rotate(-34deg);" class="char3">Y</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(-4px) translateY(65px) rotate(-33deg);" class="char4">C</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(-5px) translateY(60px) rotate(-31deg);" class="char5">E</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(-5px) translateY(54px) rotate(-30deg);" class="char6">E</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(-6px) translateY(50px) rotate(-28deg);" class="char7">&nbsp;</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(-6px) translateY(43px) rotate(-27deg);" class="char8">B</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(-7px) translateY(38px) rotate(-25deg);" class="char9">I</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(-7px) translateY(35px) rotate(-24deg);" class="char10">L</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(-7px) translateY(32px) rotate(-23deg);" class="char11">I</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(-7px) translateY(30px) rotate(-22deg);" class="char12">N</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(-7px) translateY(27px) rotate(-21deg);" class="char13">G</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(-7px) translateY(25px) rotate(-20deg);" class="char14">U</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(-7px) translateY(22px) rotate(-19deg);" class="char15">E</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(-7px) translateY(18px) rotate(-17deg);" class="char16">&nbsp;</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(-6px) translateY(15px) rotate(-15deg);" class="char17">D</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(-6px) translateY(11px) rotate(-13deg);" class="char18">E</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(-5px) translateY(8px) rotate(-11deg);" class="char19">N</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(-4px) translateY(6px) rotate(-10deg);" class="char20">E</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(-4px) translateY(5px) rotate(-9deg);" class="char21">W</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(-3px) translateY(3px) rotate(-7deg);" class="char22">-</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(-3px) translateY(2px) rotate(-6deg);" class="char23">B</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(-2px) translateY(1px) rotate(-4deg);" class="char24">E</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(-1px) translateY(0px) rotate(-2deg);" class="char25">L</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(0px) translateY(0px) rotate(-1deg);" class="char26">L</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(0px) translateY(0px) rotate(0deg);" class="char27">s</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(0px) translateY(0px) rotate(1deg);" class="char28">o</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(1px) translateY(1px) rotate(3deg);" class="char29">m</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(3px) translateY(2px) rotate(6deg);" class="char30">m</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(4px) translateY(5px) rotate(9deg);" class="char31">e</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(5px) translateY(6px) rotate(10deg);" class="char32">i</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(5px) translateY(7px) rotate(11deg);" class="char33">l</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(5px) translateY(8px) rotate(12deg);" class="char34">l</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(6px) translateY(10px) rotate(13deg);" class="char35">e</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(6px) translateY(13px) rotate(14deg);" class="char36">&nbsp;</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(6px) translateY(15px) rotate(16deg);" class="char37">e</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(7px) translateY(19px) rotate(18deg);" class="char38">n</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(7px) translateY(23px) rotate(19deg);" class="char39">&nbsp;</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(7px) translateY(26px) rotate(21deg);" class="char40">v</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(7px) translateY(31px) rotate(23deg);" class="char41">o</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(7px) translateY(37px) rotate(24deg);" class="char42">s</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(7px) translateY(41px) rotate(26deg);" class="char43">&nbsp;</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(6px) translateY(46px) rotate(27deg);" class="char44">e</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(6px) translateY(52px) rotate(29deg);" class="char45">n</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(5px) translateY(58px) rotate(31deg);" class="char46">f</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(4px) translateY(63px) rotate(32deg);" class="char47">a</span><span style="display: inline-block; transition: none 0s ease 0s ; transform: translateX(3px) translateY(70px) rotate(34deg);" class="char48">n</span>

 -->

<div class="span4">

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>




<div class="fb-like-box" data-href="https://www.facebook.com/lbnbsite" data-width="400" data-height="400" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
<br/>
</div>
</div>