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

//Obtener IDCliente
$consul = "SELECT IDDatos FROM cliente WHERE Usuario = \"$user\"";
$resultID = $conn->query($consul);
if ($resultID->num_rows >0){
    while ($row=$resultID->fetch_assoc()){
    $IdCliente = $row['IDDatos'];
        }
    }

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $nombre = $_POST['nombre'];
    $apellidoP = $_POST['apellidoP'];
    $apellidoM = $_POST['apellidoM'];
    $correo = $_POST['correo'];
    $numero = $_POST['numero'];
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
    
    // Iniciar una transacción
    mysqli_begin_transaction($conn);

    try {
        // Actualizar registro en la tabla datos
        $sql_datos = "UPDATE datos SET Nombre=?, Apellido_paterno=?, Apellido_materno=?, Numero=?, Correo=? WHERE IDDatos = \"$IdCliente\"";
        $stmt_datos = mysqli_prepare($conn, $sql_datos);
        if (!$stmt_datos) {
            throw new Exception("Error en la preparación de la consulta de datos: " . mysqli_error($conn));
        }
        mysqli_stmt_bind_param($stmt_datos, 'sssss', $nombre, $apellidoP, $apellidoM, $numero, $correo);
        if (!mysqli_stmt_execute($stmt_datos)) {
            throw new Exception("Error en la ejecución de la consulta de datos: " . mysqli_stmt_error($stmt_datos));
        }

        // Obtener el id del registro insertado
        //$datos_id = mysqli_insert_id($conn);

        //Actualizar registro en la tabla cliente
        $sql_cliente = "UPDATE cliente SET Usuario=?, Contraseña=?, IDDatos=\"$IdCliente\" WHERE IDDatos = \"$IdCliente\"";
        $stmt_cliente = mysqli_prepare($conn, $sql_cliente);
        if (!$stmt_cliente) {
            throw new Exception("Error en la preparación de la consulta de cliente: " . mysqli_error($conn));
        }
        mysqli_stmt_bind_param($stmt_cliente, 'ss', $usuario, $contraseña);
        if (!mysqli_stmt_execute($stmt_cliente)) {
            throw new Exception("Error en la ejecución de la consulta de cliente: " . mysqli_stmt_error($stmt_cliente));
        }

        // Confirmar la transacción
        mysqli_commit($conn);

    } catch (Exception $e) {
        // Revertir la transacción en caso de error
        mysqli_rollback($conn);
        echo "Error en el registro: " . $e->getMessage();
    }

    // Cerrar la conexión
    mysqli_stmt_close($stmt_datos);
    mysqli_stmt_close($stmt_cliente);
}
mysqli_close($conn);
?>
</div>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
    <link rel="stylesheet" href="registro.css">
</head>
<body>
    <div class="container">
        <div class="space">
            <h2>Unete a Interpolo</h2>
            <p><img alt="Cambiar imagen" height="100px" width="100px" onmouseout="this.src='https://i.pinimg.com/originals/46/5b/ac/465baca50ce17350b78b1cc648d838cc.png';" onmouseover="this.src='https://i.pinimg.com/736x/fd/1d/cb/fd1dcb83390f10a1f7e8578a9ae63e4f.jpg';" src="https://i.pinimg.com/originals/46/5b/ac/465baca50ce17350b78b1cc648d838cc.png" /></p>    
        </div>
        <form action="editar.php" method="POST">
            <div class="form-group1">
                <label for="usuario">Nombre de usuario</label>
                <input type="text" id="usuario" name="usuario" required>
            </div>
            <div class="form-group1 password-container">
                <label for="contraseña">Contraseña</label>
                <input type="password" id="contraseña" name="contraseña" required>
                <i class="bx bxs-hide toggle-password" onclick="togglePasswordVisibility()"></i>
            </div>
            <div class="noms">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="apellidoP">Apellido Paterno</label>
                    <input type="text" id="apellidoP" name="apellidoP" required>
                </div>
                <div class="form-group">
                    <label for="apellidoM">Apellido Materno</label>
                    <input type="text" id="apellidoM" name="apellidoM" required>
                </div>
            </div>
            <div class="cont">
                <div class="form-group">
                    <label for="correo">Correo Electrónico</label>
                    <input type="email" id="correo" name="correo" required>
                </div>
                <div class="form-group">
                    <label for="numero">Teléfono</label>
                    <input type="text" id="numero" name="numero" required>
                </div>
            </div>
            <br>
        <div class="form-group">
            <button type="submit">Continuar</button>
        </div>
        <script>
            function togglePasswordVisibility() {
                const passwordInput = document.getElementById('contraseña');
                const icon = document.querySelector('.toggle-password');
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                icon.classList.toggle('bxs-hide');
                icon.classList.toggle('bxs-show');
            }
        </script>
    </form>
    <a href="../home.php">Regresar a inicio</a><br>Nota: Una vez que haya modificado sus datos, vuelva a iniciar sesión
    </div>
</body>
</html>