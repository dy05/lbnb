<?php
function inserer_acticle($nom,$title,$article,$avatar_tmp,$avatar){
move_uploaded_file($avatar_tmp,'images/'.$avatar);
mysql_query("INSERT INTO articles VALUES('','$nom','$title','$article',NOW(),'{$_FILES['avatar']['name']}')");
}

function inserer($nom,$title,$article,$imge){
mysql_query("INSERT INTO articles VALUES('','$nom','$title','$article',NOW(),'$imge')");
}

function afficher_articles(){
$articles = array();
$query = mysql_query("SELECT * FROM articles ORDER BY date DESC");
while($row = mysql_fetch_assoc($query))
{
$articles[] = $row;
}
return $articles;
}


function recuperer_info_membre_choisi($pseudo)
{
	$results = array();
	while($row = mysql_fetch_assoc($query))
	{
		$results[] = $row;
	}
		return $results;
}

function inserer_commentaire($pseudo,$commentaire){
$infos_membres_choisis = recuperer_info_membre_choisi();
if(isset($_SESSION['pseudo'])){
if($infos_membres_choisis == true)
{
	foreach($infos_membres_choisis as $info_membre_choisi)
{
	$img = $info_membre_choisi['avatar'];
}}}else{
	$img = "anonyme.png";
}
mysql_query("INSERT INTO commentaires VALUES('','{$_GET['id']}','$pseudo','$commentaire',NOW(),'$img')") or die(mysql_error());
}
function afficher_commentaires(){
$commentaires = array();
$query = mysql_query("SELECT * FROM commentaires ORDER BY date");
while($row = mysql_fetch_assoc($query)){
$commentaires[] = $row;
}
return $commentaires;
}

?>