<?php

//pour faire passer les slugs dans l'URL 
$router->addMatchTypes(['slug' => '[a-z0-9]+(?:-[a-z0-9]+)*']);

//Movies
$router->map('GET', '/', 'home','home');
$router->map('GET', '/recherche', 'search');
$router->map('GET', '/films/[slug:slug]','detailsMovie','details'); // pour afficher les differentes pages de details

//Pages
$router->map('GET', '/contact', 'contact');
$router->map('GET', '/politique-de-referencement', 'private');
$router->map('GET', '/mentions-legales', 'legal-notice');


