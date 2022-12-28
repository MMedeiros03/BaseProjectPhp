<?php

namespace Nbwdigital\BaseProject\Controller;


use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Nbwdigital\BaseProject\Repository\RolePermissionRepository;
use Nbwdigital\BaseProject\Traits\Utils;


class RolePermissionController
{
    use Utils;

    public function GetAllRolePermissions(Request $request, Response $response, $args)
    {
        $roles = new RolePermissionRepository();

        $result =  $roles->GetAll();
        $resultJson = json_encode($result);
        if ($result) {
            $response->getBody()->write($resultJson);
            header('Content-type: application/json');
            return $response;
        } else {
            $response->getBody()->write("sem profissões cadastradas");
            return $response;
        }
    }

    public function SaveRolePermission(Request $request, Response $response, $args)
    {
        $user = new RolePermissionRepository();

        $result =  $user->Save();
        $resultJson = json_encode($result);
        if ($result) {
            $response->getBody()->write($resultJson);
            header('Content-type: application/json');
            return $response;
        } else {
            $response->getBody()->write("profissão não cadastrada");
            return $response;
        }
    }

    public function GetRolePermission(Request $request, Response $response, $args)
    {
        $user = new RolePermissionRepository();
        $result =  $user->GetById($args['id']);
        $resultJson = json_encode($result);
        if ($result) {
            $response->getBody()->write($resultJson);
            header('Content-type: application/json');
            return $response;
        } else {
            $response->getBody()->write("usuario inexistente");
            return $response;
        }
    }

    // public function DeleteUser(Request $request, Response $response, $args)
    // {
    //     // $validateAuthentication = $this->GenerateJWT($request->getHeader());
    //     $user = new UserRepository();
    //     $result =  $user->Delete($args['id']);
    //     if ($result) {
    //         $response->getBody()->write("usuario deletado");
    //         return $response;
    //     } else {
    //         $response->getBody()->write("usuario nÃ£o existe");
    //         return $response;
    //     }
    // }

    // public function CreateUser(Request $request, Response $response, $args)
    // {
    //     $user = new UserRepository();
    //     $data = json_decode($request->getBody(), true);
    //     $result =  $user->Add($data);

    //     if ($result) {
    //         $response->getBody()->write("usuario criado");
    //         return $response;
    //     } else {
    //         $response->getBody()->write("usuario nÃ£o cadastado");
    //         return $response;
    //     }
    // }
}
