<?php 

/**
 * HoneyPot and check user informations
 */
if (!empty($_POST['honeypot'])) {
    //HoneyPot field filled, probably a bot

    header('Location: ' . $router->generate('home'));
    die;
} else {
    //HoneyPot field blank, process request normally
    // Usual checks (email, password, etc.)
    if(!empty($_POST['email']) && !empty($_POST['pwd'])){
      $accessUser = checkUserAccess();
  if (!empty($accessUser)) {
      $_SESSION['user'] = [
          'id' => $accessUser,
          'lastLogin' => date('Y-m-d H:i:s')
      ];
      saveLastLogin($accessUser);
      alert('Vous êtes connecté' , 'success');
      header('Location: ' . $router->generate('users'));
      die;
  } else {
      alert('Identifiants incorrects');
  }
  
  }   
 
}

/**
 * Brutforce
 * If the user tries to connect too many times, ex:<5 it can be blocked for 5 min 
 */ 


function limitAttemps()
{
    global $router;

    if (!empty($_SESSION['attemps']['time'])) {
        $date = new DateTimeImmutable();
        $now = $date->getTimestamp();
        $diff = $now - $_SESSION['attemps']['time'];

        if ($diff > 300) {
            unset($_SESSION['attemps']);
        } else {
            alert('Trop de tentatives, veuillez réessayer dans 5 minutes');
            header('Location: ' . $router->generate('home'));
            die;
        }
    } else {
        if (empty($_SESSION['attemps'])) {
            $_SESSION['attemps']['count'] = 1;
        } else if (!empty($_SESSION['attemps']['count']) && $_SESSION['attemps']['count'] < 5) {
            $_SESSION['attemps']['count']++;
        } else if ($_SESSION['attemps']['count'] >= 5) {
            $date = new DateTimeImmutable();
            $_SESSION['attemps']['time'] = $date->getTimestamp();
        }
    }
}

if (!empty($_POST['email']) && !empty($_POST['pwd'])) {
    $accessUser = checkUserAccess();
    if (!empty($accessUser)) {
        $_SESSION['user'] = [
            'id' => $accessUser,
            'lastLogin' => date('Y-m-d H:i:s')
        ];

        saveLastLogin($accessUser);
        unset($_SESSION['attemps']);

        alert('Vous êtes connecté', 'success');
        header('Location: ' . $router->generate('users'));
        die;
    } else {
        limitAttemps();
        alert('Identifiants incorrects');
    }
}