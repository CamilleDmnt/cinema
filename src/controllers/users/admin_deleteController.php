<?php

/**
 * Delete a user based on the ID retrieved from the query parameters.
 */

if (!empty($_GET['id']) && !empty(getAlreadyExistId()->id) &&  countUsers() > 1) {
    deleteUser();
} else {
    alert('Impossible de supprimer cet utilisateur.','danger');
}
header('Location: ' . $router->generate('users'));
die;