<?php
//vérifier que tous les champs soient remplis  
 
/**
 * Process the form data submitted for adding or updating category.
 */

$errorsMessage = [
    'category'=>false
];

if (!empty($_POST)) {
    if ( !empty($_POST['category'])) {

        if (!$errorsMessage['categoy']) {

            if (!empty($_GET['id'])) {
                updateCat(); 
            } else {
                addCat(); 
            }

            alert('La catégorie a été ajouté avec succès.', 'success');

            header('Location:' . $router->generate('categories'));
            die;
        } else {
            alert('Erreur lors de l\'ajout de la catégorie.');
        }
    } else {
        alert('Merci de remplir tous les champs obligatoires.');
    }
} else if (!empty($_GET['id'])) {
    $_POST = (array) getCategories();
}
