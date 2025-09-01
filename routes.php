<?php

function dispatch($route)
{
    if ($route === '') {
        require __DIR__ . '/pages/login.php';
        return;
    }

    if ($route === 'login') {
        require __DIR__ . '/pages/login.php';
        return;
    }

    if ($route === 'register') {
        session_start();
        unset($_SESSION['token']); // Borrar token guardado
        require __DIR__ . '/pages/register.php';
        return;
    }

    if (preg_match('#^register/([a-zA-Z0-9]+)$#', $route, $matches)) {
        $_GET['token'] = $matches[1];
        require __DIR__ . '/pages/register.php';
        return;
    }

    if ($route === 'inicio') {
        require __DIR__ . '/pages/dashboard.php';
        return;
    }

    require __DIR__ . '/pages/404.php';
}

