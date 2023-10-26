<?php

// Importar la conexión
require 'includes/config/database.php';
$db = conectarDB();


// Crear un email y password

$email = "correo@correo.com";
$password = "123456";

// Hashear el password
$passwordHash = password_hash($password, PASSWORD_DEFAULT);


// Crear el query
$query = " INSERT INTO usuarios (email, password) VALUES ('$email', '$passwordHash') ";

// Agregar el usuario a la base de datos
mysqli_query($db, $query);
