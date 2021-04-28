<?php

// var_dump($_SERVER);

// Include file for all the classes
require __DIR__ . '/../vendor/autoload.php';

// New object with AltoRouter
$router = new AltoRouter();

session_start();

// Specify to the router that the website is in this subfolder
// (starting from the root of the web server)
// If there is a sub-folder
if (array_key_exists('BASE_URI', $_SERVER)) {
    // Then define the AltoRouter's basePath
    $router->setBasePath($_SERVER['BASE_URI']);
} else {
    // The default value will be $_SERVER['BASE_URI'] (use in CoreController)
    $_SERVER['BASE_URI'] = '/';
}

// Map Homepage to inform the router of all available routes

// STEP FOR MAIN PAGES : 2
// To log in
$router->map('GET|POST','/',['controller' => 'UserController', 'method' => 'login'],'user-login');
// To log out when connected
$router->map('GET','/logout',['controller' => 'UserController', 'method' => 'logout'],'user-logout');
// To ask new password
$router->map('GET|POST','/password-request',['controller' => 'UserController', 'method' => 'passwordRequest'],'password-request');
// To reset password
$router->map('GET|POST','/password-reset',['controller' => 'UserController', 'method' => 'passwordReset'],'password-reset');

// STEP FOR ADMIN : 2
// To see the admin page
$router->map('GET', '/admin', ['controller' => 'AdminController', 'method' => 'admin'], 'admin');
$router->map('POST', '/admin', ['controller' => 'AdminController', 'method' => 'getPattern'], 'admin-pattern');

// STEP USERS : 4
// To see the users list
$router->map('GET', '/admin/user-list', ['controller' => 'AdminController', 'method' => 'userList'], 'user-list');
// To add an user
$router->map('GET|POST','/admin/user-add',['controller' => 'AdminController', 'method' => 'userAdd'],'user-add');
// To edit an user
$router->map('GET|POST','/admin/[i:id]/user-edit',['controller' => 'AdminController', 'method' => 'userEdit'],'user-edit');
// To delete an user
$router->map('GET','/admin/[i:id]/user-delete',['controller' => 'AdminController', 'method' => 'userDelete'],'user-delete');

// STEP PATTERNS IN FRENCH : 4
// To see the patterns list
$router->map('GET', '/admin/pattern-list', ['controller' => 'AdminController', 'method' => 'motifList'], 'pattern-list');
// To add an pattern
$router->map('GET|POST','/admin/pattern-add',['controller' => 'AdminController', 'method' => 'motifAdd'],'pattern-add');
// To edit an pattern
$router->map('GET|POST','/admin/[i:id]/pattern-edit',['controller' => 'AdminController', 'method' => 'motifEdit'],'pattern-edit');
// To delete an pattern
$router->map('GET','/admin/[i:id]/pattern-delete',['controller' => 'AdminController', 'method' => 'motifDelete'],'pattern-delete');

// STEP PATTERNS IN ENGLISH : 4
// To see the patterns list
$router->map('GET', '/en/admin/pattern-list', ['controller' => 'AdminController', 'method' => 'patternList'], 'pattern-list-en');
// To add an pattern
$router->map('GET|POST','/en/admin/pattern-add',['controller' => 'AdminController', 'method' => 'patternAdd'],'pattern-add-en');
// To edit an pattern
$router->map('GET|POST','/en/admin/[i:id]/pattern-edit',['controller' => 'AdminController', 'method' => 'patternEdit'],'pattern-edit-en');
// To delete an pattern
$router->map('GET','/en/admin/[i:id]/pattern-delete',['controller' => 'AdminController', 'method' => 'patternDelete'],'pattern-delete-en');

// STEP FOR SITE IN FRENCH : 7
// To see home page
$router->map('GET','/home',['controller' => 'MainController', 'method' => 'home'],'home');
// To get the pattern
$router->map('POST','/home',['controller' => 'PatternController', 'method' => 'getPattern'],'pattern');
// To see abbreviations page
$router->map('GET','/abreviations',['controller' => 'MainController', 'method' => 'abbreviations'],'abbreviations');
// To see tutoriels page
$router->map('GET','/tutoriels',['controller' => 'MainController', 'method' => 'tutorials'],'tutorials');
// To see gallery page
$router->map('GET','/galerie',['controller' => 'MainController', 'method' => 'gallery'],'gallery');
// To see user account when connected
$router->map('GET','/account',['controller' => 'UserController', 'method' => 'account'],'user-account');
// To modify account
$router->map('GET|POST','/account/[i:id]/edit',['controller' => 'UserController', 'method' => 'accountEdit'],'user-account-edit');

// STEP FOR SITE IN ENGLISH : 7
// To see home page
$router->map('GET','/en/home',['controller' => 'MainController', 'method' => 'homeEn'],'home-en');
// To get the pattern
$router->map('POST','/en/home',['controller' => 'PatternController', 'method' => 'getPatternEn'],'pattern-en');
// To see abbreviation page
$router->map('GET','/en/abbreviations',['controller' => 'MainController', 'method' => 'abbreviationsEn'],'abbreviations-en');
// To see tutoriels page
$router->map('GET','/en/tutorials',['controller' => 'MainController', 'method' => 'tutorialsEn'],'tutorials-en');
// To see gallery page
$router->map('GET','/en/gallery',['controller' => 'MainController', 'method' => 'galleryEn'],'gallery-en');
// To see user account when connected
$router->map('GET','/en/account',['controller' => 'UserController', 'method' => 'accountEn'],'user-account-en');
// To modify account
$router->map('GET|POST','/en/account/[i:id]/edit',['controller' => 'UserController', 'method' => 'accountEditEn'],'user-account-edit-en');

// Check the current URL and provide the corresponding informations
$match = $router->match();

// https://packagist.org/packages/benoclock/alto-dispatcher
// Dispatch in the good method of the good controller
// 1st argument : $match returned by AltoRouter
// 2nd argument : "target" (controller & method) to display error 404
$dispatcher = new Dispatcher($match, '\Socks\Controllers\ErrorController::error404');
// Setup controllers' namespace
$dispatcher->setControllersNamespace('Socks\Controllers');
// Setup controllers' arguments
$dispatcher->setControllersArguments([$match, $router]);
// Run the dispatch method which will call the mapped method
$dispatcher->dispatch();