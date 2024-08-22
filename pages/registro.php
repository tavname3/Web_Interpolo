<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro exitoso</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/registrophp.css">
</head>
<body>
    <div class="content">
        <img src="../img/database.png" height="80px" width="80px">
        <div class="top">
        <?php
        $servername = "localhost";
        $database = "interpolo";
        $username = "root";
        $password = "";
        
        // Crear conexión
        $conn = mysqli_connect($servername, $username, $password, $database);
        
        // Verificar Conexión
        if (!$conn) {
            die("Error en la conexión de bases de datos: " . mysqli_connect_error());
        }
        echo "La conexión con la base de datos es exitosa";
        ?>
        </div>
        <img class="img1" src="../img/comprobado.png" height="95px" width="95px">
        <div class="center">
        <?php
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
                // Insertar en la tabla datos
                $sql_datos = "INSERT INTO datos (Nombre, Apellido_paterno, Apellido_materno, Numero, Correo) VALUES (?, ?, ?, ?, ?)";
                $stmt_datos = mysqli_prepare($conn, $sql_datos);
                if (!$stmt_datos) {
                    throw new Exception("Error en la preparación de la consulta de datos: " . mysqli_error($conn));
                }
                mysqli_stmt_bind_param($stmt_datos, 'sssss', $nombre, $apellidoP, $apellidoM, $numero, $correo);
                if (!mysqli_stmt_execute($stmt_datos)) {
                    throw new Exception("Error en la ejecución de la consulta de datos: " . mysqli_stmt_error($stmt_datos));
                }
                
                // Obtener el id del registro insertado
                $datos_id = mysqli_insert_id($conn);

                // Insertar en la tabla cliente
                $sql_cliente = "INSERT INTO cliente (Usuario, Contraseña, IDDatos) VALUES (?, ?, ?)";
                $stmt_cliente = mysqli_prepare($conn, $sql_cliente);
                if (!$stmt_cliente) {
                    throw new Exception("Error en la preparación de la consulta de cliente: " . mysqli_error($conn));
                }
                mysqli_stmt_bind_param($stmt_cliente, 'ssi', $usuario, $contraseña, $datos_id);
                if (!mysqli_stmt_execute($stmt_cliente)) {
                    throw new Exception("Error en la ejecución de la consulta de cliente: " . mysqli_stmt_error($stmt_cliente));
                }

                // Confirmar la transacción
                mysqli_commit($conn);

                echo "Registro y creación de usuario exitosos";
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
        <br><br><br>
        <div class="left"><a href="../../Interpolo/home.html">Regresar al inicio</a></div>
        <div class="bottom"><a href="Credenciales.html">Iniciar sesión</a></div>
        <div class="right"><a href="arealogin.php">Consultar mi información</a></div>
    </div>
</body>
</html>
