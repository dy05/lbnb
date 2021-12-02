<?php
function show_articles(){
$articles = array();
$query = mysqli_query(get_mysqli(), "SELECT * FROM articles WHERE id_article='{$_GET['article']}'");
while($row = mysqli_fetch_assoc($query))
{
$articles[] = $row;
}
return $articles;
}
function nb_comment(){
mysqli_query(get_mysqli(), "");

}

function add_comment($pseudo,$comment){
mysqli_query(get_mysqli(), "INSERT INTO comments VALUES(''
,'{$_GET['article']}','$pseudo','$comment',NOW())") or die(mysqli_error());
}
function show_comments(){
$comments = array();
$query = mysqli_query(get_mysqli(), "SELECT * FROM comments WHERE id_article = '{$_GET['article']}' ORDER BY date");
while($row = mysqli_fetch_assoc($query)){
$comments[] = $row;
}
return $comments;
}

?>
