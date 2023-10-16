<?php

  require 'includes/funciones.php';
  
  incluirTemplate('header');
?>

    <main class="contenedor seccion">
      <h1>Conoce Sobre Nosotros</h1>

      <div class="contenido-nosotros">
        <div class="imagen">
          <picture>
            <source srcset="build/img/nosotros.webp" type="image/webp" />
            <source srcset="build/img/nosotros.jpg" type="image/jpg" />
            <img
              src="build/img/nosotros.jpg"
              alt="sobre nosotros"
              loading="lazy"
            />
          </picture>
        </div>
        <div class="texto-nosotros">
          <blockquote>Más de 25 años de experiencia</blockquote>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam
            voluptatum, quibusdam, voluptates, quia voluptate quod quos
            voluptatibus quas voluptatem quidem doloribus. Quisquam voluptatum,
            quibusdam, voluptates, quia voluptate quod quos voluptatibus quas
            voluptatem quidem doloribus.
          </p>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam
            voluptatum, quibusdam, voluptates, quia voluptate quod quos
            voluptatibus quas voluptatem quidem doloribus. Quisquam voluptatum,
            quibusdam, voluptates, quia voluptate quod quos voluptatibus quas
            voluptatem quidem doloribus.
          </p>
        </div>
      </div>
    </main>

    <section class="contenedor seccion">
      <h1>Más sobre Nosotros</h1>

      <div class="iconos-nosotros">
        <div class="icono">
          <img
            src="build/img/icono1.svg"
            alt="icono seguridad"
            loading="lazy"
          />
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
    </section>

    <?php
      include 'includes/template/footer.php';
    ?>
