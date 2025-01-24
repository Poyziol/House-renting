<?php

use app\controllers\LoginController;
// use app\controllers\Home_controller; // Changed HomeController to MainController
use App\Controllers\MainController;
use App\Controllers\AdminController;
use App\Controllers\MoveController;

use flight\Engine;
use flight\net\Router;

/** 
 * @var Router $router 
 * @var Engine $app
**/

//AUTO
$router->get('/', function () {
    Flight::render('landing/index');
});

//LOGIN, btw I made it auth for authentication so that login.php won't be confused with the login/ directory
$router->group('/login', function() use ($router) 
{
	$router->get('/user', [ LoginController::class, 'user' ]);                          //send to the function user of the controller LoginContoller
	$router->post("/check-user", [ LoginController::class , 'login_user']);             //send to the function login_user of the controller LoginContoller

    $router->get("/admin", [ LoginController::class , 'admin']);                        //send to the function admin of the controller LoginContoller
    $router->post("/check-admin", [ LoginController::class , 'login_admin']);           //send to the function login_admin of the controller LoginContoller

    $router->get("/sign-up", [ LoginController::class , 'sign_up']);                    //send to the function sign_up of the controller LoginContoller
    $router->post("/create-user", [ LoginController::class , 'login_sign']);    
    
    $router->get('/logout', [LoginController::class,'logout']);
});


// ----------------------------------------------------
// Admin: Anything about what the user does
// ----------------------------------------------------
$router->group('/admin', function () use ($router) {
    $router->get('/', [AdminController::class,'renderHouses']);
    $router->get('/houses', [AdminController::class, 'renderHouses']);
});
    
// ----------------------------------------------------
// Ajax calls
// ----------------------------------------------------
$router->group('/api', function () use ($router) {
    $router->get('/photos', [AdminController::class, 'getPhotos']);
});
