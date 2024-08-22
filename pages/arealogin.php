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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="excel.css">
    <title>Area Login</title>
    <link rel="stylesheet" href="arealogin.css">
</head>
<body>
    <div id="header">
        <nav>
            <a href="../home.php"><img alt="Cambiar imagen" height="100px" width="100px" onmouseout="this.src='https://i.pinimg.com/originals/46/5b/ac/465baca50ce17350b78b1cc648d838cc.png';" onmouseover="this.src='https://i.pinimg.com/736x/fd/1d/cb/fd1dcb83390f10a1f7e8578a9ae63e4f.jpg';" src="https://i.pinimg.com/originals/46/5b/ac/465baca50ce17350b78b1cc648d838cc.png" /><a>
            <ul><li>Bienvenido <?php echo $user; ?></li></ul>
            <ul class="nav">
                <li class="dropdown">Opciones
                    <ul class="dropdown-content">  
                        <li><a href="Consulta.html">Modificar mi información</a></li>
                        <li><a href="pedidos.php">Consultar mis pedidos</a></li>
                    </ul>
                </li>
                <li><a href="logout.php">Cerrar sesión</a></li>
            </ul>
        </nav>
    </div>
    <h2>Informacion de Usuario: <?php echo $user; ?></h2>
    <div class="supercontainer">
    <!--Tabla Datos cliente-->
    <div class="tablausuario">
    <table id="infousuario">        
                <tr>
                    <th>Numero de cliente</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Número</th>
                    <th>Correo</th>
                </tr>
                <tr>
                <td><?php echo "$IdCliente"?></td>
                <td><?php echo "$Nombrecl"?></td>
                <td><?php echo "$ApPat"?></td>
                <td><?php echo "$ApMat"?></td>
                <td><?php echo "$Numero"?></td>
                <td><?php echo "$Correo"?></td>
                </tr>
            </table>
            <br><br>
            <br>
            <center><table>
            <tr>
            <td><form action="eliminar.php" method="post">
            <input type="submit" value="Eliminar mi cuenta"></form></td>
            <td><form action="exporta.php" method="post">
            <input type="submit" value="Obtener archivo en excel de Mi Información">
            </form></td>
            <td><a href="editar.php"><button class="buttondelete">Editar Mi Información</button></a></td>
            <td><form action="exportapdf.php" method="post">
            <input type="submit" value="Obtener archivo  PDF de Mi Información"></td>
            </tr>
            </table></center>
        <!-- Tabla Clientes Servicios
        <table> 
            <tr>
                <td>Número de cliente<td>
                <td>Nombre de Servicio<td>
                    </table>        
            <tr> -->
    </div>
</body>
</html>

