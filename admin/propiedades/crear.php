<?php

// Importar la conexion
require '../../includes/config/database.php';

require '../../includes/funciones.php';

// Autenticar el usuario
$auth = estaAutenticado();

if (!$auth) {
  header('Location: /');
}

// Conectar a la base de datos

$db = conectarDB();

// Consultar para obtener los vendedores
$consulta = "SELECT * FROM vendedores";

// Consultar la base de datos
$resultado = mysqli_query($db, $consulta);




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

  echo "<pre>";
  var_dump($_FILES);

  echo "</pre>";


  $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
  $precio = mysqli_real_escape_string($db, $_POST['precio']);
  $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
  $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
  $wc = mysqli_real_escape_string($db, $_POST['wc']);
  $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
  $vendedorId = mysqli_real_escape_string($db, $_POST['vendedor']);
  $creado = date('Y/m/d');

  // Asignar files a una variable
  $imagen = $_FILES['imagen'];

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

  if (!$imagen['name'] || $imagen['error']) {
    $errores[] = "Debes seleccionar una imagen";
  }

  // Validar por tamaño (1mb maximo)
  $medida = 1000 * 1000;

  if ($imagen['size'] > $medida) {
    $errores[] = "La imagen es muy pesada";
  }

  // echo "<pre>";
  // var_dump($errores);
  // echo "</pre>";

  // Revisar que el arreglo de errores este vacio
  if (empty($errores)) {

    /** SUBIDA DE ARCHIVOS **/

    //  Crear carpeta
    $carpetaImagenes = '../../imagenes/';

    if (!is_dir($carpetaImagenes)) {
      mkdir($carpetaImagenes);
    }

    // Generar nombres unicos.
    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

    // Subir imagen
    move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);




    // Escribir el Query
    $query = "INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedores_id)
    VALUES ('$titulo', '$precio', '$nombreImagen', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$creado', '$vendedorId')";

    //echo ($query);

    // Insertar en la base de datos
    $resultado = mysqli_query($db, $query);

    if ($resultado) {
      // Redireccionar al usuario
      header('Location: /admin?resultado=1');
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



  <form action="/admin/propiedades/crear.php" class="formulario" method="POST" enctype="multipart/form-data">
    <fieldset>
      <legend>
        Información General
      </legend>
      <label for="titulo">Titulo:</label>
      <input type="text" id="titulo" placeholder="Introduce el nombre de la propiedad" name="titulo" value="<?php echo $titulo;  ?>">

      <label for="precio">Precio:</label>
      <input type="number" id="precio" placeholder="Introduce el precio de la propiedad" name="precio" value="<?php echo $precio;  ?>">

      <label for="imagen">Imagen:</label>
      <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

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
        <?php while ($vendedor = mysqli_fetch_assoc($resultado)) : ?>
          <option <?php echo $vendedorId === $vendedor['id'] ? 'selected' : '' ?> value="<?php echo $vendedor['id']  ?>"><?php echo $vendedor['nombre'] . " " . $vendedor['apellido'] ?></option>
        <?php endwhile; ?>
      </select>
    </fieldset>

    <input type="submit" value="Crear Propiedad" class="boton boton-verde">

  </form>
</main>

<?php
incluirTemplate('footer');
?>