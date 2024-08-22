<?php
session_start();
if (!isset($_SESSION['state']) || !$_SESSION['state']) {
        header("Location: Credenciales.html");
        exit();
}
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=ReporteCliente.xls");
header("Pragma: no-cache");
header("Expires: 0");


// Crear conexión
$servername = "localhost";
$database = "interpolo";
$username = "root";
$password = "";

// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $database);


$user = isset($_SESSION['user']) ? $_SESSION['user'] : 'Invitado';

//Consulta e impresiones de tabla DATOS
//IDusuario
$consul = "SELECT IDDatos FROM cliente WHERE Usuario = \"$user\"";
$resultID = $conn->query($consul);
if ($resultID->num_rows >0){
        while ($row=$resultID->fetch_assoc()){
        $IDCliente = $row['IDDatos'];
        }
}

$sql = "SELECT * FROM datos WHERE IDDatos = \"$IDCliente\"";
$result = mysqli_query($conn, $sql);

if (!$result) {
        die("Error en la consulta: " . mysqli_error($conn));
}

// Establecer los parámetros de vinculación y generar el archivo Excel
echo "<table border='1'>";
echo "<tr>";
echo "<th>id</th>";
echo "<th>Nombre</th>";
echo "<th>Apellido Paterno</th>";
echo "<th>Apellido Materno</th>";
echo "<th>Numero</th>";
echo "<th>Correo</th>";
echo "</tr>";

while ($mostrar = mysqli_fetch_array($result)) {
echo "<tr>";
echo "<td>" . htmlspecialchars($mostrar['IDDatos']) . "</td>";
echo "<td>" . htmlspecialchars($mostrar['Nombre']) . "</td>";
echo "<td>" . htmlspecialchars($mostrar['Apellido_Paterno']) . "</td>";
echo "<td>" . htmlspecialchars($mostrar['Apellido_Materno']) . "</td>";
echo "<td>" . htmlspecialchars($mostrar['Numero']) . "</td>";
echo "<td>" . htmlspecialchars($mostrar['Correo']) . "</td>";
echo "</tr>";
}
echo "</table>";

// Cerrar la conexión
mysqli_close($conn);
?>
