<?php

/**
 * rules for email field
 */
$errorsMessage = [
    'email' => false,
    'pwd'=> false,
    'pwdConfirm'=> false,
];
if(!empty($_POST['email'])) {
    if (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
    $errorsMessage['email'] = 'L\'adresse mail n\'est pas valide.'; 
    // check if email exists 
    } else if (checkAlreadyExistEmail()){ 
        $errorsMessage['email'] = 'L\'adresse existe déjà';
    }
}


/**
 * Check password format and match with password confirm
 */
if(!empty($_POST['pwd'])) {
    $regex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{10,}$/';
    if (!preg_match($regex, $_POST['pwd'])) {
        $errorsMessage['pwd'] = 'Merci de respecter le format indiqué.'; 
    // check if password exists 
    } else if ($_POST['pwd'] !== $_POST['pwdConfirm']) {
        $errorsMessage['pwdConfirm'] = 'Les mots de passe ne sont pas identiques';
    }
}


/**
 * Save user in database
 */
if (!empty($_POST)){
   if(!empty($_POST['email']) && !empty($_POST['pwd']) && !empty($_POST['pwdConfirm'])){
        if (!$errorsMessage['email'] && !$errorsMessage['pwd'] && !$errorsMessage['pwdConfirm']){
            
            if (!empty($_GET['id'])){
                updateUser();

            } else {
                addUser();
            
            }
            header('Location: ' . $router->generate('users'));
            die;
        
        } else {
        alert('Erreur lors de l\'ajout de l\'utilisateur.');
        }
    } else {
        alert('Merci de remplir tous les champs obligatoires.');
    }

} else if (!empty($_GET['id'])) {
    $_POST = (array) getUser();
}


