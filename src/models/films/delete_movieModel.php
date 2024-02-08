<?php
/**
 * Delete user with id
 */
function deleteMovie ()
{
    
    try {
        global $db;
        $sql = 'DELETE FROM movies WHERE id = :id';
        $query = $db->prepare($sql);
        $query->execute(['id' =>$_GET['id']]);
    } catch (PDOException $e) {
        if ($_ENV['DEBUG'] == 'true') {
            dump($e->getMessage());
            die;
        } else {
            alert('Une erreur est survenue. Merci de réessayer plus tard.', 'danger');
        }
    }
}


/**
 * Retrieve the movie ID from the database based on the provided ID from the query parameters.
 *
 * Checks if a movie with the specified ID exists in the 'movies' table.
 * Returns an object containing the movie ID if found, or null if no movie is found.
 */
function getAlreadyExistId ()
{
    try {
        global $db;
        $sql = 'SELECT id FROM movies WHERE id = :id';
        $query = $db->prepare($sql);
        $query->execute(['id' => $_GET['id']]);

        return $query->fetch();
    } catch (PDOException $e) {
        if ($_ENV['DEBUG'] == 'true') {
            dump($e->getMessage());
            die;
        } else {
            alert('Une erreur est survenue. Merci de réessayer plus tard.', 'danger');
        }
    }
}
