<?php
$infos = auth_user_info();


if(!isset($_SESSION['pseudo']))
{
header("Location:index.php?page=actu");
}
?>
