<?php

// Importar la conexion
require '../../includes/config/database.php';

require '../../includes/funciones.php';

// Conectar a la base de datos

$db = conectarDB();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
  echo "<pre>";
  var_dump($_POST);

  echo "</pre>";

  $titulo = $_POST['titulo'];
  $precio = $_POST['precio'];
  $descripcion = $_POST['descripcion'];
  $habitaciones = $_POST['habitaciones'];
  $wc = $_POST['wc'];
  $estacionamiento = $_POST['estaionamiento'];
  $vendedorId = $_POST['vendedor'];

  // Insertar en la base de datos

  $query = "INSERT INTO propiedades (titulo, precio, descripcion, habitaciones, wc, estacionamiento, vendedorId)
     VALUES ('$titulo', '$precio', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$vendedorId')";
}


incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Crear</h1>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <form action="/admin/propiedades/crear.php" class="formulario" method="POST">
        <fieldset>
            <legend>
                Información General
            </legend>
            <label for="titulo">Titulo:</label>
            <input type="text" id="titulo" placeholder="Introduce el nombre de la propiedad" name="titulo">

            <label for="precio">Precio:</label>
            <input type="number" id="precio" placeholder="Introduce el precio de la propiedad" name="precio">

            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" accept="image/jpeg, image/png">

            <label for="descripcion">Descripcion:</label>
            <textarea id="descripcion" name="descripcion"></textarea>
        </fieldset>

        <fieldset>
            <legend>
                Informacion Propiedad
            </legend>

            <label for="habitaciones">Habitaciones:</label>
            <input type="number" id="habitaciones" placeholder="Introduce el numero de habitaciones" min="1" max="20"
                name="habitaciones">

            <label for="wc">Baños:</label>
            <input type="number" id="wc" placeholder="Introduce el numero de baños" min="0" max="20" name="wc">

            <label for="estacionamiento">Estacionamiento:</label>
            <input type="number" id="estacionamiento" placeholder="Introduce el numero de estacionamientos" min="1"
                max="20" name="estacionamiento">
        </fieldset>

        <fieldset>
            <legend>
                Vendedor
            </legend>

            <select name="vendedor">
                <option value="1">Juan</option>
                <option value="2">Karen</option>
            </select>
        </fieldset>

        <input type="submit" value="Crear Propiedad" class="boton boton-verde">

    </form>
</main>

<?php
incluirTemplate('footer');
?>