<?php
session_start();

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
