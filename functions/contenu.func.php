<?php
function afficher_articles(){
$articles = array();
$query = mysql_query("SELECT * FROM articles WHERE id_article='{$_GET['id']}'");
while($row = mysql_fetch_assoc($query))
{
$articles[] = $row;
}
return $articles;
}

function inserer_commentaire($pseudo,$commentaire){
mysql_query("INSERT INTO commentaires VALUES('','{$_GET['id']}','$pseudo','$commentaire',NOW())") or die(mysql_error());
}
function afficher_commentaires(){
$commentaires = array();
$query = mysql_query("SELECT * FROM commentaires WHERE id_article = '{$_GET['id']}' ORDER BY date");
while($row = mysql_fetch_assoc($query)){
$commentaires[] = $row;
}
return $commentaires;
}
?>