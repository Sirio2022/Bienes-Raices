<?php

// Importar la conexión
require 'includes/config/database.php';
$db = conectarDB();

// Autenticar el usuario

$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";

    $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (!$email) {
        $errores[] = "El Email es obligatorio o no es válido";
    }

    if (!$password) {
        $errores[] = "El Password es obligatorio o no es válido";
    }

    if (empty($errores)) {

        // Revisar si el usuario existe

        $query = "SELECT * FROM usuarios WHERE email = '$email'";
        $resultadoConsulta = mysqli_query($db, $query);


        if ($resultadoConsulta->num_rows) {
            // Revisar si el password es correcto
            $usuario = mysqli_fetch_assoc($resultadoConsulta);

            //var_dump($usuario['password']);
            // Verificar si el password es correcto o no
            $auth = password_verify($password, $usuario['password']);

            if ($auth) {
                // El usuario esta autenticado
                session_start();

                // Llenar el arreglo de la sesión
                $_SESSION['usuario'] = $usuario['email'];
                $_SESSION['login'] = true;
  
                header('Location: /admin');
            } else {
                $errores[] = "El Password es incorrecto";
            }
        } else {
            $errores[] = "El Usuario no existe";
        }
    }
}




// Inluir un template Header
require 'includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesión</h1>

    <?php
    foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>

    <?php endforeach; ?>

    <form method="POST" class="formulario">
        <fieldset>
            <legend>Email y Password</legend>

            <label for="email">E-mail</label>
            <input type="email" placeholder="Tu Email" name="email" id="email" />
            <label for="telefono">Password</label>
            <input type="password" placeholder="Tu Password" name="password" id="password" />

        </fieldset>

        <input type="submit" value="Iniciar Sesión" class="boton boton-verde" />
    </form>
</main>

<?php
incluirTemplate('footer');
?>