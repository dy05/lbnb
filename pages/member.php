<?php
include('body/header.php');
include('body/menu.php');

if (!isset($_SESSION['pseudo'])) {
    header("Location:index.php?page=actu");
} else if (isset($infos)) {
?>
<div class="row">
    <div class="span2"></div>
    <div class="span7 register alert alert-info">
    <?php foreach($infos as $info): ?>
        <a href='index.php?page=update_avatar'>
            <img class='picture_avatar' src="avatar/<?php echo $info['avatar']; ?>" alt='avatar'>
        </a>
        <br/><br/>
        <p>
            <a href='index.php?page=update_avatar' class="btn btn-primary">
                Changer d'image
            </a>
        </p>
        <p>
            <strong>Pseudo</strong> :
            <em><?php echo $info['pseudo']; ?></em></p>
        <p>
            <strong>Noms</strong> :
            <em><?php echo $info['nom']; ?></em></p>
        <p>
            <strong>Email</strong> :
            <em><?php echo $info['email']; ?></em></p>
        <p>
            <strong>Sexe</strong> :
            <em><?php echo $info['sexe']; ?></em></p>
        <p>
            <strong>Age</strong> :
            <em><?php echo $info['age'].' ans'; ?></em></p>
        <p>
            <strong>Niveau d'étude</strong> :
            <em><?php echo $info['situation']; ?></em></p>
        <p>
            <strong>A propos de vous</strong> :
            <em><?php echo $info['apropos']; ?></em></p>
    <?php endforeach; ?>
    </div>
</div>
<?php } ?>
