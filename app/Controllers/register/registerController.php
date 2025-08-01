<?php

namespace App\Controllers\register;

use App\Controllers\BaseController;
use App\Models\User;

class registerController extends BaseController
{
    public function index()
    {
        $userModel = new User();

        // Example: Get all users
        $users = $userModel->findAll();

        // Pass data to a view (you can create a view accordingly)
        return view('auth/index', ['users' => $users]);
    }


    public function register()
    {
        // El problema era que es post estaba en minusculas y en mayusculas funciono POST
        if ($this->request->getMethod() === 'POST') {
            
            $userModel = new User();

            $data = [
                'usu_nombre'   => $this->request->getPost('usu_nombre'),
                'usu_apellido' => $this->request->getPost('usu_apellido'),
                'usu_email'    => $this->request->getPost('usu_email'),
                'usu_password' => $this->request->getPost('usu_password'),
                'usu_estado'   => 1
            ];
            
            $userModel->register($data);
            // Puedes redirigir o mostrar mensaje aquí si quieres
        }

        // Siempre muestra el formulario
        return view('register/index');
    }
}
