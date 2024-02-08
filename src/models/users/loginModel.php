<?php
// faire des requêtes dans la bdd

// verif si l'user est autorisé à se connecter

/**
 * Check user access based on provided email and password.
 *
 * Queries the database for the user with the provided email, and compares the hashed
 * password with the provided password. Returns the user ID if access is granted, or false if denied.
 *
 * @return false|int Returns false if access is denied, or the user ID if access is granted.
 */
function checkUserAccess()
{
    global $db;
    $sql = 'SELECT id, pwd FROM users WHERE email = :email';
    $query = $db->prepare($sql);
    $query->execute(['email' => $_POST['email']]);

    $user = $query->fetch();

    // Vérifier si l'utilisateur existe et le mot de passe est correct
    if ($user && password_verify($_POST['pwd'], $user->pwd)) {
        return $user->id;
    } else {
        return false;
    }
}


/**
 * Save the last login timestamp for the user with the provided ID.
 *
 * Updates the 'lastLogin' column in the 'users' table with the current timestamp
 * for the user identified by the provided ID.
 *
 * @param string $userId The ID of the user.
 */
function saveLastLogin(string $userId) 
{
    global $db;
    $sql = 'UPDATE users SET lastLogin = NOW() WHERE id = :id';
    $query = $db->prepare($sql);
    $query->execute(['id' =>$userId]);

}
