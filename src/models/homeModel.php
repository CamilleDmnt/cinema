<!-- Model Home  interraction avec la base de données-->

<?php 

function getMovies()
{
    global $db;
    $sql = 'SELECT * FROM movies ORDER BY created DESC';
    $query = $db->prepare($sql);
    $query->execute();

    return $query->fetchAll();
}