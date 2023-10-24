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
            <a href="#" class="boton-rojo-inline">Eliminar</a>
            <a href="admin/propiedades/actualizar.php?id=<?php echo $resultado['id']; ?>" class="boton-acua-inline">Actualizar</a>

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