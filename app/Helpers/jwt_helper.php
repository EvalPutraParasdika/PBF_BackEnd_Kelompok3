<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

function createJWT($user)
{
    $key = getenv('JWT_SECRET');
    $payload = [
        'iss' => 'localhost', // issuer
        'aud' => 'localhost', // audience
        'iat' => time(),      // issued at
        'exp' => time() + 3600, // 1 hour
        'data' => [
            'id' => $user['id'],
            'username' => $user['username']
        ]
    ];

    return JWT::encode($payload, $key, 'HS256');
}

function validateJWT($token)
{
    try {
        $decoded = JWT::decode($token, new Key(getenv('JWT_SECRET'), 'HS256'));
        return $decoded->data;
    } catch (Exception $e) {
        return null;
    }
}
