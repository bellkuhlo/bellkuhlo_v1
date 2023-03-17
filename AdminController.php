<?php
// controllers/AdminController.php

class AdminController extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
        $this->menuModel = $this->model('Menu');
    }

    public function index()
    {
        if (!isLoggedIn()) {
            header('Location: ' . URL . 'admin/login');
            exit();
        }

        $data = [
            'title' => 'Admin Dashboard'
        ];

        $this->view('templates/admin/partials/header', $data);
        $this->view('templates/admin/index', $data);
        $this->view('templates/admin/partials/footer');
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            $user = $this->userModel->findByUsername($username);

            if ($user && password_verify($password, $user->password)) {
                $_SESSION['user_id'] = $user->id;
                $_SESSION['user_username'] = $user->username;
                header('Location: ' . URL . 'admin');
                exit();
            } else {
                $data = [
                    'title' => 'Admin Login',
                    'error' => 'Invalid username or password'
                ];
            }
        } else {
            $data = [
                'title' => 'Admin Login'
            ];
        }

        $this->view('templates/admin/login', $data);
    }

    public function logout()
    {
        session_destroy();
        header('Location: ' . URL . 'admin/login');
        exit();
    }

    public function menu()
    {
        if (!isLoggedIn()) {
            header('Location: ' . URL . 'admin/login');
            exit();
        }

        $menuItems = $this->menuModel->all();
        $data = [
            'title' => 'Menu Management',
            'menuItems' => $menuItems
        ];

        $this->view('templates/admin/partials/header', $data);
        $this->view('templates/admin/pages/menu/index', $data);
        $this->view('templates/admin/partials/footer');
    }

    // Hier können Sie weitere Methoden hinzufügen, um den Admin-Bereich zu erweitern.
}
