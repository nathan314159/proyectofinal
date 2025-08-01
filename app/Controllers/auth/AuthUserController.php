<?php

namespace App\Controllers\auth;

use App\Controllers\BaseController;
use App\Models\User;

class AuthUserController extends BaseController
{

    public function loginForm()
    {
        return view('auth/login');
    }

    public function login()
    {

        $model = new User;
        $usu_email = $this->request->getPost('usu_email');
        $usu_password = $this->request->getPost('usu_password');
        $usuario = $model->where('usu_email', $usu_email)->first();

        // print_r($usuario['usu_id']);

        if ($usuario !== null && $usuario['usu_password'] === $usu_password) {
            session()->set([
                'usu_id' => $usuario['usu_id'],
                'usu_nombre' => $usuario['usu_nombre'],
                'isLoggedIn' => true
            ]);
            return redirect()->to('/mensaje/success'); // Página protegida
        } else {
            return redirect()->to('/login')->with('error', 'Cédula o contraseña incorrecta');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('auth/login');
    }
}
