<?php
$servername = "db";
$username = "usuario1";
$password = "contrasenyaUsuario1";
$dbname = "cine";
// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);
// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $sql = "DELETE FROM peliculas WHERE id = '$id'";
    $stmt = $conn->prepare($sql);

    if ($stmt->execute()) {
        echo "Película borrada correctamente.";
    } else {
        echo "Error al borrar la película: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
<br>
<a href="index.php">Volver a lista de peliculas</a>