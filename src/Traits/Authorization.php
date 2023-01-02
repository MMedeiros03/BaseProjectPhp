<?php

namespace Nbwdigital\BaseProject\Traits;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

trait Authorization
{

    function GenerateJWT(array $data)
    {

        $token_expire = strtotime("+8 hours");

        $key = $_ENV['SECRET_KEY_JWT'];

        $payload = [
            'user' => $data['login'],
            'password' => $data['senha'],
            'ext' => $token_expire
        ];

        $jwt = Jwt::encode($payload, $key, 'HS256');
        return $jwt;
    }

    function DecodeJwt(string $jwt)
    {
        $key = $_ENV['SECRET_KEY_JWT'];
        $decoded = JWT::decode($jwt, new Key($key, 'HS256'));
        $decoded_array = (array) $decoded;
        return $decoded_array;
    }
}