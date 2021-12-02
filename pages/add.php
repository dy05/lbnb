<?php

include('body/header.php');
include('body/menu.php');

$avatar = isset($_SESSION['pseudo']) ? auth_user_info('avatar') : 'default.png';
$articles = show_articles();
?>

<?php foreach($articles as $article): ?>

<div class="row">
    <div class="span8">
        <h2>ACTUALITIES</h2>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 style="margin:0;"><?php echo $article['title']; ?></h4>
                <span class="pull-right">
                    <?php if (isset($_SESSION['pseudo']) && isset($admin) && $_SESSION['pseudo'] == $admin): ?>
                        <a href="index.php?page=delete&id=<?php echo $article['id_article']; ?>">X</a>
                    <?php endif; ?>
                </span>
            </div>
            <div class="panel-body">
                <?php echo $article['corps']; ?>
                <br/><br/>
                <a href="index.php?article=" target="_blank">
                    <img src="avatar/<?php echo $article['avatar']; ?>" alt="<?php echo $article['titre']; ?>"
                         height="250" width="300"/>
                </a>
                <br/><br/>
                Merci
            </div>
            <div class="panel-footer">
                <span class="glyphicon icon-calendar"></span>
                Date
                <a href="index.php?page=article&article=<?php echo $article['id_article']; ?>"
                   class="btn btn-info btn-mini pull-right" style="margin-left: 10px;">
                    <span class="glyphicon glyphicon-eye-open"></span>
                    Lire l'article
                </a>
                <span class="pull-right">
                    <span class="glyphicon glyphicon-comment"></span>
                    comments
                </span>
            </div>
        </div>
    </div>
    <hr/>
    <form method="post" action="">
        <div>
            <label for="pseudo">Votre pseudo:</label><br/>
            <input id="pseudo" type="text" name="pseudo"/><br/>
        </div>

        <div>
            <label for="comments">Votre comment:</label><br/>
            <textarea id="comments" name="comment" cols="20" rows="7" placeholder="Rien à signaler"></textarea><br/><br/>
        </div>

        <input type="submit" name="submit" value="Commenter"/>
    </form>
</div>
<?php endforeach; ?>
