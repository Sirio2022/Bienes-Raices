<?php

// Importamos la conexión a la base de datos
require __DIR__ . '/../config/database.php';
$db = conectarDB();

// Escribir el query
$query = "SELECT * FROM propiedades LIMIT $limite";

// Consultar la base de datos
$resultadoConsulta = mysqli_query($db, $query);




?>





<div class="contenedor-anuncios">
    <?php while ($propiedad = mysqli_fetch_assoc($resultadoConsulta)) : ?>
        <div class="anuncio">
            <picture>
                <source srcset="/imagenes/<?php echo $propiedad['imagen']; ?>" type="image/webp" />
                <source srcset="/imagenes/<?php echo $propiedad['imagen']; ?>" type="image/jpg" />
                <img loading="lazy" src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt="anuncio" />
            </picture>

            <div class="contenido-anuncio">
                <h3>
                    <?php echo $propiedad['titulo']; ?>
                </h3>
                <p>

                    <?php echo $propiedad['descripcion']; ?>
                </p>
                <p class="precio"> $<?php echo $propiedad['precio'] ?></p>

                <ul class="iconos-caracteristicas">
                    <li>
                        <img class="icono" src="build/img/icono_wc.svg" alt="icono caracteristica 1" />
                        <p> <?php echo $propiedad['wc'] ?></p>
                    </li>
                    <li>
                        <img class="icono" src="build/img/icono_estacionamiento.svg" alt="icono caracteristica 2" />
                        <p><?php echo $propiedad['estacionamiento'] ?></p>
                    </li>
                    <li>
                        <img class="icono" src="build/img/icono_dormitorio.svg" alt="icono caracteristica 3" />
                        <p><?php echo $propiedad['habitaciones'] ?></p>
                    </li>
                </ul>

                <a href="anuncio.php?id=<?php echo $propiedad['id'] ?>" class="boton-amarillo-block">
                    Ver Propiedad
                </a>
            </div>
            <!--.contenido-anuncio-->
        </div>
        <!--.anuncio-->
    <?php endwhile; ?>

</div>
<!--.contenedor de anuncios-->

<?php
// Cerrar la conexión
mysqli_close($db);

?>