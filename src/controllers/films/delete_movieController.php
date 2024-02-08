<?php
// Vérifier si un ID existe et que le compte est supérieur à 1, puis supprimer, sinon rediriger


/**
 * Deletes a movie based on the ID retrieved from the query parameters.
 *
 */
if (!empty($_GET['id']) && !empty(getAlreadyExistId()->id)) {
    deleteMovie();
} else {
    alert('Impossible de supprimer cet utilisateur.', 'danger');
}

header('Location: ' . $router->generate('movies'));
die;
