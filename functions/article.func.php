<?php
function afficher_articles(){
$articles = array();
$query = mysql_query("SELECT * FROM articles WHERE id_article='{$_GET['article']}'");
while($row = mysql_fetch_assoc($query))
{
$articles[] = $row;
}
return $articles;
}
function nb_comment(){
mysql_query("");

}

function inserer_commentaire($pseudo,$commentaire){
mysql_query("INSERT INTO commentaires VALUES(''
,'{$_GET['article']}','$pseudo','$commentaire',NOW())") or die(mysql_error());
}
function afficher_commentaires(){
$commentaires = array();
$query = mysql_query("SELECT * FROM commentaires WHERE id_article = '{$_GET['article']}' ORDER BY date");
while($row = mysql_fetch_assoc($query)){
$commentaires[] = $row;
}
return $commentaires;
}

?>