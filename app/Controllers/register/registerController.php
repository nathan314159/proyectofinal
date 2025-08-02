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
        $errors = [];
        if ($this->request->getMethod() === 'POST') {
            $userModel = new User();

            $data = [
                'usu_nombre'   => $this->request->getPost('usu_nombre'),
                'usu_apellido' => $this->request->getPost('usu_apellido'),
                'usu_email'    => $this->request->getPost('usu_email'),
                'usu_password' => $this->request->getPost('usu_password'),
                'usu_estado'   => 1
            ];

            if (!$userModel->register($data)) {
                $errors = $userModel->errors();
            } else {
                return redirect()->to('/mensaje/success');
            }
        }

        return view('register/index', ['errors' => $errors]);
    }

    public function delete()
    {
        $userModel = new User();
        $usu_id = $this->request->getPost('usu_id');
        $total = $userModel->countAll();
        echo $total;
        if ($total <= 1) {
            return redirect()->back()->with('error', 'Debe quedar al menos un usuario en el sistema.');
        }
        $userModel->delete($usu_id);
        return redirect()->back()->with('success', 'Usuario eliminado correctamente.');
    }
}
