<?php
if(isset($_SESSION['pseudo'])){
$infos = auth_user_info();
}
?>
<header>
<nav class="navbar navbar-default navbar-fixed-top">
<div class="navbar-inner">
<div class="container">
<a href="http://www.lbnb.net">
<img src="disign/img/logo.png" class="logo pull-left">
</a>
<ul class="nav nav1">

<?php
if(!isset($_SESSION['pseudo'])){
?>

<li><a href='index.php?page=home'><b class="icon-home"></b>Accueil</a></li><li class="divider-vertical"></li>
<li><a href='index.php?page=actu'><img src="disign/img/actu.png">Actualités</a></li><li class="divider-vertical"></li>
<li><a href='index.php?page=login'><b class="icon-off"></b>Connectez-vous!</a></li><li class="divider-vertical"></li>
<li><a href='index.php?page=register'><b class="icon-edit"></b>Inscription</a></li><li class="divider-vertical"></li>
<li><a href="index.php?page=about"><b class="icon-file"></b>A prôpos</a></li><li class="divider-vertical"></li>
<li><a href="index.php?page=contact"><b class="icon-envelope"></b>Contactez-nous</a></li>

<?php
}else{
?>
<li><a href='index.php?page=home'><b class="icon-home"></b>Accueil</a></li><li class="divider-vertical"></li>
<li><a href='index.php?page=actu'><img src="disign/img/actu.png">Actualités</a></li><li class="divider-vertical"></li>
<li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#">
<span class="not"><?php $dan=afficher_ibi();
if($dan!=0) echo afficher_ibi(); ?></span>/<strong>
<?php
foreach($infos as $info)
{
	echo $info['pseudo'];
}
?>
</strong>
<b class="caret"></b> </a>
<ul class="dropdown-menu">
<li><a href='index.php?page=member'><b class="icon-user"></b>Mon profil</a></li>
<li><a href='index.php?page=update'><b class="icon-wrench"></b>Modifier mon profil</a></li>
<li><a href='index.php?page=logout'><b class="icon-off"></b>Se déconnecter</a></li>
<li class="divider"></li>
<li><a href='index.php?page=amis'><b class="icon-tasks"></b>Vos amis</a></li>
<li><a href='index.php?page=invitations'><b class="icon-download-alt"></b>Invitations</a></li>
<li><a href='index.php?page=conversations'><b class="icon-inbox"></b>Messages</a></li>
</ul>
</li><li class="divider-vertical"></li>
<li><a href='index.php?page=liste_member'><b class="icon-list-alt"></b>Les members</a></li><li class="divider-vertical"></li>
<li><a href="index.php?page=about"><b class="icon-file"></b>A prôpos</a></li><li class="divider-vertical"></li>
<li><a href="index.php?page=contact"><b class="icon-envelope"></b>Contactez-nous</a></li><li class="divider-vertical"></li>
<?php
}
?>
</ul>

</div>
</div>
</nav>
</header>
<div id="page">
