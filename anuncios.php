<?php

require 'includes/funciones.php';

incluirTemplate('header');
?>

<main class="contendedor seccion">

    <h2>Casas y Aptos en Venta</h2>

    <?php
    $limite = 10;
    include 'includes/template/anuncios.php';
    ?>
</main>

<?php
incluirTemplate('footer');
?>