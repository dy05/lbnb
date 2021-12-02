<?php

//la function qui va récupérer les infos de l'utilisateur connecté
function auth_user_info($key = null)
{
    $infos = [];

    if(isset($_SESSION['pseudo'])) {
        $pseudo = $_SESSION['pseudo'];
        $query = mysqli_query(get_mysqli(), "SELECT * FROM utilisateurs WHERE pseudo = '$pseudo'");

        while ($row = mysqli_fetch_assoc($query)) {
            $infos[] = $row;
        }
    }

    if ($key !== null && isset($infos[$key])) {
        return $infos[$key];
    }

    return $infos;
}

// la function qui va compter le number de personnes inscrites
function count_member(): int
{
    $query = mysqli_query(get_mysqli(), "SELECT COUNT(id) FROM utilisateurs");
    return $query->num_rows;
}
