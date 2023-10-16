<?php
  include 'includes/template/header.php';
?>

    <main class="contenedor seccion">
      <h1>Contacto</h1>

      <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp" />
        <source srcset="build/img/destacada3.jpg" type="image/jpg" />
        <img
          loading="lazy"
          src="buid/img/destacada3.jpg"
          alt="imagen contacto"
        />
      </picture>

      <h2>Llena el formulario de contacto</h2>

      <!--formulario-->
      <form action="" class="formulario">
        <fieldset>
          <legend>Información Personal</legend>
          <label for="nombre">Nombre</label>
          <input
            type="text"
            placeholder="Tu Nombre"
            name="nombre"
            id="nombre"
          />
          <label for="email">E-mail</label>
          <input type="email" placeholder="Tu Email" name="email" id="email" />
          <label for="telefono">Teléfono</label>
          <input
            type="tel"
            placeholder="Tu Teléfono"
            name="telefono"
            id="telefono"
          />
          <label for="mensaje">Mensaje</label>
          <textarea name="mensaje" id="mensaje"></textarea>
        </fieldset>

        <fieldset>
          <legend>Información sobre la propiedad</legend>
          <label for="opciones">Vende o compra</label>
          <select name="opciones" id="opciones">
            <option value="" selected disabled>-- Seleccione --</option>
            <option value="compra">Compra</option>
            <option value="vende">Vende</option>
          </select>
          <label for="presupuesto">Precio o Presupuesto</label>
          <input type="number" id="presupuesto" />
        </fieldset>

        <fieldset>
          <legend>Contacto</legend>

          <p>Como desesa ser contactado</p>

          <div class="forma-contacto">
            <label for="contactar-telefono">Telefono</label>
            <input
              name="contacto"
              type="radio"
              value="telefono"
              id="contactar-telefono"
            />
            <label for="contactar-email">E-mail</label>
            <input
              name="contacto"
              type="radio"
              value="email"
              id="contactar-email"
            />
          </div>

          <p>
            Sí eligió teléfono, elija la fecha y la hora para ser contactado
          </p>
          <label for="fecha">Fecha:</label>
          <input name="fecha" type="date" value="" id="fecha" />

          <label for="hora">Hora:</label>
          <input type="time" name="hora" id="hora" min="09:00" max="18:00" />
        </fieldset>

        <input type="submit" value="Enviar" class="boton-verde" />
      </form>
      <!--Formulario-->
    </main>

    <footer class="footer seccion">
      <div class="contenedor contenedor-footer">
        <nav class="navegacion">
          <a href="nosotros.html">Nosotros</a>
          <a href="anuncios.html">Anuncios</a>
          <a href="blog.html">Blog</a>
          <a href="contacto.html">Contacto</a>
        </nav>
      </div>

      <p class="copyright">Todos los derechos reservados 2023 &copy;</p>
    </footer>

    <script src="build/js/bundle.min.js"></script>
  </body>
</html>
