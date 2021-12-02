<?php
include('functions/Db.php');
include('functions/ibi.func.php');
include('functions/member.php');


if (isset($_SESSION['pseudo'])) {

function admin()
{
	$pseudo = $_SESSION['pseudo'];
	$results = array();
	$query = mysqli_query(get_mysqli(), "SELECT * FROM utilisateurs WHERE pseudo='$pseudo'");
		while($row = mysqli_fetch_assoc($query))
	{
		$results[] = $row;
	}
	return $results;
}

$infos = admin();
foreach($infos as $info)
{
if($info['admin'] == '1'){
	$admin = $info['nom'];
}}}

$page = htmlentities($_GET['page']);
include('functions/'.$page.'.func.php');

$pages = scandir('pages');

if(!empty($page) && in_array($_GET['page'].'.php',$pages))
{
	$content = 'pages/'.$_GET['page'].'.php';
}else{
	header('Location:index.php?page=home');
}
if(isset($_SESSION['pseudo']) && $page != 'member' && $page != 'contact' && $page != 'about' && $page != 'charte' && $page != 'chart' && $page != 'update' && $page != 'update_avatar'
&& $page !='liste_member' && $page !='profile' && $page !='envoi' && $page !='annuler' && $page !='invitations'
&& $page !='accepter' && $page !='refuser' && $page !='amis' && $page !='supprimer_amis' && $page !='new_message' && $page !='actu' && $page !='article'
&& $page !='conversations' && $page !='message' && $page !='repondre' && $page !='home' && $page != 'contenu' && $page != 'pub' && $page != 'tchat')
{
	header("Location:index.php?page=home");
}
?>
<!DOCTYPE html>
	<html lang="fr-FR">
	<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="reply-to" content="cilbnb@lbnb.net">
	<meta charset="utf-8">
	<meta name="keywords" content="éducation, cameroun, douala, new-bell, new, bell, lbnb, lycée, bilingue" lang="fr">
	<meta name="robots" content="noodp, noydir">
	<meta name="description" content="Bienvenue sur le site du Lycée Bilingue de NEW BELL, servant de réseau social mis sur pied par le club informatique dudit lycée." />
	<meta name="googlebot" content="<?php echo $content; ?>" />
	<link rel="shortcut icon" type="image/ico" href="disign/img/favicon.ico">
	<meta content="Club Informatique du Lycée Bilingue de NEW-BELL" name="generator">
	<meta name="author" content="Club informatique du LBNB, DYOS">
	<link rel="stylesheet" href="disign/css/bootstrap.css" media="screen" type="text/css">
	<link rel="stylesheet" href="disign/css/bootstrap1.css" media="screen" type="text/css">
	<link href="disign/css/bootstrap-responsive.css" rel="stylesheet" type="text/css">
	<link href="disign/css/index.css" rel="stylesheet" type="text/css">
	<script src="disign/js/jquery.js"></script>
	<script src="disign/js/bootstrap.js "></script>
	<script src="disign/js/transition.js"></script>
	<meta name="Subject" content="Actualités sur le lycée bilingue de NEW BELL">
	<meta name="Identifier-Url" content="http://www.lbnb.net">
	<link href="disign/css/bootstrap1.css" rel="stylesheet" type="text/css">
	<meta name="Rating" content="general">
	<meta name="Distribution" content="global">
	<link rel="stylesheet" media="handheld" type="text/css" title="mobile" href="disign/css/mobile.css" />


    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<!--
    else if($_GET['page'] == ''){
		$title = '';
	}

-->
	<title>Lyc&eacute;e Bilingue de NEW-BELL
	<?php
	if($_GET['page'] == 'home'){
		$title = 'Accueil';
	}else if($_GET['page'] == 'actu'){
		$title = 'Actualités';
	}else if($_GET['page'] == 'member'){
		$title = 'Mon profil';
	}else if($_GET['page'] == 'login'){
		$title = 'Connexion';
	}else if($_GET['page'] == 'register'){
		$title = 'Inscription';
	}else if($_GET['page'] == 'contact'){
		$title = 'Contact';
	}else if($_GET['page'] == 'about'){
		$title = 'A propos';
	}else if($_GET['page'] == 'charte'){
		$title = 'Charte';
	}else{
		$title = 'LBNB';
	}
		echo '|| '.$title;
	?>
	</title>
	</head>
	<body class="page">
	<div id='content'>
				<?php
						include($content);
				?>
	</div>
    </div>
    Ici c'est pour gerer le site mais ce nest pas encore programmer.
	<?php
include('foot.php');
	?>
</body>
</html>
