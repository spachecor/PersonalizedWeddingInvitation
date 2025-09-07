<?php
session_start();
use util\Optional;
use model\Mesa;

// Si viene el token por GET, lo guardamos en sesión
if (isset($_GET['token'])) {
    $_SESSION['token'] = $_GET['token'];
}

$codigo = isset($_SESSION['token']) ? htmlspecialchars($_SESSION['token']) : null;
?>

<h1>Página de Registro</h1>

<?php if ($codigo): ?>
    <p>Tu código es: <strong><?= $codigo ?></strong></p>
    <p>Aquí va el formulario de registro.</p>
<?php else: ?>
    <p>NO TIENES CODIGO BB</p>
<?php endif; ?>

<?php
// Crear una Mesa con id=1, nombre="Principal", capacidad=4
$mesaOptional = Mesa::crear(1, "Principal", 4);

// Comprobar si la mesa se creó
if ($mesaOptional->isPresent()) {
    $mesa = $mesaOptional->get(); // Objeto Mesa real
    echo $mesa;
} else {
    echo "<p>Error: No se pudo crear la mesa</p>";
}
?>

