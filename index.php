<?php

require 'includes/funciones.php';

incluirTemplate('header', $inicio = true);
?>




<main class="contenedor seccion">
    <h1>Más sobre Nosotros</h1>

    <div class="iconos-nosotros">
        <div class="icono">
            <img src="build/img/icono1.svg" alt="icono seguridad" loading="lazy" />
            <h3>Seguridad</h3>
            <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Modi
                quidem error corporis, minima nulla beatae quae voluptatem cum
                tempora itaque deserunt ex nostrum blanditiis, consectetur optio
                maxime sapiente, harum nesciunt.
            </p>
        </div>
        <div class="icono">
            <img src="build/img/icono2.svg" alt="icono precio" loading="lazy" />
            <h3>Precio</h3>
            <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Modi
                quidem error corporis, minima nulla beatae quae voluptatem cum
                tempora itaque deserunt ex nostrum blanditiis, consectetur optio
                maxime sapiente, harum nesciunt.
            </p>
        </div>
        <div class="icono">
            <img src="build/img/icono3.svg" alt="icono tiempo" loading="lazy" />
            <h3>A tiempo</h3>
            <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Modi
                quidem error corporis, minima nulla beatae quae voluptatem cum
                tempora itaque deserunt ex nostrum blanditiis, consectetur optio
                maxime sapiente, harum nesciunt.
            </p>
        </div>
    </div>
</main>

<section class="contenedor">
    <h2>Casas y Aptos en Venta</h2>

    <?php 
        $limite = 3;
        include 'includes/template/anuncios.php';
    ?>

    <div class="alinear-derecha">
        <a href="anuncios.php" class="boton-verde">Ver todas</a>
    </div>
</section>

<section class="imagen-contacto">
    <h2>Encuentra la vivienda de tus sueños</h2>
    <p>
        Llena el formulario de contacto y un asesor se pondrá en contacto
        contigo a la brevedad
    </p>
    <a href="contacto.php" class="boton-amarillo">Contactános</a>
</section>

<div class="contenedor seccion seccion-inferior">
    <section class="blog">
        <h3>Nuestro Blog</h3>
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog1.webp" type="image/webp" />
                    <source srcset="build/img/blog1.jpg" type="image/jpg" />
                    <img src="build/img/blog1.jpg" alt="imagen blog 1" loading="lazy" />
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Terraza en el techo de tu casa: guía para construir</h4>
                    <p class="informacion-meta">
                        Escrito el: <span>20/10/2023</span> por: <span>Admin</span>
                    </p>
                    <p>
                        Consejos para construir una terraza en el techo de tu casa con
                        los mejores materiales y ahorrando dinero
                    </p>
                </a>
            </div>
        </article>
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog2.webp" type="image/webp" />
                    <source srcset="build/img/blog2.jpg" type="image/jpg" />
                    <img src="build/img/blog2.jpg" alt="imagen blog 2" loading="lazy" />
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Guía para la decoración de tu hogar</h4>
                    <p class="informacion-meta">
                        Escrito el: <span>20/10/2023</span> por: <span>Admin</span>
                    </p>
                    <p>
                        Maximiza el espacio en tu hogar con esta guía, aprende a
                        combinar muebles y colores para darle vida a tu espacio
                    </p>
                </a>
            </div>
        </article>
    </section>

    <section class="testimoniales">
        <h3>Testimoniales</h3>
        <div class="testimonial">
            <blockquote>
                El personal se comporto de una excelente manera, la comida y las
                instalaciones son excelentes. Muy recomendado!
            </blockquote>
            <p>- Juan Manuel Alvarez</p>
        </div>
    </section>
</div>

<?php
incluirTemplate('footer');
?>