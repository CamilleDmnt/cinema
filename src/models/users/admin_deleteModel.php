<?php
/**
 * Delete user with id
 */
function deleteUser ()
{
    
    try {
        global $db;
        $sql = 'DELETE FROM users WHERE id = :id';
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


//Virer un utilisateur un peu trop curieux

/**
 * Retrieve user ID from the database based on the provided ID.
 *
 * @return stdClass|null Returns an object with the user ID if found, or null if not found.
 */
function getAlreadyExistId ()
{
    try {
        global $db;
        $sql = 'SELECT id FROM users WHERE id = :id';
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

//compter le nombre de users dans la bdd pour éviter de supprimer le compte Admin par erreur
// ça fonctionne mais le message d'alerte ne s'affiche pas

/**
 * Count the total number of users in the database.
 *
 * @return int Returns the total number of users.
 */
function countUsers()
{
    global $db;
    $sql='SELECT COUNT(*) FROM users';
    $query = $db->prepare($sql);
    $query->execute();

    return $query->fetchColumn();
}
