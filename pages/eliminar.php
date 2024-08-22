<?php 
session_start();
if (!isset($_SESSION['state']) || !$_SESSION['state']) {
    header("Location: Credenciales.html");
    exit();
}
        $servername = "localhost";
        $database = "interpolo";
        $username = "root";
        $password = "";
        
        // Crear conexión
        $conn = mysqli_connect($servername, $username, $password, $database);
$user = isset($_SESSION['user']) ? $_SESSION['user'] : 'Invitado';

//Consulta para obtener IDDatos
$consul = "SELECT IDDatos FROM cliente WHERE Usuario = \"$user\"";
$resultID = $conn->query($consul);
if ($resultID->num_rows >0){
    while ($row=$resultID->fetch_assoc()){
    $IdCliente = $row['IDDatos'];
        }
    }

//Borrar fila de la tabla cliente
$delcliente = "DELETE FROM cliente WHERE IDCliente = \"$IdCliente\"";
if ($conn->query($delcliente)) {
    echo "La cuenta ha sido eliminada exitosamente \n";
} else {
    echo "Error al eliminar la cuenta: ".mysqli_error($conn);
}

//Borrar fila de la tabla datos
$deldatos = "DELETE FROM datos WHERE IDDatos = \"$IdCliente\"";
if ($conn->query($deldatos)) {
    echo "Los datos han sido eliminados exitosamente";
} else {
    echo "Error al eliminar los datos: ".mysqli_error($conn);
}

//Cerrar la conexión
mysqli_close($conn)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <br><br><br>
    <a href="../home.php">Regresar al inicio</a>
</body>
</html>

