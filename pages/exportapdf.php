<?php
require('../fpdf186/fpdf.php');

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

//Consulta e impresiones de tabla DATOS
$consul = "SELECT IDDatos FROM cliente WHERE Usuario = \"$user\"";
$resultID = $conn->query($consul);
if ($resultID->num_rows >0){
    while ($row=$resultID->fetch_assoc()){
    $IdCliente = $row['IDDatos'];
        }
    }
$consulnom = "SELECT Nombre FROM datos WHERE IDDatos = '$IdCliente'";
$resultnom = $conn->query($consulnom);
if ($resultnom->num_rows >0){
    while ($row=$resultnom->fetch_assoc()){
    $Nombrecl = $row['Nombre'];
        }
    }
$consulap = "SELECT Apellido_Paterno FROM datos WHERE IDDatos = '$IdCliente'";
$resultap = $conn->query($consulap);
if ($resultap->num_rows >0){
    while ($row=$resultap->fetch_assoc()){
    $ApPat = $row['Apellido_Paterno'];
        }
    }
$consulam = "SELECT Apellido_Materno FROM datos WHERE IDDatos = '$IdCliente'";
$resultam = $conn->query($consulam);
if ($resultam->num_rows >0){
    while ($row=$resultam->fetch_assoc()){
    $ApMat = $row['Apellido_Materno'];
        }
    }
$consulnum = "SELECT Numero FROM datos WHERE IDDatos = '$IdCliente'";
$resultnum = $conn->query($consulnum);
if ($resultnum->num_rows >0){
    while ($row=$resultnum->fetch_assoc()){
    $Numero = $row['Numero'];
        }
    }
$consulcor = "SELECT Correo FROM datos WHERE IDDatos = '$IdCliente'";
$resultcor = $conn->query($consulcor);
if ($resultcor->num_rows >0){
    while ($row=$resultcor->fetch_assoc()){
    $Correo = $row['Correo'];
        }
    }
//Consulta e impresiones de tabla Cliente_Servicios
$consulcor = "SELECT Correo FROM datos WHERE IDDatos = '$IdCliente'";
$resultcor = $conn->query($consulcor);
if ($resultcor->num_rows >0){
    while ($row=$resultcor->fetch_assoc()){
    $Correo = $row['Correo'];
        }
    }

// Crear instancia de FPDF
$pdf = new FPDF();
$pdf->AddPage();

// Configuración de fuente
$pdf->SetFont('Arial', 'B', 16);

// Agregar título
$pdf->Cell(0, 10, 'Informacion de Usuario ' . $user, 0, 1, 'C');

// Espacio
$pdf->Ln(10);

// Configuración de tabla
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(40, 10, 'Numero de cliente', 1);
$pdf->Cell(40, 10, 'Nombre', 1);
$pdf->Cell(40, 10, 'Apellido Paterno', 1);
$pdf->Cell(40, 10, 'Apellido Materno', 1);
$pdf->Cell(40, 10, 'Numero', 1);
$pdf->Cell(50, 10, 'Correo', 1);
$pdf->Ln();

// Agregar los datos de la tabla
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(40, 10, $IdCliente, 1);
$pdf->Cell(40, 10, $Nombrecl, 1);
$pdf->Cell(40, 10, $ApPat, 1);
$pdf->Cell(40, 10, $ApMat, 1);
$pdf->Cell(40, 10, $Numero, 1);
$pdf->Cell(50, 10, $Correo, 1);

// Salida del archivo
$pdf->Output('I', 'Mi_Informacion.pdf');
?>
