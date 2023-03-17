<?php
// controllers/FrontendController.php

class FrontendController extends Controller
{
    public function __construct()
    {
        $this->menuModel = $this->model('Menu');
    }

    public function index()
    {
        $menuItems = $this->menuModel->all();

        $data = [
            'title' => 'Home',
            'menuItems' => $menuItems
        ];

        $this->view('templates/frontend/partials/header', $data);
        $this->view('templates/frontend/index', $data);
        $this->view('templates/frontend/partials/footer');
    }

    // Hier können Sie weitere Methoden hinzufügen, um den Frontend-Bereich zu erweitern.
}
