<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;

class AuthController extends ResourceController
{
    public function register()
    {
        $data = $this->request->getJSON(true);

        $userModel = new UserModel();
        $existing = $userModel->where('email', $data['email'])->first();

        if ($existing) {
            return $this->fail('Email sudah terdaftar', 409);
        }

        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        $userModel->save($data);

        return $this->respondCreated(['message' => 'Registrasi berhasil']);
    }

    public function login()
    {
        $data = $this->request->getJSON(true);

        $userModel = new UserModel();
        $user = $userModel->where('email', $data['email'])->first();

        if (!$user || !password_verify($data['password'], $user['password'])) {
            return $this->failUnauthorized('Email atau password salah');
        }

        helper('jwt');
        $token = createJWT($user);

        return $this->respond(['token' => $token]);
    }

    public function me()
{
    $authHeader = $this->request->getHeaderLine('Authorization');
    if (!$authHeader) return $this->failUnauthorized('Token tidak ditemukan');

    $token = str_replace('Bearer ', '', $authHeader);
    helper('jwt');
    $data = validateJWT($token);

    if (!$data) return $this->failUnauthorized('Token tidak valid');

    $userModel = new \App\Models\UserModel();
    $user = $userModel->find($data->id);

    if (!$user) return $this->failNotFound('User tidak ditemukan');

    return $this->respond(['user' => $user]);
}

}
