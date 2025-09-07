<?php
require_once __DIR__ . '/load.php';
// Obtener la ruta limpia
$request = strtok($_SERVER['REQUEST_URI'], '?');
$basePath = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
$route = trim(preg_replace('#^' . preg_quote($basePath, '#') . '#', '', $request), '/');

// Llamar al router
dispatch($route);
