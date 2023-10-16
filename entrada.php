<?php
  include 'includes/template/header.php';
?>

    <main class="contenedor seccion contenido-centrado">
      <h1>Casa de Lujo en el Lago</h1>

      <picture>
        <source srcset="build/img/destacada2.webp" type="image/webp" />
        <source srcset="build/img/destacada2.jpg" type="image/jpg" />
        <img
          loading="lazy"
          src="build/img/destacada2.jpg"
          alt="imagen anuncio"
        />
      </picture>

      <p class="informacion-meta">
        Escrito el: <span>20/10/2023</span> por: <span>Admin</span>
      </p>

      <div class="resumen-propiedad">
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

    <footer class="footer seccion">
      <div class="contenedor contenedor-footer">
        <nav class="navegacion">
          <a href="nosotros.php">Nosotros</a>
          <a href="anuncios.php">Anuncios</a>
          <a href="blog.php">Blog</a>
          <a href="contacto.php">Contacto</a>
        </nav>
      </div>

      <p class="copyright">Todos los derechos reservados 2023 &copy;</p>
    </footer>

    <script src="build/js/bundle.min.js"></script>
  </body>
</html>
