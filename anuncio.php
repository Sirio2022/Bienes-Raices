<?php

$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: /');
}

// Importamos la conexión a la base de datos
require 'includes/config/database.php';
$db = conectarDB();

// Escribir el query
$query = "SELECT * FROM propiedades WHERE id = $id";

// Consultar la base de datos
$resultadoConsulta = mysqli_query($db, $query);

if (!$resultadoConsulta->num_rows) {
    header('Location: /');
}

$propiedad = mysqli_fetch_assoc($resultadoConsulta);


require 'includes/funciones.php';

incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
    <h1>
        <?php echo $propiedad['titulo']; ?>
    </h1>

    <picture>
        <source srcset="/imagenes/<?php echo $propiedad['imagen']; ?>" type="image/webp" />
        <source srcset="/imagenes/<?php echo $propiedad['imagen']; ?>" type="image/jpg" />
        <img loading="lazy" src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt="anuncio" />
    </picture>

    <div class="resumen-propiedad">
        <p class="precio">
            $<?php echo $propiedad['precio'] ?>
        </p>

        <ul class="iconos-caracteristicas">
            <li>
                <img class="icono" src="build/img/icono_wc.svg" alt="icono caracteristica 1" />
                <p>
                    <?php echo $propiedad['wc'] ?>
                </p>
            </li>
            <li>
                <img class="icono" src="build/img/icono_estacionamiento.svg" alt="icono caracteristica 2" />
                <p>
                    <?php echo $propiedad['estacionamiento'] ?>
                </p>
            </li>
            <li>
                <img class="icono" src="build/img/icono_dormitorio.svg" alt="icono caracteristica 3" />
                <p>
                    <?php echo $propiedad['habitaciones'] ?>
                </p>
            </li>
        </ul>
        <p>
            <?php echo $propiedad['descripcion']; ?>
        </p>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam
            voluptatum, quibusdam, quia, quae voluptate quod voluptas
            voluptatibus quos doloribus quas quidem. Quisquam, quibusdam
            voluptatum. Quisquam, quibusdam voluptatum. Quisquam, quibusdam
            voluptatum.
        </p>
    </div>
</main>

<?php

mysqli_close($db);

incluirTemplate('footer');
?>