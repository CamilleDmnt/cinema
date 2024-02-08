<?php
//vérifier que tous les champs soient remplis  
 
/**
 * Process the form data submitted for adding or updating a movie.
 */

$errorsMessage = [
    'title'=> false,
    'duration'=> false,
    'release_date'=>false,
    'director'=>false,
    'casting'=>false,
    'synopsis'=>false,
    'notePress'=>false,
    'categories'=>false,
    'photo'=>false
];

if (!empty($_POST)) {
    if (!empty($_POST['title']) && !empty($_POST['duration']) && !empty($_POST['release_date']) && !empty($_POST['director'])
        && !empty($_POST['casting']) && !empty($_POST['synopsis']) && !empty($_POST['notePress']) && !empty($_POST['categories']
        && !empty($_FILES['photo']))) {

        if (!$errorsMessage['title'] && !$errorsMessage['duration'] && !$errorsMessage['release_date']
            && !$errorsMessage['director'] && !$errorsMessage['casting']
            && !$errorsMessage['synopsis'] && !$errorsMessage['notePress'] && !$errorsMessage['categories'] && !$errorsMessage['photo']) {

                uploadFile('../public/image/posters', 'photo');

            if (!empty($_GET['id'])) {
                updateMovie(); 
            } else {
                addMovie(); 
            }

            alert('Le film a été ajouté avec succès.', 'success');

            header('Location:' . $router->generate('movies'));
            die;
        } else {
            alert('Erreur lors de l\'ajout du film.');
        }
    } else {
        alert('Merci de remplir tous les champs obligatoires.');
    }
} else if (!empty($_GET['id'])) {
    $_POST = (array) getMovies();
}



