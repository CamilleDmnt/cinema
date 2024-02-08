<?php

$admin = '/' . $_ENV['ADMIN_FOLDER'];

$router->addMatchTypes(['uuid' => '[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{12}']);

//Admin / Users
$router->map( 'GET|POST', $admin . '/connexion', 'users/login','login');// 3
$router->map( 'GET', $admin . '/deconnexion','users/admin_logout','logout');// 4 

$router->map( 'GET', $admin . '/utilisateurs', 'users/admin_index','users'); //1

$router->map( 'GET|POST', $admin . '/utilisateurs/editer/[uuid:id]', 'users/admin_edit','editUser');// 2 / 5 
$router->map( 'GET|POST', $admin . '/utilisateurs/editer', 'users/admin_edit','addUser');// 2 / 5 

$router->map( 'GET', $admin . '/utilisateurs/supprimer/[uuid:id]', 'users/admin_delete','deleteUser');// 6 
$router->map( 'GET', $admin . '/mot-de-passe-oublie', '','lostPassword');// 7 

//Movies
$router->map( 'GET', $admin . '/films', '/films/admin_index','movies'); //Liste des films

$router->map( 'GET|POST', $admin . '/films/editer/[i:id]', 'films/edit_movie','editMovie');// modifier des films
$router->map( 'GET|POST', $admin . '/films/editer', 'films/edit_movie','addMovie');//ajouter des films
$router->map( 'GET', $admin . '/films/supprimer/[i:id]', 'films/delete_movie','deleteMovie');//supprimer des films

//Categories
$router->map( 'GET', $admin . '/categories', '/categories/admin_index','categories'); //listes de mes categories -> admin_indexView

$router->map( 'GET|POST', $admin . '/categories/editer/[i:id]', 'categories/edit_cat','editCat'); // modifier les catégories
$router->map( 'GET|POST', $admin . '/categories/editer/', 'categories/edit_cat','addCat');//ajouter des catégories -> edit_catView

$router->map( 'GET', $admin . '/categories/supprimer/[i:id]', 'categories/delete_cat','deleteCat'); //supprimer les catégories