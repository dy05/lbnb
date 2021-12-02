<?php

function add_article($nom, $title, $article, $avatar_tmp, $avatar)
{
    move_uploaded_file($avatar_tmp, 'images/' . $avatar);
    mysqli_query(get_mysqli(), "INSERT INTO articles (pseudo, title, corps, date, avatar)
        VALUES('$nom', '$title', '$article', NOW(), '{$_FILES['avatar']['name']}')");
}

function add($nom, $title, $article, $img)
{
    mysqli_query(get_mysqli(), "INSERT INTO articles (pseudo, title, corps, date, avatar) 
        VALUES('$nom', '$title', '$article', NOW(), '$img')");
}

function show_articles(): array
{
    $articles = [];
    $query = mysqli_query(get_mysqli(), "SELECT * FROM articles ORDER BY date DESC");
    while($row = mysqli_fetch_assoc($query))
    {
        $articles[] = $row;
    }

    return $articles;
}

function get_auth_user($pseudo): array
{
    if ($pseudo) {
        return [
            'username' => $pseudo
        ];
    }

    return [];
}

function add_comment($pseudo, $comment)
{
    $mysqli = get_mysqli();
    mysqli_query($mysqli, "INSERT INTO commentaires (id_article, pseudo, corps, date) 
        VALUES('$_GET'id']}', '$pseudo', '$comment', NOW())") or die($mysqli->error);
}

function show_comments(): array
{
    $comments = [];
    $query = mysqli_query(get_mysqli(), "SELECT * FROM commentaires ORDER BY date");
    while($row = mysqli_fetch_assoc($query)){
        $comments[] = $row;
    }

    return $comments;
}
