<?php
$infos = infos_membre_connecte();


if(!isset($_SESSION['pseudo']))
{
header("Location:index.php?page=actu");
}
?>