<?php
//mostrar errores de PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//cargar rutas
require_once __DIR__ . '/routes.php';
require_once __DIR__ . '/src/util/Optional.php';
require_once __DIR__ . '/src/util/Validador.php';
require_once __DIR__ . '/src/conduct/Creable.php';
require_once __DIR__ . '/src/model/Entidad.php';
require_once __DIR__ . '/src/model/Mesa.php';
require_once __DIR__ . '/src/model/Rol.php';
require_once __DIR__ . '/src/model/Foto.php';
require_once __DIR__ . '/src/model/Usuario.php';
require_once __DIR__ . '/src/model/Cuestionario.php';
require_once __DIR__ . '/src/model/Respuesta.php';
?>