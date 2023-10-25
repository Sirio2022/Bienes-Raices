<?php

// Importar la conexion
require '../includes/config/database.php';


// Conectar a la base de datos

$db = conectarDB();

// Escribir el Query
$query = "SELECT * FROM propiedades";

// Consultar la base de datos
$resultadoConsulta = mysqli_query($db, $query);


// Resultado de la creacion de la propiedad
$resultado = $_GET['resultado'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST['id'];
  $id = filter_var($id, FILTER_VALIDATE_INT);

  if ($id) {

    // Eliminar el archivo
    $query = "SELECT imagen FROM propiedades WHERE id = $id";

    $resultado = mysqli_query($db, $query);

    $propiedad = mysqli_fetch_assoc($resultado);

    unlink('../imagenes/' . $propiedad['imagen']);



    // Eliminar propiedad
    $query = "DELETE FROM propiedades WHERE id= $id";

    $resultado = mysqli_query($db, $query);

    if ($resultado) {
      header('Location: /admin?resultado=3');
    }
  }
}


// Include the header template
require '../includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion">
  <h1>Administrador de Bienes Raices</h1>

  <?php if (intval($resultado) === 1) : ?>

    <p class="alerta exito">Anuncio Creado Correctamente</p>

  <?php elseif (intval($resultado) === 2) : ?>

    <p class="alerta exito">Anuncio Actualizado Correctamente</p>

  <?php elseif (intval($resultado) === 3) : ?>

    <p class="alerta exito">Anuncio Eliminado Correctamente</p>

  <?php endif; ?>

  <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>

  <table class="propiedades">

    <thead>
      <tr>
        <th>ID</th>
        <th>Titulo</th>
        <th>Imagen</th>
        <th>Precio</th>
        <th>Acciones</th>
      </tr>
    </thead>

    <tbody> <!-- Mostrar los Resultados -->

      <?php

      while ($resultado = mysqli_fetch_assoc($resultadoConsulta)) :


      ?>


        <tr>
          <td>
            <?php echo $resultado['id']; ?>
          </td>
          <td>
            <?php echo $resultado['titulo']; ?>
          </td>
          <td> <img src="/imagenes/<?php echo $resultado['imagen']; ?>" alt="Casa Glory y mia" class="imagen-tabla"></td>
          <td>
            $ <?php echo $resultado['precio']; ?>
          </td>
          <td>
            <form method="POST" class="w-100">
              <input type="hidden" name="id" value="<?php echo $resultado['id']; ?>" />
              <input type="submit" class="boton-rojo-block" value="Eliminar" />

            </form>
            <a href="admin/propiedades/actualizar.php?id=<?php echo $resultado['id']; ?>" class="boton-acua-block">Actualizar</a>

          </td>
        </tr>

      <?php endwhile; ?>
    </tbody>


  </table>
</main>

<?php

// Cerar la conexion
mysqli_close($db);

incluirTemplate('footer');
?>