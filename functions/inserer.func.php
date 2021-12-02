<?php
function show_articles(){
$articles = array();
$query = mysqli_query(get_mysqli(), "SELECT * FROM articles WHERE id_article='{$_GET['id']}'");
while($row = mysqli_fetch_assoc($query))
{
$articles[] = $row;
}
return $articles;
}

function add_comment($pseudo,$comment){
$avatar ==
mysqli_query(get_mysqli(), "INSERT INTO comments VALUES('','{$_GET['id']}','$pseudo','$comment','$avatar',NOW())") or die(mysqli_error());
}
function show_comments(){
$comments = array();
$query = mysqli_query(get_mysqli(), "SELECT * FROM comments WHERE id_article = '{$_GET['id']}' ORDER BY date");
while($row = mysqli_fetch_assoc($query)){
$comments[] = $row;
}
return $comments;
}
?>
