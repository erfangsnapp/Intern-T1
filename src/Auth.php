<?php

namespace ErfanGooneh\T1;

use ErfanGooneh\T1\Models\User;

class Auth
{
    private const SECRET_KEY = '9afza5vpuemopj83ffu65gt9sh9v8n9s';
    static private function getSign($header, $payload)
    {
        $sign = hash_hmac('sha256', $header . '.' . $payload, self::SECRET_KEY);
        return $sign;
    }

    static public function generateToken($payload)
    {
        $payload['issued'] = time();
        $payload = base64_encode(json_encode($payload));
        $header = base64_encode(json_encode([
            'alg' => 'HS256',
            'typ' => 'JWT'
        ]));
        $sign = base64_encode(self::getSign($header, $payload));
        return "$header.$payload.$sign";
    }

    static public function validateToken($token)
    {
        $parts = explode('.', $token);
        if (count($parts) != 3)
            return false;
        list($header, $payload, $sign) = $parts;
        if (base64_encode(self::getSign($header, $payload)) === $sign)
            return true;
        return false;
    }

    static public function getPayload($token)
    {
        $parts = explode('.', $token);
        if (count($parts) != 3)
            return false;
        list($header, $payload, $sign) = $parts;
        $payload = json_decode(base64_decode($payload), true);
        return $payload;
    }

    static public function getUser()
    {
        if (!isset($_SERVER['HTTP_AUTHORIZATION']))
            return NULL;
        $token = $_SERVER['HTTP_AUTHORIZATION'];
        if (!self::validateToken($token)) {
            http_response_code(400);
            exit();
        }
        $payload = self::getPayload($token);
        $user = User::get($payload['username']);
        return $user;
    }
}