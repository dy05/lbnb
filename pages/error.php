<?php
if(isset($_SESSION['pseudo']))
{
header("Location:index.php?page=actu");
}
?>