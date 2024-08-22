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

//Consulta e impresiones de tabla DATOS
//IDusuario
$consul = "SELECT IDDatos FROM cliente WHERE Usuario = \"$user\"";
$resultID = $conn->query($consul);
if ($resultID->num_rows >0){
    while ($row=$resultID->fetch_assoc()){
    $IDCliente = $row['IDDatos'];
        }
    }
//nombre completo
$consulNom = "SELECT Nombre FROM datos WHERE IDDatos = \"$IDCliente\"";
$resultNom = $conn->query($consulNom);
if ($resultNom->num_rows >0){
    while ($row=$resultNom->fetch_assoc()){
    $Nombre = $row['Nombre'];
        }
    }

$consulAP = "SELECT Apellido_Paterno FROM datos WHERE IDDatos = \"$IDCliente\"";
$resultAP = $conn->query($consulAP);
if ($resultAP->num_rows >0){
    while ($row=$resultAP->fetch_assoc()){
    $Ap_Pa = $row['Apellido_Paterno'];
        }
    }

$consulAM = "SELECT Apellido_Materno FROM datos WHERE IDDatos = \"$IDCliente\"";
$resultAM = $conn->query($consulAM);
if ($resultAM->num_rows >0){
    while ($row=$resultAM->fetch_assoc()){
        $Ap_Ma = $row['Apellido_Materno'];
    }
}
// Obtener datos del formulario
$servicio = $_POST['valor_pre'];

$consulSerNom = "SELECT IDServicios FROM servicios WHERE Nombre = \"$servicio\"";
$resultSerNom = $conn->query($consulSerNom);
if ($resultSerNom->num_rows >0){
    while ($row=$resultSerNom->fetch_assoc()){
        $IDservices = $row['IDServicios'];
    }
}

//nombre del servicio
$consulserv = "SELECT Nombre FROM servicios WHERE Nombre = \"$servicio\"";
$resultserv = $conn->query($consulserv);
if ($resultserv->num_rows >0){
    while ($row=$resultserv->fetch_assoc()){
    $Nomserv = $row['Nombre'];
        }
    }

//Obtener Nombre del Tipo de servicio tabla Correspondiente al servicio

$sql = "SELECT * FROM `$Nomserv`";

// Ejecutar la consulta
$result = mysqli_query($conn, $sql);

// Verificar si la consulta se ejecutó correctamente
if ($result) {
    // Obtener la primera fila de la consulta
    $Tiposerv = mysqli_fetch_array($result, MYSQLI_ASSOC);

    // Verificar si la fila no está vacía
    if ($Tiposerv) {
        // Obtener el valor de la segunda columna
            // Si conoces el nombre de la columna
            // $value = $row['nombre_columna'];

        // Si no conoces el nombre de la columna, usa el índice de la columna (en este caso, el índice 1 para la segunda columna)
        $values = array_values($Tiposerv);
        $value = isset($values[1]) ? $values[1] : 'No existe';

        // Imprimir el valor
        //echo "Valor de la segunda columna en la primera fila: " . $value;
    } else {
        echo "No se encontraron filas.";
    }
} else {
    // Manejar errores en la consulta
    echo "Error en la consulta: " . mysqli_error($conn);
}
$Total = $_POST['totalValue'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pedidos.css">
    <title>Consultar mis pedido</title>
</head>
<body>
    <table>
        <tr>
            <td>ID de Usuario</td>
            <td>Nombre</td>
            <td>Apellido Paterno</td>
            <td>Apellido Materno</td>
            <td>ID del servicio</td>
            <td>Nombre del servicio</td>
            <td>Tipo del servicio</td>
            <td>Precio unitario</td>
            <td>Total a Pagar</td>
        </tr>
        <tr>
            <td><?php echo $IDCliente?></td>
            <td><?php echo $Nombre?></td>
            <td><?php echo $Ap_Pa?></td>
            <td><?php echo $Ap_Ma?></td>
            <td><?php echo $IDservices?></td>
            <td><?php echo $Nomserv?></td>
            <td><?php echo $Tiposerv['Tipo']?></td>
            <td><?php echo $Tiposerv['Precio']?></td>
            <td><?php echo $Total?></td>   
            <td>"Total"</td>
        </tr>
    </table>
    <br>
<p>Pedidos</p>
<br></br>
<div class="master-container">
    <div class="card pedidos">
        <label class="title"><?php echo $user?> #<?php echo $IDCliente?>
        </label>
        <label class="subtitle"><?php echo $Nombre."  ".$Ap_Pa."  ".$Ap_Ma?>
        </label>
        <div class="details">
        <span>CURP</span>
        <span>47.99$</span>
        <span>coca</span>
        <span>4.99$</span>
        <span>LICENCIA</span>
        <span>47.99$</span>
        </div>
    </div>
    <div class="card checkout">
        <div class="checkout--footer">
        <label class="price"><sup>$</sup>57.99</label>
    </div>
</div>
</body>
</body>
</html>