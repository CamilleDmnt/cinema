<?php

$db;

//Check if the email is already in the database
function checkAlreadyExistEmail ():mixed
{
    global $db;

    if (!empty($_GET['id'])){
        $email = getUser()->email;

        if($email === $_POST['email']) {
            return false;
        }
    } 

    $sql = 'SELECT email FROM users WHERE email = :email';
    $query = $db->prepare($sql);
    $query->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
    $query->execute();

    return $query->fetch();
}




// requetes et insertion à la base de donnees

//Add a user in  the database
function addUser():bool
{
    global $db;
    $data = [
        'email' => $_POST['email'], 
        'pwd' => password_hash ($_POST['pwd'],PASSWORD_DEFAULT), // utiliser le protocole hash sur le pwd
        'role_id'=> 1
    ];

    try {
        $sql = 'INSERT INTO users (id,email,pwd,role_id) VALUES (UUID(),:email,:pwd,:role_id)';
        $query = $db->prepare($sql);
        $query->execute ($data); 
        alert('Un utilisateur a bien été ajouté.' , 'success');
    } catch (PDOException $e) {
        if($_ENV['DEBUG'] == 'true') { // vérif la chaine de caractères
          dump($e->getMessage());
          die;  
        }else {
            alert('Une erreur est survenue. Merci de réessayer plus tard');
        }
        
    }
    return true;
}

//Update users with same id
function updateUser():void
{
    global $db;
    $data = [
        'email' => $_POST['email'], 
        'pwd' => password_hash ($_POST['pwd'],PASSWORD_DEFAULT), // utiliser le protocole hash sur le pwd
        'id'=> $_GET['id'] //modifier les infos avec le même id
    ];

    try{
        $sql = 'UPDATE users SET email = :email, pwd = :pwd , modified = NOW() WHERE id = :id';
        $query = $db->prepare($sql);
        $query->execute ($data);
        alert('Un utilisateur a bien été modifié.' , 'success');
    } catch (PDOException $e) {
        if($_ENV['DEBUG'] == 'true'){
            dump($e->getMessage());
            die;
        } else {
            alert('Une erreur est survenue. Merci de réessayer plus tard');
        }
        
    }  
}

//Récupérer les infos utilisateurs et éviter que l'utilisateur injecte dans l'URL un ID qui n'existe pas encore

/**
 * Retrieve user details from the database based on the provided ID.
 *
 * @return mixed Returns an associative array representing the user details if found,
 *               or false if no user with the specified ID is found.
 */
function getUser(){
    global $db;

    try {
      $sql = 'SELECT email FROM users WHERE id = :id';
      $query = $db->prepare($sql);
      $query->execute(['id' => $_GET['id']]);
      
      return $query->fetch();  
    } catch (PDOException $e){
        if($_ENV['DEBUG'] == 'true'){
            dump($e->getMessage());
            die;
        } else {
            alert('Une erreur est survenue. Merci de réessayer plus tard');
        }
    }
    
}



