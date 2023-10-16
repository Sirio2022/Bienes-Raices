<?php
  include 'includes/template/header.php';
?>

    <main class="contenedor seccion contenido-centrado">
      <h1>Casa de Lujo en el Lago</h1>

      <picture>
        <source srcset="build/img/destacada.webp" type="image/webp" />
        <source srcset="build/img/destacada.jpg" type="image/jpg" />
        <img
          loading="lazy"
          src="build/img/destacada.jpg"
          alt="imagen anuncio"
        />
      </picture>

      <div class="resumen-propiedad">
        <p class="precio">$3´000.000</p>

        <ul class="iconos-caracteristicas">
          <li>
            <img
              class="icono"
              src="build/img/icono_wc.svg"
              alt="icono caracteristica 1"
            />
            <p>10</p>
          </li>
          <li>
            <img
              class="icono"
              src="build/img/icono_estacionamiento.svg"
              alt="icono caracteristica 2"
            />
            <p>7</p>
          </li>
          <li>
            <img
              class="icono"
              src="build/img/icono_dormitorio.svg"
              alt="icono caracteristica 3"
            />
            <p>15</p>
          </li>
        </ul>
        <p>
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo,
          voluptatem, nulla sit tenetur quisquam, non mollitia quae blanditiis
          placeat voluptates quibusdam repellendus autem sunt cumque alias.
          Maiores placeat libero aperiam!
        </p>
        <p>
          Lorem ipsum dolor, sit amet consectetur adipisicing elit.
          Reprehenderit, amet, odit officiis nisi soluta recusandae repellendus
          maxime, ipsam non magnam nesciunt. Doloremque velit optio veniam
          voluptates eveniet neque quasi ipsam?
        </p>
      </div>
    </main>

    <?php
      include 'includes/template/footer.php';
    ?>

