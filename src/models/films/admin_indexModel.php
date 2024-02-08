<?php
/**
 * Get all movies
 */
function getMovies()
{
    global $db;

    $sql = 'SELECT movies.*, categories.category
    FROM movies
    JOIN movie_categories ON movies.id = movie_categories.movie_id
    JOIN categories ON movie_categories.category_id = categories.id;';
    
    $query = $db->prepare($sql);
    $query->execute();

    return $query->fetchAll();
}

// dump(getMovies());
// die;