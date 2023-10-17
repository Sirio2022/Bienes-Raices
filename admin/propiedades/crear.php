<?php

// Importar la conexion
require '../../includes/config/database.php';

require '../../includes/funciones.php';

// Conectar a la base de datos

$db = conectarDB();

// Validar formulario con mensaje de error
$errores = [];

$titulo = '';
$precio = '';
$descripcion = '';
$habitaciones = '';
$wc = '';
$estacionamiento = '';
$vendedorId = '';





if ($_SERVER['REQUEST_METHOD'] === "POST") {
  // echo "<pre>";
  // var_dump($_POST);

  // echo "</pre>";

  $titulo = $_POST['titulo'];
  $precio = $_POST['precio'];
  $descripcion = $_POST['descripcion'];
  $habitaciones = $_POST['habitaciones'];
  $wc = $_POST['wc'];
  $estacionamiento = $_POST['estacionamiento'];
  $vendedorId = $_POST['vendedor'];

  if (!$titulo) {
    $errores[] = "Debes agregar un titulo";
  }

  if (!$precio) {
    $errores[] = "Debes agregar un precio";
  }

  if (strlen($descripcion) < 50) {
    $errores[] = "Debes agregar una descripcion de al menos 50 caracteres";
  }

  if (!$habitaciones) {
    $errores[] = "Debes agregar el numero de habitaciones";
  }

  if (!$wc) {
    $errores[] = "Debes agregar el numero de baños";
  }

  if (!$estacionamiento) {
    $errores[] = "Debes agregar el numero de estacionamientos";
  }

  if ($vendedorId === "") {
    $errores[] = "Debes seleccionar un vendedor";
  }

  // echo "<pre>";
  // var_dump($errores);
  // echo "</pre>";

  // Revisar que el arreglo de errores este vacio
  if (empty($errores)) {
    // Escribir el Query
    $query = "INSERT INTO propiedades (titulo, precio, descripcion, habitaciones, wc, estacionamiento, vendedores_id)
    VALUES ('$titulo', '$precio', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$vendedorId')";

    //echo ($query);

    // Insertar en la base de datos
    $resultado = mysqli_query($db, $query);

    if ($resultado) {
      echo "Insertado correctamente";
    } else {
      echo "Error";
    }
  }
}


incluirTemplate('header');
?>

<main class="contenedor seccion">
  <h1>Crear</h1>
  <a href="/admin" class="boton boton-verde">Volver</a>
  <?php foreach ($errores as $error) : ?>
    <div class="alerta error">

      <?php echo $error ?>
    </div>
  <?php endforeach; ?>



  <form action="/admin/propiedades/crear.php" class="formulario" method="POST">
    <fieldset>
      <legend>
        Información General
      </legend>
      <label for="titulo">Titulo:</label>
      <input type="text" id="titulo" placeholder="Introduce el nombre de la propiedad" name="titulo" value="<?php echo $titulo;  ?>">

      <label for="precio">Precio:</label>
      <input type="number" id="precio" placeholder="Introduce el precio de la propiedad" name="precio" value="<?php echo $precio;  ?>">

      <label for="imagen">Imagen:</label>
      <input type="file" id="imagen" accept="image/jpeg, image/png">

      <label for="descripcion">Descripcion:</label>
      <textarea id="descripcion" name="descripcion"><?php echo $descripcion;  ?></textarea>
    </fieldset>

    <fieldset>
      <legend>
        Informacion Propiedad
      </legend>

      <label for="habitaciones">Habitaciones:</label>
      <input type="number" id="habitaciones" placeholder="Introduce el numero de habitaciones" min="1" max="20" name="habitaciones" value="<?php echo $habitaciones;  ?>">

      <label for="wc">Baños:</label>
      <input type="number" id="wc" placeholder="Introduce el numero de baños" min="1" max="20" name="wc" value="<?php echo $wc;  ?>">

      <label for="estacionamiento">Estacionamiento:</label>
      <input type="number" id="estacionamiento" placeholder="Introduce el numero de estacionamientos" min="1" max="20" name="estacionamiento" value="<?php echo $estacionamiento;  ?>">
    </fieldset>

    <fieldset>
      <legend>
        Vendedor
      </legend>

      <select name="vendedor">
        <option value="" default>-- Seleccione --</option>
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