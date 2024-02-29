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
    static public function isAuthenticated()
    {
        if (!isset($_COOKIE['token']))
            return false;
        $token = $_COOKIE['token'];;
        return self::validateToken($token);
    }
    static public function getUser()
    {
        if(!self::isAuthenticated()){
            return NULL; 
        }
        $token = $_COOKIE['token'];
        $payload = self::getPayload($token);
        $username = $payload['username'];
        $user = User::get(['username'=>$username]);
        return $user;
    }
}
