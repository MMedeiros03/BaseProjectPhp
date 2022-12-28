<?php

namespace Nbwdigital\BaseProject\Controller;

use Nbwdigital\BaseProject\Repository\LoginRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Nbwdigital\BaseProject\Repository\UserRepository;
use Nbwdigital\BaseProject\Traits\Utils;
use Nbwdigital\BaseProject\Traits\Authorization;


class LoginController
{
    use Utils;
    use Authorization;

    public function Login(Request $request, Response $response, $args)
    {
        $authenticate = new LoginRepository();
        $result =  $authenticate->Login(json_decode($request->getBody(), true));
        if ($result) {
            $jwt = $this->GenerateJWT(json_decode($request->getBody(), true));
            $response->getBody()->write(json_encode([
                'token' => $jwt,
                'data' => $result 
            ]));
            header('Content-type: application/json');
            return $response;
        } else {
            $response->getBody()->write("erro");
            return $response;
        }
    }

}
