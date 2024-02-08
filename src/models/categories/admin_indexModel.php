<?php
/**
 * Get all categories
 */
function getCategories()
{
    global $db;

    $sql = 'SELECT * FROM categories;';
    
    $query = $db->prepare($sql);
    $query->execute();

    return $query->fetchAll();
}

// dump(getMovies());
// die;