<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(0);

require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app = AppFactory::create();

$app->setBasePath('/baseprojectphp');

$app->get('/api', function (Request $request, Response $response) {
    $response->getBody()->write("This is a Bitrix API");
    return $response;
});
// StartProject
$app->post("/startProject", [new Nbwdigital\BaseProject\Controller\StartProjectController, 'StartProject']);


// Login
$app->post("/login", [new Nbwdigital\BaseProject\Controller\LoginController, 'Login']);


// User
$app->get("/users", [new Nbwdigital\BaseProject\Controller\UserController, 'GetAllUsers']);
$app->post("/user/save", [new Nbwdigital\BaseProject\Controller\UserController, 'SaveUser']);
$app->get("/user/{id}", [new Nbwdigital\BaseProject\Controller\UserController, 'GetUser']);
$app->delete("/user/delete/{id}", [new Nbwdigital\BaseProject\Controller\UserController, 'DeleteUser']);


// Role
$app->get("/roles", [new Nbwdigital\BaseProject\Controller\RoleController, 'GetAllRoles']);
$app->post("/role/save", [new Nbwdigital\BaseProject\Controller\RoleController, 'SaveRole']);
$app->get("/role/{id}", [new Nbwdigital\BaseProject\Controller\RoleController, 'GetRole']);
$app->delete("/role/delete/{id}", [new Nbwdigital\BaseProject\Controller\RoleController, 'DeleteUser']);


// Role Permission
$app->get("/rolePermissions", [new Nbwdigital\BaseProject\Controller\RolePermissionController, 'GetAllRolePermissions']);
$app->post("/rolePermission/save", [new Nbwdigital\BaseProject\Controller\RolePermissionController, 'SaveRolePermission']);
$app->get("/rolePermission/{id}", [new Nbwdigital\BaseProject\Controller\RolePermissionController, 'GetRolePermission']);
$app->delete("/rolePermission/delete/{id}", [new Nbwdigital\BaseProject\Controller\RolePermissionController, 'DeleteUser']);


// Resource
$app->get("/resources", [new Nbwdigital\BaseProject\Controller\ResourceController, 'GetAllResource']);
$app->post("/resource/save", [new Nbwdigital\BaseProject\Controller\ResourceController, 'SaveResource']);
$app->get("/resource/{id}", [new Nbwdigital\BaseProject\Controller\ResourceController, 'GetResource']);
$app->delete("/resource/delete/{id}", [new Nbwdigital\BaseProject\Controller\ResourceController, 'DeleteUser']);




$app->run();
