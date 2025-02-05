<?php
$servername = "db";
$username = "usuario1";
$password = "contrasenyaUsuario1";
$dbname = "cine";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_REQUEST['titulo'];
    $director = $_REQUEST['director'];
    $nota = $_REQUEST['nota'];
    $anyo = $_REQUEST['anyo'];
    $presupuesto = $_REQUEST['presupuesto'];
    $trailer = $_REQUEST['trailer'];

    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $imagen = $_FILES['imagen']['tmp_name'];
        $img_base64 = base64_encode(file_get_contents($imagen));
    } else {
        die("Error al procesar la imagen");
    }

    $sql = "INSERT INTO peliculas (titulo, director, anyo, nota, presupuesto, img_base64, url_trailer) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssiss", $titulo, $director, $anyo, $nota, $presupuesto, $img_base64, $trailer);

    if ($stmt->execute()) {
        echo "Película añadida correctamente.";
    } else {
        echo "Error al añadir la película: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
<br>
<a href="index.php">Volver a lista de peliculas</a>