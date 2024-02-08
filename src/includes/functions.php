<?php

/**
 * Get the header
 * @param string $title The title of the page
 * @param string $layout to use
 * @return void
 */
function get_header($title,$layout ='public'):void 
{
    global $router;
    require_once '../src/views/layouts/' . $layout . '/header.php';  
}

/**
 * Get the footer
 * @param string $layout The layout to use
 * @return void
 */
function get_footer ( $layout ='public'):void 
{
    require_once '../src/views/layouts/' . $layout . '/footer.php';  
}


/**
 * Create alert
 * @param string $message The message to save in alert
 * @param string $type  The type of alert
 * @return void
 */
//creer une alerte de session 
function alert( string $message , string $type = 'danger'): void 
{
    $_SESSION['alert'] = [
        'message' => $message,
        'type' => $type
    ];
}

//afficher le message d'alerte avec le message
/**
 * display alert session
 * @return void
 */
function displayAlert(): void //appelé sur admin/header.php
{
    if(!empty($_SESSION['alert'])){

        echo '<div class="alert alert-' . $_SESSION['alert']['type'] .'" role="alert">' . $_SESSION['alert']
        ['message'] . '</div>';
        //destroy session after first connexion
        unset($_SESSION['alert']);
    };
    
}


/**
 * Check if user is logged in
 * @param array $match The match array from AtloRouter
 * @param AltoRouter $router The router
 */
function checkAdmin(array $match,AltoRouter $router)
{
    $existAdmin = strpos ($match['target'], 'admin_');
    if($existAdmin !== false && empty($_SESSION['user']['id'])) {
        header('Location: ' . $router->generate('login'));
        die;
    }
}

/**
 * disconnect session if time is expired
 */
function logoutTimer() 
{
    global $router;

    if(!empty($_SESSION['user']['lastLogin'])){
        $expireHour = 60;

        $now = new DateTime();
        $now->setTimezone(new DateTimeZone ('Europe/Paris'));

        $lastLogin = new DateTime($_SESSION['user']['lastLogin']);

        if ($now->diff($lastLogin)->i >= $expireHour) {
            unset($_SESSION['user']);
            alert('Vous avez été déconnecté pour inactivité', 'danger');
            header('Location: ' . $router->generate('login'));
            die;
        } 


    }
}



