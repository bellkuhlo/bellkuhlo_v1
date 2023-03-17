<?php
// core/helpers/auth.php

session_start();

use models\User;

function checkIfLoggedIn()
{
    if (isset($_SESSION['user_id'])) {
        return true;
    }
    return false;
}

function requireLogin()
{
    if (!checkIfLoggedIn()) {
        header('Location: /bellkuhlo/templates/admin/login.php');
        exit;
    }
}

function attemptLogin($username, $password)
{
    $userModel = new User();
    $user = $userModel->findByUsername($username);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        return true;
    }
    return false;
}

function logout()
{
    unset($_SESSION['user_id']);
}
